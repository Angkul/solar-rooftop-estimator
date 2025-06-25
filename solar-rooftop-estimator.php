<?php
/**
 * Plugin Name: Solar Rooftop Estimator
 * Plugin URI: https://www.ehowme.com/solar-rooftop-estimator
 * Description: คำนวณขนาดติดตั้งโซลาร์รูฟท็อปพร้อมแสดงผล
 * Version: 1.1.3
 * Requires at least: 5.0
 * Requires PHP: 8.2
 * Author: Angkul
 * Author URI: https://www.angkul.com
 * License: GPL2
 * Text Domain: solar-rooftop-estimator
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Autoload dependencies
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Load text domain
add_action( 'plugins_loaded', function () {
	load_plugin_textdomain(
		'solar-rooftop-estimator',
		false,
		dirname( plugin_basename(__FILE__) ) . '/languages'
	);
});

// Check if page needs plugin assets
function sre_page_needs_assets() {
	global $post;
	return is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'solar_rooftop_estimator' );
}

// Enqueue jQuery UI
add_action( 'wp_enqueue_scripts', function () {
	if ( sre_page_needs_assets() ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-widget' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_style(
			'jquery-ui-css',
			'https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css',
			[],
			'1.13.2'
		);
	}
});

// Enqueue plugin styles and scripts
function sre_enqueue_assets() {
	if ( ! sre_page_needs_assets() ) return;

	$style_path          = plugin_dir_path( __FILE__ ) . 'assets/style.css';
	$summary_script_path = plugin_dir_path( __FILE__ ) . 'assets/fill-summary-to-form.js';
	$script_path         = plugin_dir_path( __FILE__ ) . 'assets/script.js';
	$print_script_path   = plugin_dir_path( __FILE__ ) . 'assets/print.js';

	wp_enqueue_style(
		'sre-style',
		plugin_dir_url( __FILE__ ) . 'assets/style.css',
		[],
		filemtime( $style_path )
	);

	wp_enqueue_script(
		'sre-fill-summary',
		plugin_dir_url( __FILE__ ) . 'assets/fill-summary-to-form.js',
		[],
		filemtime( $summary_script_path ),
		true
	);

	wp_enqueue_script(
		'sre-script',
		plugin_dir_url( __FILE__ ) . 'assets/script.js',
		[ 'jquery', 'jquery-ui-slider', 'sre-fill-summary' ],
		filemtime( $script_path ),
		true
	);

	wp_enqueue_script(
		'sre-print-script',
		plugin_dir_url( __FILE__ ) . 'assets/print.js',
		[ 'jquery' ],
		filemtime( $print_script_path ),
		true
	);

	wp_enqueue_style(
		'sre-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
		[],
		'6.5.0'
	);
}
add_action( 'wp_enqueue_scripts', 'sre_enqueue_assets' );


// Inline dynamic theme colors
add_action( 'wp_enqueue_scripts', function () {
	if ( ! sre_page_needs_assets() ) return;

	$primary   = get_option('sre_color_primary', '#00205b');
	$text = get_option('sre_color_text', '#000000');
	$icon      = get_option('sre_color_icon', '#00205b');
	$button    = get_option('sre_color_button', '#00205b');
	$hover     = get_option('sre_color_button_hover', '#000000');

	$custom_css = "
		:root {
			--sre-primary-color: {$primary};
			--sre-text-color: {$text};
			--sre-icon-color: {$icon};
			--sre-button-color: {$button};
			--sre-button-hover-color: {$hover};
		}
	";

	wp_add_inline_style( 'sre-style', $custom_css );
}, 20);

// Register shortcode
add_shortcode( 'solar_rooftop_estimator', function () {
	ob_start();
	include plugin_dir_path( __FILE__ ) . 'templates/estimator-ui.php';
	return ob_get_clean();
});

// Register Elementor widget
add_action( 'elementor/widgets/register', function ( $widgets_manager ) {
	if ( ! did_action( 'elementor/loaded' ) ) return;

	if ( class_exists( '\SolarEstimator\SREstimator_Widget' ) ) {
		$widgets_manager->register( new \SolarEstimator\SREstimator_Widget() );
	}
});


// Always load for frontend
require_once plugin_dir_path(__FILE__) . 'includes/helpers-script-data.php';

// Load admin settings
if ( is_admin() ) {
	require_once plugin_dir_path( __FILE__ ) . 'includes/admin-settings.php';
}

add_action('wpforms_process_complete', 'sre_send_summary_email_to_customer', 10, 4);

function sre_send_summary_email_to_customer($fields, $entry, $form_data, $entry_id) {
    $form_id = intval(get_option('sre_wpforms_id'));
    if ($form_data['id'] != $form_id) return;

    $name = '';
    $email = '';
    $html = '';

    foreach ($fields as $field) {
        $label = strtolower($field['name']);
        if (strpos($label, 'ชื่อ') !== false) {
            $name = sanitize_text_field($field['value']);
        } elseif (strpos($label, 'email') !== false || strpos($label, 'อีเมล') !== false) {
            $email = sanitize_email($field['value']);
        } elseif (strpos($label, 'summary') !== false || strpos($field['value'], '<table') !== false) {
            $html = $field['value'];
        }
    }

    if (!$email || !$html) return;

    $subject = 'รายละเอียดการติดตั้ง Solar Rooftop';
    $message = "<p>เรียนคุณ <strong>{$name}</strong></p>";
    $message .= "<p>นี่คือรายละเอียดการประเมินของคุณ:</p>";
    $message .= $html;
    $message .= "<p>ขอบคุณที่ใช้บริการของเรา</p>";

    wp_mail($email, $subject, $message, ['Content-Type: text/html; charset=UTF-8']);
}
