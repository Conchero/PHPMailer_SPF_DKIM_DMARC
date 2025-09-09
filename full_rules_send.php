<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting( E_ALL);

require './vendor/autoload.php';

$mail = new PHPMailer(true);


$body = file_get_contents('content.html');


$mail->isSMTP(true);

$mail->Host = "live.smtp.mailtrap.io";

$mail->Port = 587;


$mail->SMTPAuth = true;

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Username = 'api';
$mail->Password = '3e2b6c6a29dfc83f4bb1b8b6ec41ada1';

$mail->setFrom('hello@virtualgalaxy.fr', 'Virtual Galaxy');
$mail->addAddress('virtualgalaxyentreprise@gmail.com','Mailtrap Sandbox');

$mail->Subject = 'Test Envoie';


$mail->Body = "corps envoue";

// $mail->msgHTML(file_get_contents('content.html'), __DIR__);

// //Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
