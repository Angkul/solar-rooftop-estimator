<?php
// Prevent direct access
if (!defined('ABSPATH')) exit;

/**
 * Add settings menu
 */
add_action('admin_menu', function () {
    add_options_page(
        'Solar Estimator Settings',
        'Solar Estimator',
        'manage_options',
        'solar-estimator-settings',
        'sre_settings_page'
    );
});

/**
 * Render settings page with tab
 */
function sre_settings_page() {
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'main';
    ?>
    <div class="wrap">
        <h1>Solar Rooftop Estimator Settings</h1>

        <h2 class="nav-tab-wrapper">
<!-- 			<a href="?page=solar-estimator-settings&tab=license" class="nav-tab <?php echo $active_tab === 'license' ? 'nav-tab-active' : ''; ?>">🔑 License</a> -->
            <a href="?page=solar-estimator-settings&tab=main" class="nav-tab <?php echo $active_tab === 'main' ? 'nav-tab-active' : ''; ?>">🔧 Main</a>
			<a href="?page=solar-estimator-settings&tab=calc" class="nav-tab <?php echo $active_tab === 'calc' ? 'nav-tab-active' : ''; ?>">📐 Calculator</a>
            <a href="?page=solar-estimator-settings&tab=theme" class="nav-tab <?php echo $active_tab === 'theme' ? 'nav-tab-active' : ''; ?>">🎨 Theme</a>
        </h2>

        <?php if ($active_tab === 'license') : ?>
            <form method="post" action="options.php">
                <?php
                settings_fields('sre_main_settings_group');
                do_settings_sections('solar-estimator-settings-license');
                submit_button();
                ?>
            </form>
        <?php elseif ($active_tab === 'main') : ?>
            <form method="post" action="options.php">
                <?php
                settings_fields('sre_theme_settings_group');
                do_settings_sections('solar-estimator-settings-main');
                submit_button();
                ?>
            </form>
        <?php elseif ($active_tab === 'theme') : ?>
            <form method="post" action="options.php">
                <?php
                settings_fields('sre_theme_settings_group');
                do_settings_sections('solar-estimator-settings-theme');
                submit_button();
                ?>
            </form>
		<?php elseif ($active_tab === 'calc') : ?>
			<form method="post" action="options.php">
				<?php
				settings_fields('sre_calc_settings_group');
				do_settings_sections('solar-estimator-settings-calc');
				submit_button();
				?>
			</form>
		<?php endif; ?>
    </div>
    <?php
}



