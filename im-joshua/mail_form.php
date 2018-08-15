<?php
require 'PHPMailerAutoload.php';

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

$mail = new PHPMailer;

$mail->SMTPDebug = 3; 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zanoriajoshua@gmail.com';                 // SMTP username
$mail->Password = '09063448926';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587; 

$mail->From = $mailFrom;
$mail->FromName = $name;
$mail->addAddress('zanoriajoshua@gmail.com', 'Joshua Zanoria');     // Add a recipient
$mail->addReplyTo('zanoriajoshua@gmail.com', 'Information');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}