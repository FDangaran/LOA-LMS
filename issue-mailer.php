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

    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    $ISBN = $data['isbn'];
    $sql = "SELECT title, author, genre, pubdate FROM books WHERE ISBN = '$ISBN'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $book = mysqli_fetch_assoc($result);

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
    $mail->Subject = 'Status on Borrowing of ' . $data['title'] . '';
    $mail->Body = nl2br('Your request to borrow:

    ISBN: ' . $data['isbn'] . '

    Title: ' . $data['title'] . '

    Author: ' . $book['author'] . '

    has been accepted! Please head to the library to get.');

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
