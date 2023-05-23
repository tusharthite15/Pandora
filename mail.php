<?php
$to = "tusharthite617@gmail.com";
$subject = "Test Email";
$message = "This is a test email.";

$headers = "From:tusharthite617@gmail.com \r\n";
$headers .= "Reply-To:tusharthite1572@gmail.com \r\n";
$headers .= "CC: cc@example.com\r\n";
$headers .= "BCC: bcc@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);
?>
