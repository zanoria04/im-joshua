<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




//Load Composer's autoloader
require 'PHPMailerAutoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'zanoriajoshua@gmail.com';          // SMTP username
    $mail->Password = '09063448926';                      // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = '465';                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('zanoriajoshua@gmail.com', 'Joshua');
    $mail->addAddress('zanoriajoshua@gmail.com');               // Send the e-mail to

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Name    = $name;
    $mail->headers = "From: ". $mailFrom;
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


if (isset ($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];


    $mailTo = "zanoriajoshua@gmail.com";
    $headers = "From: ". $mailFrom;
    $txt = "You have receieved an e-mail from ". $name.".\n\n".$message;


    mail($mailTo, $subject, $txt, $headers);
    header("Location: index.html");
  }
}



?>