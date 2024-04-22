<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendRegistrationEmail($username, $password, $email) {
    $mail = new PHPMailer(true);

    try {
        // Configure PHPMailer for sending email
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Your SMTP host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'alanabhilash4@gmail.com'; // Your email address
        $mail->Password   = 'vgau oktl dgxm gsrc'; // Your email password or app-specific password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('alanabhilash4@gmail.com'); // Replace with your email and name
        $mail->addAddress($email);
        $mail->Subject = 'Registration Successful';
        
        $message = "Dear $username,\n\nYour registration has been completed successfully on the moto Exchange Welcome!!.\n\nUsername: $username\nPassword: $password\n\nThank you!";
        
        $mail->Body = $message;

        if ($mail->send()) {
            return true; // Email sent successfully
        } else {
            return false; // Failed to send email
        }
    } catch (Exception $e) {
        return false; // Exception occurred, email not sent
    }
}
?>
