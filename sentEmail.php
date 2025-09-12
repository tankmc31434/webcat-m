<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // ถ้าใช้ Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['subject']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // ตั้งค่า SMTP (ใช้ Gmail ตัวอย่าง)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'panupong.wongnual@gmail.com'; // Gmail ของคุณ
        $mail->Password   = 'czljdyjusmtndpxu';   // App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // ผู้ส่ง
        $mail->setFrom('panupong.wongnual@gmail.com', 'adminWebcat');
        // ผู้รับ
        $mail->addAddress($_POST['email'], 'Webcat User');

        // แนบไฟล์
        if (!empty($_FILES['attachment']['tmp_name'])) {
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }

        // เนื้อหาอีเมล
        $mail->isHTML(true);
        $mail->Subject = "$name";
        $mail->Body    = nl2br("ข้อความ:\n$message");

        $mail->send();
        echo "ส่งข้อความสำเร็จ!";
    } catch (Exception $e) {
        echo "ไม่สามารถส่งอีเมลได้. Error: {$mail->ErrorInfo}";
    }
}
?>

<form action="help.php" method="post" name="myFormAction" id="myFormAction">
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>