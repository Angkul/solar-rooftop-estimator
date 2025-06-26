<div class="print-area">
<div class="elementor-widget-container">
    <div class="elementor-shortcode">
        <div class="step-display">
            <ul class="step-control">
                <li class="stepVisited currentStep"><span>วัดขนาดหลังคา</span></li>
                <li><span>ข้อมูลการใช้ไฟฟ้า</span></li>
                <li><span>ข้อมูลทั่วไป</span></li>
                <li><span>สรุปรายละเอียดติดตั้ง</span></li>
            </ul>
        </div>
        <div class="step-pane" id="section-to-print">
            <div class="calc-row step step1 active">
                <div class="row-50 controller-side">
                    <div>
                        <div class="heading">โปรดระบุพื้นที่หลังคาของคุณ</div>
                    </div>
                    <div class="separate-line"></div>
                    <div>
                        <div class="heading">พื้นที่หลังคา</div>
                        <div id="area" class="inline value"></div>
                        <div id="areaSlider" class="inline slide"></div>
                    </div>
                    <div class="btn-right">
                        <div class="calc-btn next-step">ถัดไป</div>
                    </div>
                </div>
            </div>

            <div class="calc-row step step2">
                <div class="row-50 roof-layout">
                    <div class="calc-prev-btn prev-step">ย้อนกลับ</div>
                    <div class="heading">เลือกประเภทอาคาร</div>
                    <ul class="layout-selector">
                        <li data-type="1"><i class="fas fa-home"></i><span>บ้าน/ที่พักอาศัย</span></li>
                        <li data-type="2"><i class="fas fa-building"></i><span>อาคารสำนักงาน</span></li>
                        <li data-type="3"><i class="fas fa-city"></i><span>โรงงาน</span></li>
                        <li data-type="4"><i class="fas fa-store-alt"></i><span>อื่นๆ</span></li>
                    </ul>
                </div>
                <div class="row-50">
                    <div class="type-form type-1">
                        <div class="controller-side">
                            <div class="type-monthly">
                                <div class="heading">บิลค่าไฟ (ต่อเดือน)</div>
                                <div id="monthly2" class="inline value"></div>
                                <div id="monthlySlider2" class="inline slide"></div>
                            </div>
                        </div>
                        <div class="heading hText">ปริมาณใช้ไฟฟ้าช่วงกลางวัน (6.00-18.00 น.)</div>
                        <div>คิดเป็นสัดส่วน <input type="number" class="percent-usage" value="0" min="0" max="100" />%
                            ของการใช้ไฟทั้งหมด</div>
                    </div>
                    <div class="type-form type-2">
                        <div class="controller-side">
                            <div class="type-monthly">
                                <div class="heading">บิลค่าไฟ (ต่อเดือน)</div>
                                <div id="monthly" class="inline value"></div>
                                <div id="monthlySlider" class="inline slide"></div>
                            </div>
                        </div>
                        <div class="heading hText">เวลาทำการ</div>
<<<<<<< HEAD
                        <div>เวลา <select id="time-from" name="time-from" class="time-from">
=======
                        <div class="time-form">เวลา <select id="time-from" name="time-from" class="time-from">
