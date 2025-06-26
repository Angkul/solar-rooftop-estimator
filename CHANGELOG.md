=== Solar Rooftop Estimator ===
Contributors: angkul
Tags: solar, calculator, rooftop, energy, estimator
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 8.2
<<<<<<< HEAD
Stable tag: 1.1.2
=======
Stable tag: 1.1.3
>>>>>>> 1de1670 (Initial commit)
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
ปลั๊กอินคำนวณขนาดติดตั้งโซลาร์รูฟท็อป พร้อมแสดงผลประหยัดและฟอร์มติดต่อ ใช้งานง่ายผ่าน Shortcode และรองรับ Elementor Widget

== Installation ==
1. อัปโหลดไฟล์ปลั๊กอินไปยังไดเรกทอรี `/wp-content/plugins/`
2. เปิดใช้งานผ่านเมนู "ปลั๊กอิน" ใน WordPress
3. ใช้ Shortcode `[solar_rooftop_estimator]` หรือเพิ่มผ่าน Elementor Widget
4. ตั้งค่า WPForms ID ได้ที่เมนู Settings > Solar Estimator
5. ตั้งค่าสีต่างๆของ Component ได้ที่เมนู Settings > Solar Estimator

== Changelog ==

<<<<<<< HEAD
=======
= 1.1.3 - 2025-06-26 =
* แก้ไขเมลหน้าสรุป bug ส่งแล้วเมลไม่ไป
* แก้ field input เวลาทำการ
* แก้ format input form หน้า ข้อมูลทั่วไป

>>>>>>> 1de1670 (Initial commit)
= 1.1.2 - 2025-06-24 =
* เพิ่มระบบตั้งค่าสีผ่าน Settings Dashboard (Color Picker + ช่องกรอก Color Code)
* แสดงผล Theme สีผ่าน CSS Variables: `--sre-primary-color`, `--sre-button-color` ฯลฯ
* ปรับไฟล์ CSS ให้รองรับสีที่เปลี่ยนผ่าน Settings (เลิกใช้สี hard-coded)
* ปรับการแสดงผล icon `.layout-selector` ให้เปลี่ยนสีตามสถานะ active / inactive
* ปรับปรุง UI ให้รองรับการปรับแต่งสีได้ครบทุก component หลัก

= 1.1.1 - 2025-06-20 =
* อัปเดต readme.txt และ changelog รูปแบบใหม่
* เพิ่ม Changelog แบบ Markdown สำหรับนักพัฒนา
* ปรับปรุงเอกสารให้เป็นมาตรฐาน WordPress Plugin Directory

= 1.1.0 - 2025-06-19 =
* เพิ่มการรองรับ Elementor Widget พร้อม PSR-4 Autoload
* เพิ่มหน้า Settings ในเมนู Settings สำหรับกรอก WPForms ID
* รองรับการแสดงผล WPForms แบบ Dynamic จาก Settings
* ปรับปรุงการโหลด Assets (CSS/JS) ให้โหลดเฉพาะหน้า [solar_rooftop_estimator]
* ใช้ filemtime() เพื่อลดปัญหา browser cache สำหรับ style.js และ script.js
* แยกโครงสร้างปลั๊กอินให้เป็นมาตรฐาน production

= 1.0.0 =
* สร้างปลั๊กอินคำนวณการติดตั้ง Solar Rooftop เบื้องต้น
* รองรับ Shortcode `[solar_rooftop_estimator]` พร้อม UI
* ใช้งานร่วมกับ jQuery UI Slider
* แสดงผลคำนวณเบื้องต้นพร้อมฟอร์มติดต่อ (WPForms)

>>>>>>> 1de1670 (Initial commit)
