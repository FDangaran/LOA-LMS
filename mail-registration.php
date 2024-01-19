<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.elasticemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tukyuu1@gmail.com';                     //SMTP username
    $mail->Password   = 'E8788939B4EE15081B3FFF97E20064CFBDD2';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tukyuu1@gmail.com', 'Lyceum of Alabang Account Approval Request');
    $mail->addAddress('karmaakabane1505@gmail.com');     //Add a recipient              //Name is optional

    // Check if a file is uploaded
    if (isset($_FILES['verification']) && $_FILES['verification']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['verification']['tmp_name'];
        $file_name = $_FILES['verification']['name'];
    
        // Attach the file to the email
        $mail->addAttachment($file_tmp, $file_name);
    }
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Approval Notification';
    $mail->Body = nl2br('Hello, A user with the following credentials has requested for account approval: 
    First Name: ' . $first_name . '
    Last Name: ' . $last_name . '
    Email: ' . $email . '
    Please review the request and approve or reject it accordingly. Thank you.');

    $mail->send();
    echo '<div class="success">';
    echo 'Registration Request Sent. Please wait for approval.';
    echo '</div>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
