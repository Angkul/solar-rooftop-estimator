function printSummary() {
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

	// เปิดหน้าพิมพ์
	const printWindow = window.open('', '', 'width=800,height=600');
	printWindow.document.open();
	printWindow.document.write(`
	<html>
	<head>
		<title>รายละเอียดการติดตั้ง Solar Rooftop</title>
		<style>
			body {
				font-family: 'Tahoma', sans-serif;
				padding: 40px;
				color: #333;
			}
			h1 {
				font-size: 22px;
				color: #002b6b;
				margin-bottom: 30px;
			}
			table {
				width: 100%;
				border-collapse: collapse;
				margin-bottom: 30px;
			}
			td {
				padding: 12px;
				border-bottom: 1px solid #ccc;
				font-size: 16px;
				vertical-align: top;
			}
			td.highlight {
				font-weight: bold;
				text-align: right;
				color: #002b6b;
			}
			.footer {
				margin-top: 30px;
				font-size: 14px;
				color: #777;
				font-style: italic;
			}
		</style>
	</head>
	<body>
		<h1>มาดูขนาดติดตั้ง Solar Rooftop ของคุณกัน</h1>
		<table>
			<tr><td>กำลังไฟฟ้าที่ระบบโซลาร์สามารถผลิตได้</td><td class="highlight">${generation} หน่วย/ต่อปี</td></tr>
			<tr><td>ผลประหยัดสุทธิ (25 ปี)</td><td class="highlight">${netSave25yrs} บาท</td></tr>
			<tr><td>ผลประหยัดเฉลี่ย (ต่อปี)</td><td class="highlight">${avgAnnualSave} บาท</td></tr>
			<tr><td>ราคาติดตั้งโดยประมาณ</td><td class="highlight">${investCost} บาท</td></tr>
			<tr><td>ระยะเวลาคืนทุน</td><td class="highlight">${paybackPeriod} ปี</td></tr>
			<tr><td>ผลประหยัดจากภาษี 50% จาก BOI</td><td class="highlight">${taxSaveBOI} บาท</td></tr>
			<tr><td>ระยะเวลาคืนทุนเมื่อได้รับสิทธิประโยชน์ BOI</td><td class="highlight">${paybackBOI} ปี</td></tr>
			<tr><td>ฟรีค่าบริการและดูแลรักษาระบบ (ปี)</td><td class="highlight">${freeOM} ปี</td></tr>
			<tr><td>ค่าบริการและดูแลรักษาระบบ (ปี)</td><td class="highlight">${OMfee} บาท/ปี</td></tr>
		</table>
		<div class="footer">
			${remark}
		</div>
		<script>
			window.onload = function() {
				window.print();
				window.close();
			};
		<\/script>
	</body>
	</html>
	`);
	printWindow.document.close();
}