>>>>>>> 1de1670 (Initial commit)
                                <option>0:00</option>
                                <option>0:30</option>
                                <option>1:00</option>
                                <option>1:30</option>
                                <option>2:00</option>
                                <option>2:30</option>
                                <option>3:00</option>
                                <option>3:30</option>
                                <option>4:00</option>
                                <option>4:30</option>
                                <option>5:00</option>
                                <option>5:30</option>
                                <option>6:00</option>
                                <option>6:30</option>
                                <option>7:00</option>
                                <option>7:30</option>
                                <option>8:00</option>
                                <option>8:30</option>
                                <option>9:00</option>
                                <option>9:30</option>
                                <option>10:00</option>
                                <option>10:30</option>
                                <option>11:00</option>
                                <option>11:30</option>
                                <option>12:00</option>
                                <option>12:30</option>
                                <option>13:00</option>
                                <option>13:30</option>
                                <option>14:00</option>
                                <option>14:30</option>
                                <option>15:00</option>
                                <option>15:30</option>
                                <option>16:00</option>
                                <option>16:30</option>
                                <option>17:00</option>
                                <option>17:30</option>
                                <option>18:00</option>
                                <option>18:30</option>
                                <option>19:00</option>
                                <option>19:30</option>
                                <option>20:00</option>
                                <option>20:30</option>
                                <option>21:00</option>
                                <option>21:30</option>
                                <option>22:00</option>
                                <option>22:30</option>
                                <option>23:00</option>
                                <option>23:30</option>
                            </select> - <select id="time-to" name="time-to" class="time-to">
                                <option>0:00</option>
                                <option>0:30</option>
                                <option>1:00</option>
                                <option>1:30</option>
                                <option>2:00</option>
                                <option>2:30</option>
                                <option>3:00</option>
                                <option>3:30</option>
                                <option>4:00</option>
                                <option>4:30</option>
                                <option>5:00</option>
                                <option>5:30</option>
                                <option>6:00</option>
                                <option>6:30</option>
                                <option>7:00</option>
                                <option>7:30</option>
                                <option>8:00</option>
                                <option>8:30</option>
                                <option>9:00</option>
                                <option>9:30</option>
                                <option>10:00</option>
                                <option>10:30</option>
                                <option>11:00</option>
                                <option>11:30</option>
                                <option>12:00</option>
                                <option>12:30</option>
                                <option>13:00</option>
                                <option>13:30</option>
                                <option>14:00</option>
                                <option>14:30</option>
                                <option>15:00</option>
                                <option>15:30</option>
                                <option>16:00</option>
                                <option>16:30</option>
                                <option>17:00</option>
                                <option>17:30</option>
                                <option>18:00</option>
                                <option>18:30</option>
                                <option>19:00</option>
                                <option>19:30</option>
                                <option>20:00</option>
                                <option>20:30</option>
                                <option>21:00</option>
                                <option>21:30</option>
                                <option>22:00</option>
                                <option>22:30</option>
                                <option>23:00</option>
                                <option>23:30</option>
                            </select>น.</div>
                    </div>
                    <div class="btn-right type-form type-next">
                        <div class="calc-btn next-step">ถัดไป</div>
                    </div>
                </div>
            </div>
            <div class="calc-row step step3">
                <div class="row-50">
                    <div class="calc-prev-btn prev-step">ย้อนกลับ</div>
                    <div>
                        <div class="heading">ขนาดติดตั้งแนะนำ</div>
                        <h2 class="watt"><span class="recommendInstall"></span> <span
                                class="small-unit">กิโลวัตต์</span></h2>
                    </div>
                    <div class="hide">
                        <div class="heading">กำลังไฟฟ้าที่ระบบโซลาร์เซลล์ผลิตได้</div>
                        <h2 class="watt"><span class="generation"></span> <span class="small-unit">หน่วย/ต่อปี</span>
                        </h2>
                    </div>
                    <div class="hide">
                        <div class="heading">ผลประหยัดสุทธิ (<?php echo get_option('sre_electricity_year_save', 30) ?> ปี)</div>
                        <h2 class="watt"><span class="netSave25yrs"></span> <span class="small-unit">บาท</span></h2>
                    </div>
                    <div>
                        <div class="heading">ผลประหยัดเฉลี่ย (ต่อปี)</div>
                        <h2 class="watt"><span class="avgAnnualSave"></span> <span class="small-unit">บาท</span></h2>
                    </div>
                    <div class="remark-container">
                        <ul class="remark-list">
                            <li>*ข้อมูลเป็นเพียงการประเมินเบื้องต้นสามารถเปลี่ยนแปลงได้ตามเงื่อนไขทางวิศวกรรมและปัจจัยอื่น
                            </li>
                            <li>**หากต้องการดูรายละเอียดเพิ่มเติม เช่น ราคาติดตั้ง ระยะเวลาคืนทุน การบำรุงรักษา และอื่นๆ
                                กรุณากรอกข้อมูลส่วนตัวเพื่อดำเนินการต่อ</li>
                        </ul>
                    </div>
                </div>
                <div class="row-50">
                    <div class="form form-owner">
						<?php
//							echo do_shortcode('[wpforms id="87" title="false" description="false"]');
							$form_id = get_option('sre_wpforms_id');
 							if ( $form_id ) {
								echo do_shortcode('[wpforms id="' . intval($form_id) . '" title="false" description="false"]');
 							} else {
 								echo '<p style="color: red;">กรุณาตั้งค่า WPForms ID ในหน้า Settings</p>';
 							} 
						?>
					</div>
<<<<<<< HEAD
=======
					<div class="form-2-hidden">[wpforms id="1464" title="false" description="false"]</div>
