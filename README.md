# DWS SMTP Tester

คำอธิบาย:
ใช้ PHPMailer เพื่อตรวจสอบการเชื่อมต่อ SMTP
มีฟอร์มให้ผู้ใช้เลือก SMTP Host, Port, ใส่ Email และ Password
ใช้ Bootstrap สำหรับการจัดรูปแบบ UI
เชื่อมต่อกับ SMTP และส่งอีเมลทดสอบเพื่อยืนยันการเชื่อมต่อ
รองรับ Gmail, Outlook, Yahoo เป็นตัวเลือกเริ่มต้น
คุณสามารถติดตั้ง Packages ได้โดยใช้คำสั่ง:

```sh
composer install
```
หากต้องการเพิ่ม SMTP Server อื่น ๆ สามารถเพิ่มใน <option> ของ smtp_host ได้! 🚀