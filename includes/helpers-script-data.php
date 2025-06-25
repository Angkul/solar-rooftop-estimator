<?php
// includes/helpers-script-data.php

function sre_pass_settings_to_js() {
    $calc_data = [
        'generation_rate' => get_option('sre_generation_rate', 1400), 											// Solar Generation (kWh/kW/year)
        'electricity_price' => get_option('sre_electricity_price', 5),											// ค่าไฟฟ้าเฉลี่ย (บาท/หน่วย)
		'electricity_year_save' => get_option('sre_electricity_year_save', 30),									// ผลประหยัดสุทธิ (ปี)
        'net_save_epc' => get_option('sre_net_save_rate_epc', 180),												// EPC คำนวณ
        'net_save_ppa' => get_option('sre_net_save_rate_ppa', 100),												// PPA คำนวณ
        'fixed_price_factory' => get_option('sre_fixed_price_factory', 19),										// Invest const factory บาท/W
		'ppa_free_maintenance_years' => get_option('sre_ppa_free_maintenance_years', 15),						// Free Maintenance (PPA)
        'service_and_maintenance_home_fee' => get_option('sre_service_and_maintenance_home_fee', 1),			// ค่าบริการและดูแลรักษาระบบ อาคารสำนักงาน
		'service_and_maintenance_office_fee' => get_option('sre_service_and_maintenance_office_fee', 1),		// ค่าบริการและดูแลรักษาระบบ อาคารสำนักงาน
		'service_and_maintenance_factory_fee' => get_option('sre_service_and_maintenance_factory_fee', 2),		// ค่าบริการและดูแลรักษาระบบ โรงงาน
		'service_and_maintenance_other_fee' => get_option('sre_service_and_maintenance_other_fee', 2),			// ค่าบริการและดูแลรักษาระบบ อื่นๆ
		'service_and_maintenance_ppc_fee' => get_option('sre_service_and_maintenance_ppc_fee', 2),				// ค่าบริการและดูแลรักษาระบบ PPC
        'operation_fee_house' => get_option('sre_operation_fee_house', 5000),									// ค่าธรรมเนียมดูแลรักษาระบบ
    ];

    wp_localize_script('sre-script', 'sre_calc_data', $calc_data);
}

add_action('wp_enqueue_scripts', 'sre_pass_settings_to_js');