>>>>>>> 1de1670 (Initial commit)
					<script>
						const wpforms_id = <?php echo json_encode(get_option('sre_wpforms_id')); ?>;
					</script>
                    <div class="btn-right detail-btn" style="display: none;">
                        <div class="calc-btn next-step">ถัดไป</div>
                    </div>
                </div>
            </div>
            <div class="calc-row step step4">
                <div class="row-50 tab-pane">
                    <div class="calc-prev-btn prev-step">ย้อนกลับ</div>
                    <h2 class="heading bot-space center">มาดูขนาดติดตั้ง Solar Rooftop ของคุณกัน</h2>
                    <div class="tab-nav tab-nav2 checkPPA">
                        <ul>
                            <li class="active">ลงทุนเอง (EPC)</li>
                            <li>ลงทุนให้ (PPA)</li>
                        </ul>
                    </div>
                    <div class="tab-page tab-page2">
                        <ul id="summary">
                            <li class="active">
                                <ul class="inner-list">
                                    <li class="show">
                                        <div>
                                            <span>กำลังไฟฟ้าที่ระบบโซลาร์เซลล์ผลิตได้</span>
                                            <span><span class="generation list-text"></span>หน่วย/ต่อปี</span>
                                        </div>
                                    </li>
                                    <li class="show">
                                        <div>
                                            <span>ผลประหยัดสุทธิ (<?php echo get_option('sre_electricity_year_save', 30) ?> ปี)</span>
                                            <span><span class="netSave25yrs netSaveEPC list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li class="show">
                                        <div>
                                            <span>ผลประหยัดเฉลี่ย (ต่อปี)</span>
                                            <span><span class="avgAnnualSave avgSaveEPC list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ราคาติดตั้งโดยประมาณ</span>
                                            <span><span class="investCost list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ระยะเวลาคืนทุน</span>
                                            <span><span class="paybackPeriod list-text"></span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ผลประหยัดทางภาษี 50% จาก BOI</span>
                                            <span><span class="taxSaveBOI list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ระยะเวลาคืนทุนเมื่อได้รับสิทธิประโยชน์ BOI</span>
                                            <span><span class="paybackBOI list-text"></span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ฟรีค่าบริการและดูแลรักษาระบบ (ปี)</span>
                                            <span><span class="freeOperationMaintenance list-text"></span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ค่าบริการและดูแลรักษาระบบ (ปี)</span>
                                            <span><span class="operationMaintenanceFee list-text"></span>บาท/ปี</span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="remark-container">
                                    <ul class="remark-list">
                                        <li>ข้อมูลเป็นเพียงการประเมินเบื้องต้นสามารถเปลี่ยนแปลงได้ตามเงื่อนไขทางวิศวกรรมและปัจจัยอื่น
                                        </li>
                                    </ul>
                                </div>
                                <div class="center"><span class="view-btn list-color">ดูทั้งหมด <i
                                            class="fas fa-chevron-down"></i></span></div>
                            </li>
                            <li>
                                <ul class="inner-list">
                                    <li class="show">
                                        <div>
                                            <span>กำลังไฟฟ้าที่ระบบโซลาร์เซลล์ผลิตได้</span>
                                            <span><span class="generation list-text"></span>หน่วย/ต่อปี</span>
                                        </div>
                                    </li>
                                    <li class="show">
                                        <div>
                                            <span>ผลประหยัดสุทธิ (<?php echo get_option('sre_electricity_year_save', 30) ?> ปี)</span>
                                            <span><span class="netSave25yrs netSavePPA list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li class="show">
                                        <div>
                                            <span>ผลประหยัดเฉลี่ย (ต่อปี)</span>
                                            <span><span class="avgAnnualSave avgSavePPA list-text"></span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ราคาติดตั้งโดยประมาณ</span>
                                            <span><span class="list-text">-</span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ระยะเวลาคืนทุน</span>
                                            <span><span class="list-text">-</span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ผลประหยัดทางภาษี 50% จาก BOI</span>
                                            <span><span class="list-text">-</span>บาท</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ระยะเวลาคืนทุนเมื่อได้รับสิทธิประโยชน์ BOI</span>
                                            <span><span class="list-text">-</span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ฟรีค่าบริการและดูแลรักษาระบบ (ปี)</span>
                                            <span><span class="freeOperationMaintenance-ppc list-text"></span>ปี</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>ค่าบริการและดูแลรักษาระบบ (ปี)</span>
                                            <span><span class="list-text">-</span>บาท/ปี</span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="remark-container">
                                    <ul class="remark-list">
                                        <li>ข้อมูลเป็นเพียงการประเมินเบื้องต้นสามารถเปลี่ยนแปลงได้ตามเงื่อนไขทางวิศวกรรมและปัจจัยอื่น
                                        </li>
                                    </ul>
                                </div>
                                <div class="center"><span class="view-btn list-color">ดูทั้งหมด <i
                                            class="fas fa-chevron-down"></i></span></div>
                            </li>
                        </ul>
                        <div class="user-action">
