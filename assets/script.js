jQuery(document).ready(function ($) {
	var typeValue = '';
	var typeSelected = 0;
	var typeText = '';
	var typeData = '';
	var formDone = false;
	var lid = 0;
	if ($('html').attr('lang') == "th") {
		lid = 0;
	}
	else if ($('html').attr('lang') == "en-US") {
		lid = 1;
	}
	var language = [
		["บาท", "baht"],
		["ตร.ม.", "sq.m."],
		["ส่งข้อมูลแล้ว", "Sent"]
	];

	function comma(val) {
		while (/(\d+)(\d{3})/.test(val.toString())) {
			val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
		}
		return val;
	}

	function dataUpdate() {
		var monthly = parseInt($('#monthly').find('.val').attr('data-val')); // บิลค่าไฟ (ต่อเดือน) บ้าน/ที่พักอาศัย
		var monthly2 = parseInt($('#monthly2').find('.val').attr('data-val')); // บิลค่าไฟ (ต่อเดือน) อาคารสำนักงาน,โรงงาน,อื่นๆ
		var area = parseInt($('#area').find('.val').attr('data-val')); // พื้นที่หลังคา (ตร.ม.)
		var recommendInstall = 0;
		var generation = 0;
		var netSaveYrs = 0;		//EPC
		var avgAnnualSave = 0;		//EPC
		var netSaveYrsPPA = 0;	//PPA
		var avgAnnualSavePPA = 0;	//PPA
		var investFx = [
			[100, 50000],
			[500, 40000],
			[1000, 30000],
			[10000, 20000]
		];
		var investCost = 0;
		var paybackPeriod = 0;
		var taxSaveBOI = 0;
		var paybackBOI = 0;
		var freeOperationMaintenance = 0;
		var freeOperationMaintenancePPC = 0;
		var opFx = [
			[200, 500],
			[500, 400],
			[10000, 250]
		];
		var operationMaintenanceFee = 0;
		// Solar Rooftop Estimator Settings (Tabs Calc)
		var generationRate = sre_calc_data.generation_rate;                                         // Solar Generation (kWh/kW/year)
		var electricityPrice = sre_calc_data.electricity_price;                                     // ค่าไฟฟ้าเฉลี่ย (บาท/หน่วย)
		var electricityYearSave = sre_calc_data.electricity_year_save;                              // ผลประหยัดสุทธิ (ปี)
		var netSaveEpc = sre_calc_data.net_save_epc;                                                // EPC คำนวณ
		var netSavePpa = sre_calc_data.net_save_ppa;                                                // PPA คำนวณ
		var fixedPriceFactory = sre_calc_data.fixed_price_factory;                                  // Invest const factory บาท/W
		var ppaFreeMaintenanceYears = sre_calc_data.ppa_free_maintenance_years;                     // Free Maintenance (PPA)
		var serviceAndMaintenanceHomeFee = sre_calc_data.service_and_maintenance_home_fee;          // ค่าบริการและดูแลรักษาระบบ บ้าน/ที่พักอาศัย (ปี)
		var serviceAndMaintenanceOfficeFee = sre_calc_data.service_and_maintenance_office_fee;      // ค่าบริการและดูแลรักษาระบบ อาคารสำนักงาน (ปี)
		var serviceAndMaintenanceFactoryFee = sre_calc_data.service_and_maintenance_factory_fee;    // ค่าบริการและดูแลรักษาระบบ โรงงาน (ปี)
		var serviceAndMaintenanceOtherFee = sre_calc_data.service_and_maintenance_other_fee;        // ค่าบริการและดูแลรักษาระบบ อื่นๆ (ปี)
		var serviceAndMaintenancePpcFee = sre_calc_data.service_and_maintenance_ppc_fee;            // ค่าบริการและดูแลรักษาระบบ PPC (ปี)
		var operationFeeHouse = sre_calc_data.operation_fee_house;                                  // ค่าธรรมเนียมดูแลรักษาระบบ (บาท)

		//Calculation
		if (typeSelected == 1) {
			if (area / 6 < monthly2 / 1000000 * 1000) {
				recommendInstall = Math.ceil(area / 6);
			}
			else {
				recommendInstall = Math.ceil(monthly2 / 1000);
			}
		}
		else if (typeSelected == 2) {
			if (area / 6 < monthly / 1000000 * 1000) {
				recommendInstall = Math.ceil(area / 6);
			}
			else {
				recommendInstall = Math.ceil(monthly / 1000);
			}
		}

		generation = recommendInstall * generationRate;

		netSaveYrs = recommendInstall * netSaveEpc * 1000;
		avgAnnualSave = netSaveYrs / electricityYearSave;
		netSaveYrsPPA = recommendInstall * netSavePpa * 1000;
		avgAnnualSavePPA = netSaveYrsPPA / electricityYearSave;

		if (recommendInstall < investFx[0][0]) {
			investCost = recommendInstall * investFx[0][1];
		}
		else if (recommendInstall >= investFx[0][0] && recommendInstall < investFx[1][0]) {
			investCost = recommendInstall * investFx[1][1];
		}
		else if (recommendInstall >= investFx[1][0] && recommendInstall < investFx[2][0]) {
			investCost = recommendInstall * investFx[2][1];
		}
		else if (recommendInstall >= investFx[2][0]) {
			investCost = recommendInstall * investFx[3][1];
		}

		//START - Recent revised 19th May 2024 for changing Factory type(3) to fixed price {fixedPriceFactory} baht per watt.
		if (typeData == '3')
			investCost = recommendInstall * (fixedPriceFactory * 1000);
		//END - Recent revised 19th May 2024 for changing Factory type(3) to fixed price {fixedPriceFactory} baht per watt.

		paybackPeriod = investCost / (generation * electricityPrice);

		if (typeData == '1') {
			taxSaveBOI = 0;
			paybackBOI = 0;
		}
		else {
			taxSaveBOI = investCost / 2;
			paybackBOI = (investCost - taxSaveBOI) / (generation * electricityPrice);
		}

		if (typeData == '1') {
			freeOperationMaintenance = serviceAndMaintenanceHomeFee;
		}
		else if (typeData == '2') {
			freeOperationMaintenance = serviceAndMaintenanceOfficeFee;
		}
		else if (typeData == '3') {
			freeOperationMaintenance = serviceAndMaintenanceFactoryFee;
		}
		else if (typeData == '4') {
			freeOperationMaintenance = serviceAndMaintenanceOtherFee;
		}

		freeOperationMaintenancePPC = ppaFreeMaintenanceYears;

		if (typeData == '1') {
			operationMaintenanceFee = operationFeeHouse;
		}
		else {
			if (recommendInstall < opFx[0][0]) {
				operationMaintenanceFee = recommendInstall * opFx[0][1];
			}
			else if (recommendInstall >= opFx[0][0] && recommendInstall < opFx[1][0]) {
				operationMaintenanceFee = recommendInstall * opFx[1][1];
			}
			else if (recommendInstall >= opFx[1][0]) {
				operationMaintenanceFee = recommendInstall * opFx[2][1];
			}
		}

		//Output
		$('.data-text').find('textarea').empty();

		$('.data-text').find('textarea').append('Roof area (Sqm): ' + $('#area').text() + '\r');

		if (typeSelected == 1) {
			$('.data-text').find('textarea').append('Monthly electrical bill (m): ' + $('#monthly2').text() + '\r');
		}
		else if (typeSelected == 2) {
			$('.data-text').find('textarea').append('Monthly electrical bill (m): ' + $('#monthly').text() + '\r');
		}
		$('.data-text').find('textarea').append('ประเภทอาคาร: ' + typeText + '\r');
		$('.data-text').find('textarea').append(typeValue + '\r\r');

		$('.recommendInstall').text(comma(recommendInstall));
		$('.data-text').find('textarea').append('Recommended Installation: ' + comma(recommendInstall) + ' kW/year\r');

		$('.generation').text(comma(generation));
		$('.data-text').find('textarea').append('Electricity generation from Solar: ' + comma(generation) + ' kW/year\r');

		$('.netSave25yrs').text(comma(netSaveYrs));
		$('.netSaveEPC').text(comma(netSaveYrs));
		$('.netSavePPA').text(comma(netSaveYrsPPA));
		$('.data-text').find('textarea').append(`Net saving (${electricityYearSave} years): ` + comma(netSaveYrs) + ' Baht\r');

		$('.avgAnnualSave').text(comma(avgAnnualSave));
		$('.avgSaveEPC').text(comma(avgAnnualSave));
		$('.avgSavePPA').text(comma(avgAnnualSavePPA));
		$('.data-text').find('textarea').append('Average Annual Saving: ' + comma(avgAnnualSave) + ' Baht\r');

		$('.investCost').text(comma(investCost));
		$('.data-text').find('textarea').append('Investment: ' + comma(investCost) + ' Baht\r');

		$('.paybackPeriod').text(paybackPeriod.toFixed(2));
		$('.data-text').find('textarea').append('Payback period: ' + paybackPeriod.toFixed(2) + ' Year\r');

		if (typeData == '1') {
			$('.taxSaveBOI').closest('li').addClass('hide');
			$('.paybackBOI').closest('li').addClass('hide');
		}
		else {
			$('.taxSaveBOI').closest('li').removeClass('hide');
			$('.paybackBOI').closest('li').removeClass('hide');
			$('.taxSaveBOI').text(comma(taxSaveBOI));
			$('.data-text').find('textarea').append('Tax Saving with BOI: ' + comma(taxSaveBOI) + ' Baht\r');

			$('.paybackBOI').text(paybackBOI.toFixed(2));
			$('.data-text').find('textarea').append('Payback period with BOI: ' + paybackBOI.toFixed(2) + ' Year\r');
		}

		$('.freeOperationMaintenance').text(comma(freeOperationMaintenance));
		$('.freeOperationMaintenance-ppc').text(comma(freeOperationMaintenancePPC));
		if (typeSelected == 1) {
			$('.data-text').find('textarea').append('Free operation and maintenance fee: ' + comma(freeOperationMaintenance) + ' Year\r');
		}
		else if (typeSelected == 2) {
			$('.data-text').find('textarea').append('Free operation and maintenance fee: ' + comma(freeOperationMaintenancePPC) + ' Year\r');
		}

		$('.operationMaintenanceFee').text(comma(operationMaintenanceFee));
		$('.data-text').find('textarea').append('Operation and maintenance fee: ' + comma(operationMaintenanceFee) + ' Baht/Year\r');

	}

	$("#monthlySlider").slider({
		value: 1500000,
		min: 10000,
		max: 5000000,
		step: 10000,
		slide: function (event, ui) {
			$("#monthly").html("<span class='val' data-val='" + ui.value + "'>" + comma(ui.value) + "</span> " + language[0][lid]);
			dataUpdate();
		}
	});
	$("#monthly").html("<span class='val' data-val='" + $("#monthlySlider").slider("value") + "'>" + comma($("#monthlySlider").slider("value")) + "</span> " + language[0][lid]);

	$("#monthlySlider2").slider({
		value: 3000,
		min: 1000,
		max: 100000,
		step: 1000,
		slide: function (event, ui) {
			$("#monthly2").html("<span class='val' data-val='" + ui.value + "'>" + comma(ui.value) + "</span> " + language[0][lid]);
			dataUpdate();
		}
	});
	$("#monthly2").html("<span class='val' data-val='" + $("#monthlySlider2").slider("value") + "'>" + comma($("#monthlySlider2").slider("value")) + "</span> " + language[0][lid]);

	$("#areaSlider").slider({
		value: 7000,
		min: 0,
		max: 50000,
		step: 100,
		slide: function (event, ui) {
			$("#area").html("<span class='val' data-val='" + ui.value + "'>" + comma(ui.value) + "</span> " + language[1][lid]);
			dataUpdate();
		}
	});
	$("#area").html("<span class='val' data-val='" + $("#areaSlider").slider("value") + "'>" + comma($("#areaSlider").slider("value")) + "</span> " + language[1][lid]);

	dataUpdate();

	var toggle = true;
	$('.view-btn').hide();
	$('body').on('click', '.view-btn', function () {
		$('.inner-list').find('li').each(function () {
			if (!$(this).hasClass('show')) {
				$(this).stop().slideToggle();
			}
		});
		if (toggle) {
			$('.view-btn').html('ซ่อน <i class="fas fa-chevron-up"></i>');
		}
		else {
			$('.view-btn').html('ดูทั้งหมด <i class="fas fa-chevron-down"></i>');
		}
		$('.remark-container').stop().slideToggle();
		toggle = !toggle;
	});

	function formConfirmed() {
		var watchDog = setInterval(function () {
			if ($('.wpforms-confirmation-container-full').length) {
				clearInterval(watchDog);
				$('.detail-btn').fadeIn();
			}
		}, 100);
	}

	$('body').on('click', '.btn-submit', function () {
		formConfirmed();
	});

	$('body').on('click', '.tab-nav1 li', function () {
		$('.tab-nav1 li').removeClass('active');
		$(this).addClass('active');
		$('.tab-page1 > ul > li').removeClass('active');
		$('.tab-page1 > ul > li').eq($(this).index()).addClass('active');
	});

	$('body').on('click', '.tab-nav2 li', function () {
		$('.tab-nav2 li').removeClass('active');
		$(this).addClass('active');
		$('.tab-page2 > ul > li').removeClass('active');
		$('.tab-page2 > ul > li').eq($(this).index()).addClass('active');
	});
	
	$('.step').hide();
	$('.step1').show();
	$('.navigator-btn-group').find('.prev-step2').addClass('disabled');
	$('.form-owner .wpforms-submit.btn-submit').hide();
	$('body').on('click', '.navigator-btn-group .calc-btn', function () {
		if ($(this).hasClass('next-step2')) {
			$('.step-pane').find('.step').each(function () {
				if ($(this).hasClass('active')) {
					if ($(this).is(':first-child')) {
						$('.navigator-btn-group').find('.prev-step2').removeClass('disabled');
					}
					if ($(this).index() == 2 && !formDone) {
						document.querySelector('#emailFormHidden').value = document.querySelector('#wpforms-1398-field_2')?.value;
						// assign ค่าใส่ฟอร์ม
						$('.ref1').find('input').val($('.pass1').find('input').val());
						$('.ref2').find('input').val($('.pass2').find('input').val());
						$('.ref3').find('input').val($('.pass3').find('input').val());
						// กด submit form
						$('#wpforms-submit-' + wpforms_id).trigger('click');

						$('.navigator-btn-group').find('.next-step2').addClass('disabled');
						var submitDone = setInterval(function () {
							if ($('.form-owner .wpforms-confirmation-container-full').length) {
								formDone = true;
								stopFunction();
							}
						}, 500);
						function stopFunction() {
							clearInterval(submitDone);
							$('.navigator-btn-group').find('.next-step2').removeClass('disabled');
							$('.navigator-btn-group .next-step2').trigger('click');
						}
					}
					else {
						if ($(this).index() == 0) {
							$('.navigator-btn-group').find('.next-step2').addClass('disabled-type').parent().addClass('type-next');
						}
						else if ($(this).index() == 1) {
							$('.navigator-btn-group').find('.next-step2').parent().removeClass('type-next');
							$('.navigator-btn-group').find('.next-step2').addClass('disabled');
						}

						$(this).removeClass('active').slideToggle();
						$(this).next().addClass('active').slideToggle();
						if ($(this).next().is(':last-child')) {
							$('.navigator-btn-group').find('.next-step2').addClass('disabled');
						}
						var step = $(this).index();
						$('.step-control li').eq(step).addClass('stepDone');
						$('.step-control li').eq(step).addClass('stepVisited');
						$('.step-control li').eq(step).removeClass('currentStep');
						$('.step-control li').eq(step + 1).addClass('stepVisited');
						$('.step-control li').eq(step + 1).addClass('currentStep');
						return false;
					}
				}
			});
		}
		else if ($(this).hasClass('prev-step2')) {
			$('.step-pane').find('.step').each(function () {
				if ($(this).hasClass('active')) {
					if ($(this).is(':last-child')) {
						$('.navigator-btn-group').find('.next-step2').removeClass('disabled');
					}
					if ($(this).index() == 1) {
						$('.navigator-btn-group').find('.next-step2').removeClass('disabled-type');
					}
					else if ($(this).index() == 2) {
						$('.navigator-btn-group').find('.next-step2').parent().addClass('type-next');
						$('.navigator-btn-group').find('.next-step2').removeClass('disabled');
					}
					$(this).removeClass('active').slideToggle();
					$(this).prev().addClass('active').slideToggle();
					if ($(this).prev().is(':first-child')) {
						$('.navigator-btn-group').find('.prev-step2').addClass('disabled');
					}
					var step = $(this).index();
					$('.step-control li').eq(step).removeClass('currentStep');
					$('.step-control li').eq(step - 1).addClass('currentStep');
					return false;
				}
			});
		}
	});

	$('body').on('click', '.layout-selector li', function () {
		$('.layout-selector li').removeClass('active');
		$(this).addClass('active');
		var typeIndex = $(this).index();
		if (typeIndex == 0) {
			$('.checkPPA').find('ul').find('li').eq(1).addClass('noPPA');
		}
		else {
			$('.checkPPA').find('ul').find('li').eq(1).removeClass('noPPA');
		}
		typeText = $(this).text();
		typeData = $(this).attr('data-type');
		$('.type-form').removeClass('active');
		if (typeData == 1) {
			$('.type-1').addClass('active');
			$('.type-monthly').addClass('active');
			$('.type-next').addClass('active');
			$('.type-next').find('.next-step2').removeClass('disabled-type');
		}
		else if (typeData > 1) {
			$('.type-2').addClass('active');
			$('.type-monthly').addClass('active');
			$('.type-next').addClass('active');
			$('.type-next').find('.next-step2').removeClass('disabled-type');
		}
		else {
			$('.type-form').removeClass('active');
			$('.type-next').find('.next-step2').removeClass('disabled-type');
		}
		dataUpdate();
	});

	$('body').on('click', '.type-next', function () {
		if ($('.type-1').hasClass('active')) {
			typeValue = $('.type-1').find('.hText').text() + ': ' + $('.percent-usage').val() + '%';
			typeSelected = 1;
		}
		else if ($('.type-2').hasClass('active')) {
			typeValue = $('.type-2').find('.hText').text() + ': ' + $('.time-from').val() + ' - ' + $('.time-to').val() + 'น.';
			typeSelected = 2;
		}
		dataUpdate();
	});

	$('body').on('click', '.user-mailer', function () {
		fillSummaryToFormEmailOnly(); // ✅ เรียกใช้ฟังก์ชันจากไฟล์ fill-summary-to-form.js

		$('#wpforms-submit-1464').trigger('click'); // ✅ ส่งฟอร์ม

		const userSubmitDone = setInterval(function () {
			if ($('.wpforms-confirmation-container-full').length) {
				clearInterval(userSubmitDone);
				$('.user-mailer').text('ส่งข้อมูลแล้ว').addClass('disabled');
			}
		}, 500);
	});

	$('body').on('click', '.user-print', function () {
		printSummary();
		return false;
	});
	
	var p1 = $('#wpforms-' + wpforms_id + '-field_1').val();
	var p2 = $('#wpforms-' + wpforms_id + '-field_6').val();
	var p3 = $('#wpforms-' + wpforms_id + '-field_2').val();
	function getPassingData() {
		p1 = $('#wpforms-' + wpforms_id + '-field_1').val();
		p2 = $('#wpforms-' + wpforms_id + '-field_6').val();
		p3 = $('#wpforms-' + wpforms_id + '-field_2').val();
	}
	$('body').on('keyup', '#wpforms-' + wpforms_id + '-field_1, #wpforms-' + wpforms_id + '-field_6, #wpforms-' + wpforms_id + '-field_2', function () {
		getPassingData();
		if (p1 && p2 && p3) {
			$('.navigator-btn-group').find('.next-step2').removeClass('disabled');
		}
		else {
			$('.navigator-btn-group').find('.next-step2').addClass('disabled');
		}
	});
});

jQuery(document).ready(function ($) {
	setTimeout(function () {
		var tag_new = $("template").last().attr("id");
		$("#" + tag_new).css("display", "none");
		$("#" + tag_new).next().next().css("display", "none");
	}, 100);

	
});