// Register settings and fields
add_action('admin_init', function () {
	// Add license function
	register_setting('sre_license_group', 'sre_license_key');
	add_settings_section('sre_license_section', '', null, 'solar-estimator-settings-license');
	add_settings_field(
		'sre_license_key',
		__('License Key', 'solar-rooftop-estimator'),
		function () {
			$key = get_option('sre_license_key', '');
			echo "<input type='text' name='sre_license_key' value='" . esc_attr($key) . "' class='regular-text' />";
		},
		'solar-estimator-settings-license',
		'sre_license_section'
	);
	
    // === MAIN TAB ===
    register_setting('sre_main_settings_group', 'sre_wpforms_id');

    add_settings_section(
        'sre_main_section',
        __('Main Settings', 'solar-rooftop-estimator'),
        null,
        'solar-estimator-settings-main'
    );

    add_settings_field(
        'sre_wpforms_id_field',
        __('WPForms Form ID', 'solar-rooftop-estimator'),
        function () {
            $value = get_option('sre_wpforms_id', '');
            echo '<input type="text" name="sre_wpforms_id" value="' . esc_attr($value) . '" class="regular-text" />';
        },
        'solar-estimator-settings-main',
        'sre_main_section'
    );
	
	// Register fields
	register_setting('sre_calc_settings_group', 'sre_generation_rate');
	register_setting('sre_calc_settings_group', 'sre_electricity_price');
	register_setting('sre_calc_settings_group', 'sre_net_save_rate_epc');
	register_setting('sre_calc_settings_group', 'sre_net_save_rate_ppa');
	register_setting('sre_calc_settings_group', 'sre_fixed_price_factory');
	register_setting('sre_calc_settings_group', 'sre_ppa_free_maintenance_years');
	register_setting('sre_calc_settings_group', 'sre_operation_fee_house');

	// Add section
	add_settings_section(
		'sre_calc_section',
		__('ค่าตั้งต้นการคำนวณ', 'solar-rooftop-estimator'),
		null,
		'solar-estimator-settings-calc'
	);

	add_action('admin_head', function () {
		echo '<style>
			.sre-calc-input {
				width: 150px;
			}
			.sre-calc-left th {
			width: 300px;
			}
		</style>';
	});
	
	// Field: Solar Generation Rate
	add_settings_field(
		'sre_generation_rate',
		'Solar Generation (kWh/kW/year)',
		function () {
			$val = get_option('sre_generation_rate', 1400);
			echo "<input type='number' name='sre_generation_rate' value='" . esc_attr($val) . "' class='sre-calc-input' />";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section',
		array(
			'class' => 'sre-calc-left'
		)
	);

	// Field: Electricity Price
	add_settings_field(
		'sre_electricity_price',
		'ค่าไฟฟ้าเฉลี่ย',
		function () {
			$val = get_option('sre_electricity_price', 5);
			echo "<input type='number' step='0.01' name='sre_electricity_price' value='" . esc_attr($val) . "' class='sre-calc-input' /> บาท/หน่วย";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// ผลประหยัดสุทธิ (ปี) = 30
	add_settings_field(
		'sre_electricity_year_save',
		'ผลประหยัดสุทธิ',
		function () {
			$val = get_option('sre_electricity_year_save', 30);
			echo "<input type='number' name='sre_electricity_year_save' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);

	// Field: EPC คำนวณ
	add_settings_field(
		'sre_net_save_rate_epc',
		'EPC คำนวณ',
		function () {
			$val = get_option('sre_net_save_rate_epc', 180);
			echo "<input type='number' name='sre_net_save_rate_epc' value='" . esc_attr($val) . "' class='sre-calc-input' />";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);

	// Field: PPA คำนวณ
	add_settings_field(
		'sre_net_save_rate_ppa',
		'PPA คำนวณ',
		function () {
			$val = get_option('sre_net_save_rate_ppa', 100);
			echo "<input type='number' name='sre_net_save_rate_ppa' value='" . esc_attr($val) . "' class='sre-calc-input' />";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);

	// Field: investCost Factory
	add_settings_field(
		'sre_fixed_price_factory',
		'investCost Factory',
		function () {
			$val = get_option('sre_fixed_price_factory', 19);
			echo "<input type='number' step='0.1' name='sre_fixed_price_factory' value='" . esc_attr($val) . "' class='sre-calc-input' /> บาท/W";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);

	// Field: Free Maintenance (PPA)
	add_settings_field(
		'sre_ppa_free_maintenance_years',
		'Free Maintenance (PPA)',
		function () {
			$val = get_option('sre_ppa_free_maintenance_years', 15);
			echo "<input type='number' name='sre_ppa_free_maintenance_years' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);

	// Field: ค่าบริการและดูแลรักษาระบบ บ้าน/ที่พักอาศัย
	add_settings_field(
		'sre_service_and_maintenance_home_fee',
		'ค่าบริการและดูแลรักษาระบบ บ้าน/ที่พักอาศัย',
		function () {
			$val = get_option('sre_service_and_maintenance_home_fee', 1);
			echo "<input type='number' name='sre_service_and_maintenance_home_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าบริการและดูแลรักษาระบบ บ้าน/ที่พักอาศัย
	add_settings_field(
		'sre_service_and_maintenance_home_fee',
		'ค่าบริการและดูแลรักษาระบบ บ้าน/ที่พักอาศัย',
		function () {
			$val = get_option('sre_operation_fee_house', 1);
			echo "<input type='number' name='sre_service_and_maintenance_home_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าบริการและดูแลรักษาระบบ อาคารสำนักงาน
	add_settings_field(
		'sre_service_and_maintenance_office_fee',
		'ค่าบริการและดูแลรักษาระบบ อาคารสำนักงาน',
		function () {
			$val = get_option('sre_service_and_maintenance_office_fee', 1);
			echo "<input type='number' name='sre_service_and_maintenance_office_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าบริการและดูแลรักษาระบบ โรงงาน
	add_settings_field(
		'sre_service_and_maintenance_factory_fee',
		'ค่าบริการและดูแลรักษาระบบ โรงงาน',
		function () {
			$val = get_option('sre_service_and_maintenance_factory_fee', 2);
			echo "<input type='number' name='sre_service_and_maintenance_factory_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าบริการและดูแลรักษาระบบ อื่นๆ
	add_settings_field(
		'sre_service_and_maintenance_other_fee',
		'ค่าบริการและดูแลรักษาระบบ อื่นๆ',
		function () {
			$val = get_option('sre_service_and_maintenance_other_fee', 2);
			echo "<input type='number' name='sre_service_and_maintenance_other_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าบริการและดูแลรักษาระบบ PPC (ปี)
	add_settings_field(
		'sre_service_and_maintenance_ppc_fee',
		'ค่าบริการและดูแลรักษาระบบ PPC',
		function () {
			$val = get_option('sre_service_and_maintenance_ppc_fee', 2);
			echo "<input type='number' name='sre_service_and_maintenance_ppc_fee' value='" . esc_attr($val) . "' class='sre-calc-input' /> ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// Field: ค่าธรรมเนียมดูแลรักษาระบบ
	add_settings_field(
		'sre_operation_fee_house',
		'ค่าธรรมเนียมดูแลรักษาระบบ',
		function () {
			$val = get_option('sre_operation_fee_house', 5000);
			echo "<input type='number' name='sre_operation_fee_house' value='" . esc_attr($val) . "' class='sre-calc-input' /> บาท/ปี";
		},
		'solar-estimator-settings-calc',
		'sre_calc_section'
	);
	
	// === THEME TAB ===
    $color_fields = [
        'sre_color_primary'       => '#00205b',
        'sre_color_text'          => '#000000',
        'sre_color_icon'          => '#00205b',
        'sre_color_button'        => '#00205b',
        'sre_color_button_hover'  => '#000000',
    ];

    foreach ($color_fields as $field => $default) {
        register_setting('sre_theme_settings_group', $field);
    }

    add_settings_section(
        'sre_theme_section',
        __('Theme Color Settings', 'solar-rooftop-estimator'),
        null,
        'solar-estimator-settings-theme'
    );

    // Callback shared by all color fields
    function sre_color_field_callback($args) {
        $option_name = $args['option_name'];
        $default = $args['default'];
        $value = get_option($option_name, $default);
        ?>
        <input type="text"
               id="<?php echo esc_attr($option_name); ?>_text"
               value="<?php echo esc_attr($value); ?>"
               style="width: 100px; margin-right: 10px;" />

        <input type="color"
               id="<?php echo esc_attr($option_name); ?>"
               name="<?php echo esc_attr($option_name); ?>"
               value="<?php echo esc_attr($value); ?>" />

        <script>
        (function($){
            const $picker = $('#<?php echo esc_js($option_name); ?>');
            const $text = $('#<?php echo esc_js($option_name); ?>_text');
            $picker.on('input', function() {
                $text.val($(this).val());
            });
            $text.on('input', function() {
                $picker.val($(this).val());
            });
        })(jQuery);
        </script>
        <?php
    }

    // Add all theme color fields
    foreach ($color_fields as $field => $default) {
        add_settings_field(
            $field,
            ucwords(str_replace(['sre_color_', '_'], ['', ' '], $field)),
            'sre_color_field_callback',
            'solar-estimator-settings-theme',
            'sre_theme_section',
            ['option_name' => $field, 'default' => $default]
        );
    }
});
