function fillSummaryToFormEmailOnly() {
	const activeTab = document.querySelector('#summary > li.active');

	// ดึงข้อมูลจากแถบที่แอคทีฟเท่านั้น
	const generationElement = activeTab.querySelector('.generation');
	const generation = generationElement ? generationElement.innerText : '-';

	const netSaveElement = activeTab.querySelector('.netSave25yrs');
	const netSave25yrs = netSaveElement ? netSaveElement.innerText : '-';

	const avgSaveElement = activeTab.querySelector('.avgAnnualSave');
	const avgAnnualSave = avgSaveElement ? avgSaveElement.innerText : '-';

	const investCostElement = activeTab.querySelector('.investCost');
	const investCost = investCostElement ? investCostElement.innerText : '-';

	const paybackPeriodElement = activeTab.querySelector('.paybackPeriod');
	const paybackPeriod = paybackPeriodElement ? paybackPeriodElement.innerText : '-';

	const taxSaveBOIElement = activeTab.querySelector('.taxSaveBOI');
	const taxSaveBOI = taxSaveBOIElement ? taxSaveBOIElement.innerText : '-';

	const paybackBOIElement = activeTab.querySelector('.paybackBOI');
	const paybackBOI = paybackBOIElement ? paybackBOIElement.innerText : '-';

	const freeOMElement = activeTab.querySelector('.freeOperationMaintenance, .freeOperationMaintenance-ppc');
	const freeOM = freeOMElement ? freeOMElement.innerText : '-';

	const OMfeeElement = activeTab.querySelector('.operationMaintenanceFee');
	const OMfee = OMfeeElement ? OMfeeElement.innerText : '-';

	const remarkContainer = activeTab.querySelector('.remark-container');
	const remark = remarkContainer ? remarkContainer.innerHTML : '';

	const htmlSummary = `
		<h1>มาดูขนาดติดตั้ง Solar Rooftop ของคุณกัน</h1>
		<table style="width: 100%; max-width: 550px; border-collapse: collapse; font-family: 'Noto Sans Thai', Arial, sans-serif;">
			<tbody>
				<tr style="border-bottom: 1px solid #eaeaea;">
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">กำลังผลิต</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #111111; font-weight: 600;">${generation} หน่วย/ปี</td>
				</tr>
				<tr style="border-bottom: 1px solid #eaeaea;">
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ผลประหยัด 25 ปี</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #111111; font-weight: 600;">${netSave25yrs} บาท</td>
				</tr>
				<tr style="border-bottom: 1px solid #eaeaea;">
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ผลประหยัดเฉลี่ย</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #111111; font-weight: 600;">${avgAnnualSave} บาท/ปี</td>
				</tr>
				<tr style="border-bottom: 1px solid #eaeaea;">
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ราคาติดตั้ง</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #111111; font-weight: 600;">${investCost} บาท</td>
				</tr>
				<tr>
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ระยะเวลาคืนทุน</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #28a745; font-weight: 600;">${paybackPeriod} ปี</td>
				</tr>
				<tr>
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ผลประหยัดจากภาษี 50% จาก BOI</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #28a745; font-weight: 600;">${taxSaveBOI} ปี</td>
				</tr>
				<tr>
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ระยะเวลาคืนทุนเมื่อได้รับสิทธิประโยชน์ BOI</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #28a745; font-weight: 600;">${paybackBOI} ปี</td>
				</tr>
				<tr>
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ฟรีค่าบริการและดูแลรักษาระบบ (ปี)</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #28a745; font-weight: 600;">${freeOM} ปี</td>
				</tr>
				<tr>
					<td style="padding: 12px 0; font-size: 15px; color: #555555;">ค่าบริการและดูแลรักษาระบบ (ปี)</td>
					<td style="padding: 12px 0; font-size: 15px; text-align: right; color: #28a745; font-weight: 600;">${OMfee} ปี</td>
				</tr>
			</tbody>
		</table>
	`;

	const hiddenInput = document.querySelector('#wpforms-1464-field_12');
	if (hiddenInput) hiddenInput.value = htmlSummary;

	console.log('📦 summary html:', htmlSummary);

	// ใส่อีเมลทดสอบ (เอาออกใน production)
	const sourceEmail = document.querySelector('#emailFormHidden')?.value;
	const emailInput = document.querySelector('#wpforms-1464-field_1');
	if (emailInput && sourceEmail) {
		emailInput.value = sourceEmail;
	}
	console.log(sourceEmail);
<<<<<<< HEAD
}
=======

	setTimeout(() => {
		const form = document.querySelector('#wpforms-form-1464');
		if (form) {
			form.requestSubmit();
			console.log("✅ ส่งฟอร์มเรียบร้อยแล้ว");
		} else {
			console.log("❌ ไม่พบฟอร์ม wpforms-form-1464");
		}
	}, 300); // หน่วงเวลาให้ DOM โหลดฟอร์มให้เสร็จก่อน
}
>>>>>>> 1de1670 (Initial commit)