<<<<<<< HEAD
                            <div class="data-holder-form">
                                <div class="wpforms-container wpforms-container-full" id="wpforms-1464">
                                    <form id="wpforms-form-1464" class="wpforms-validate wpforms-form wpforms-ajax-form"
                                        data-formid="1464" method="post" enctype="multipart/form-data" action="/">
                                        <noscript class="wpforms-error-noscript">Please enable JavaScript in your
                                            browser to complete this form.</noscript>
                                        <div class="wpforms-field-container">
                                            <div id="wpforms-1464-field_9-container"
                                                class="wpforms-field wpforms-field-text ref1 none" data-field-id="9">
                                                <label class="wpforms-field-label wpforms-label-hide"
                                                    for="wpforms-1464-field_9">ชื่อผู้ติดต่อ/ชื่อบริษัท <span
                                                        class="wpforms-required-label">*</span></label><input
                                                    type="text" id="wpforms-1464-field_9"
                                                    class="wpforms-field-large wpforms-field-required"
                                                    name="wpforms[fields][9]" placeholder="ชื่อผู้ติดต่อ/ชื่อบริษัท"
                                                    required>
                                            </div>
                                            <div id="wpforms-1464-field_11-container"
                                                class="wpforms-field wpforms-field-text limit-text ref2 none"
                                                data-field-id="11"><label class="wpforms-field-label wpforms-label-hide"
                                                    for="wpforms-1464-field_11">เบอร์โทรศัพท์ <span
                                                        class="wpforms-required-label">*</span></label><input
                                                    type="text" id="wpforms-1464-field_11"
                                                    class="wpforms-field-large wpforms-field-required wpforms-masked-input wpforms-limit-characters-enabled"
                                                    data-rule-inputmask-incomplete="1"
                                                    data-inputmask-mask="(099) 999-9999" data-form-id="1464"
                                                    data-field-id="11" data-text-limit="14" name="wpforms[fields][11]"
                                                    placeholder="เบอร์โทรศัพท์" maxlength="14" required></div>
                                            <div id="wpforms-1464-field_1-container"
                                                class="wpforms-field wpforms-field-email ref3 none" data-field-id="1">
                                                <label class="wpforms-field-label wpforms-label-hide"
                                                    for="wpforms-1464-field_1">อีเมล <span
                                                        class="wpforms-required-label">*</span></label><input
                                                    type="email" id="wpforms-1464-field_1"
                                                    class="wpforms-field-large wpforms-field-required"
                                                    name="wpforms[fields][1]" placeholder="อีเมล" spellcheck="false"
                                                    required>
                                            </div>
                                            <div id="wpforms-1464-field_12-container"
                                                class="wpforms-field wpforms-field-textarea data-text none"
                                                data-field-id="12"><label class="wpforms-field-label wpforms-label-hide"
                                                    for="wpforms-1464-field_12">รายละเอียด <span
                                                        class="wpforms-required-label">*</span></label><textarea
                                                    id="wpforms-1464-field_12"
                                                    class="wpforms-field-large wpforms-field-required"
                                                    name="wpforms[fields][12]" placeholder="Comment or Message"
                                                    required></textarea></div>
                                        </div>
                                        <div
                                            class="wpforms-recaptcha-container wpforms-is-recaptcha wpforms-is-recaptcha-type-v3">
                                            <input type="hidden" name="wpforms[recaptcha]" value="">
                                        </div>
                                        <div class="wpforms-submit-container"><input type="hidden" name="wpforms[id]"
                                                value="1464"><input type="hidden" name="page_title"
                                                value="หน้าแรก"><input type="hidden" name="page_url"
                                                value="https://greenworld789.com/"><input type="hidden" name="page_id"
                                                value="6"><input type="hidden" name="wpforms[post_id]" value="6"><button
                                                type="submit" name="wpforms[submit]" id="wpforms-submit-1464"
                                                class="wpforms-submit btn-submit" data-alt-text="กำลังประมวลผล..."
                                                data-submit-text="รับรายละเอียดทางอีเมล" aria-live="assertive"
                                                value="wpforms-submit">รับรายละเอียดทางอีเมล</button><img
                                                decoding="async"
                                                src="<?php echo plugin_dir_url(__FILE__); ?>../assets/images/submit-spin.svg"
                                                class="wpforms-submit-spinner" style="display: none;" width="26"
                                                height="26" alt="Loading"></div>
                                    </form>
                                </div>
                            </div>
=======
>>>>>>> 1de1670 (Initial commit)
                            <div class="action-btn user-mailer">รับรายละเอียดทางอีเมล</div>
                            <div class="action-btn user-print">พิมพ์รายละเอียด</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navigator-btn-group">
    <div>
        <div class="calc-btn prev-step2">ย้อนกลับ</div>
    </div>
    <div>
        <div class="calc-btn next-step2">ถัดไป</div>
    </div>
</div>
<input type="hidden" id="emailFormHidden">
</div>