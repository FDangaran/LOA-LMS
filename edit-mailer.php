<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
/*//Alias the League Google OAuth2 provider class
use Greew\OAuth2\Client\Provider\Azure;
date_default_timezone_set('Etc/UTC');*/ //FOR OUTLOOK
//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
             
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
    $mail->addAddress($email);     //Add a recipient              //Name is optional
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Status on Account';
    $mail->Body = nl2br('Congratulations! Your account ' . $email . 'status on Lyceum of Alabang Library is now

    <center>' . $status . '</center>
    
    You can now access the website!');

    $mail->send();
    echo "
        <script>
            alert('Mail sent successfully.');
        </script>
    ";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
