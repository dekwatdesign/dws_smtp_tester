<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $smtpHost = $_POST['smtp_host'];
    $smtpPort = $_POST['smtp_port'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $email;
        $mail->Password = $password;
        $mail->SMTPSecure = ($smtpPort == 465) ? 'ssl' : 'tls';
        $mail->Port = $smtpPort;

        $mail->setFrom($email);
        $mail->addAddress($email);
        $mail->Subject = "SMTP Test";
        $mail->Body = "SMTP Connection Successful!";

        if ($mail->send()) {
            echo "<div class='alert alert-success'>SMTP Connection Successful!</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to send test email.</div>";
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>SMTP Error: " . $mail->ErrorInfo . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTP Tester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>SMTP Connection Tester</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="smtp_host" class="form-label">SMTP Host</label>
            <select name="smtp_host" id="smtp_host" class="form-select" required>
                <option value="smtp.gmail.com">Gmail</option>
                <option value="smtp.office365.com">Outlook</option>
                <option value="smtp.mail.yahoo.com">Yahoo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="smtp_port" class="form-label">SMTP Port</label>
            <select name="smtp_port" id="smtp_port" class="form-select" required>
                <option value="25">25</option>
                <option value="465">465</option>
                <option value="587">587</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Test Connection</button>
    </form>
</div>
</body>
</html>
