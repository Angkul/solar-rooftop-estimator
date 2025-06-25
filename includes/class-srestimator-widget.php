<?php
namespace SolarEstimator;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class SREstimator_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'solar_rooftop_estimator';
	}

	public function get_title() {
		return __( 'SolarCal by Angkul', 'solar-rooftop-estimator' );
	}

	public function get_icon() {
		return 'eicon-library-grid';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'solar-rooftop-estimator' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo do_shortcode('[solar_rooftop_estimator]');
	}
}
