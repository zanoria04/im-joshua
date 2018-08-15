<?php

//Load Composer's autoloader
require 'PHPMailerAutoload.php';


$mail = new PHPMailer();                              // Passing `true` enables exceptions

    //Server settings

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->Username = 'zanoriajoshua@gmail.com';          // SMTP username
    $mail->Password = '09063448926';                      // SMTP password
    $mail->Port = '587';                                    // TCP port to connect to


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



