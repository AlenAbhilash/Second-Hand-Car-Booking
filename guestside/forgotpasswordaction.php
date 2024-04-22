<?php
function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$&*';
    $randomString = substr(str_shuffle($characters), 0, $length);

    return $randomString;
} 

include_once("../dboperation.php");
$obj = new dboperation();
$uname = $_POST["txtusername"];
$sql = "SELECT l.*, p.* FROM tbl_login l INNER JOIN tbl_cust p ON l.log_id = p.log_id WHERE l.log_name = '$uname'";
$result = $obj->query($sql);
$display = mysqli_fetch_array($result);
$row = mysqli_num_rows($result); 

if ($row == 0) {
    echo "<script>alert('Entered username does not exist.');window.location='forgotpassword.php'</script>"; 
} else { 
    // Generate a random password
    $randomString = generateRandomString();

    // Update the password in the database
    $sql2 = "UPDATE tbl_login SET log_password='$randomString' WHERE log_name='$uname'";
    $result2 = $obj->query($sql2);

    if ($result2) {
        $bodyContent = "Dear $uname,

        We are writing to inform you that your password has been successfully reset. Your new password is: $randomString.

        For security reasons, please ensure that you do not share this password with anyone else. If you encounter any difficulties while logging in, please do not hesitate to contact our dedicated support team.

        Our support services are available 24/7, and we are here to assist you with any concerns or inquiries you may have.

        Thank you for choosing Motors_exchange for your services. We appreciate your trust in us.

        Best regards,
        Team Motors_Exchange
 
        Email:alanabhilash4@gmail.com";

        $mailtoaddress = $display["email"];
        require('phpmailer.php');


        $mail = new PHPMailer(true);
        try {
            // Configure PHPMailer for sending email
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'alanabhilash4@gmail.com';
            $mail->Password   = 'vgau oktl dgxm gsrc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('alanabhilash4@gmail.com');
            $mail->addAddress($mailtoaddress);
            $mail->Subject = 'Password Reset';
            $mail->Body    = $bodyContent;

            $mail->send();
            echo "<script>alert('Your password has been changed successfully. A new password has been sent to your registered email.');window.location='login.php'</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error sending email: {$mail->ErrorInfo}');window.location='forgotpassword.php'</script>";
        }
    } else {
        echo "<script>alert('Error updating password.');window.location='forgotpassword.php'</script>";
    }
}
?>
