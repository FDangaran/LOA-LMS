<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    $email = $_SESSION['email'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings                
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.elasticemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tukyuu1@gmail.com';                     //SMTP username
    $mail->Password   = 'E8788939B4EE15081B3FFF97E20064CFBDD2';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                     // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('tukyuu1@gmail.com', 'Lyceum of Alabang Book Request');
    $mail->addAddress('karmaakabane1505@gmail.com');     // Add a recipient

    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    $sql = "SELECT title, author, genre, pubdate FROM books WHERE ISBN = '$ISBN'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $book = mysqli_fetch_assoc($result);
    $title = $book['title'];
    $author = $book['author'];
    $genre = $book['genre'];
    $pubdate = $book['pubdate'];

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Book Request Notification';
    $mail->Body = nl2br('Hello, A user with email ' . $email . ' has requested to borrow the book with the following information: 
        ISBN: ' . $ISBN . ' 
        Title: ' . $title . '
        Author: ' . $author . ' 
        Genre: ' . $genre . '
        Publication Date: ' . $pubdate . '
        Please review the request and approve or reject it accordingly. Thank you.');

    $mail->send();
    echo "<script>";
    echo "alert('Your Request has been sent for the book with the following information: \\n";
    echo "ISBN: ". $ISBN . " \\n";
    echo "Title: " . $title . " \\n";
    echo "Author: " . $author . " \\n";
    echo "Genre: " . $genre . " \\n";
    echo "Publication Date: " . $pubdate . " \\n";
    echo "Please wait for approval.');";
    echo "window.location.href = 'user_dashboard.php'";
    echo "</script>";    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
