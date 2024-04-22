<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'alanabhilash4@gmail.com';
    $mail->Password   = 'vgau oktl dgxm gsrc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('alanabhilash4@gmail.com');
    $mail->addAddress($mailtoaddress);
    $mail->Subject = 'Email from Motors_exchange.com: Password Changed';
    $mail->Body = $bodyContent;

    $mail->send();
    echo "<script>alert('Your Password is changed successfully, a new password has been sent to your registered Email');window.location='login.php'</script>";
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>
