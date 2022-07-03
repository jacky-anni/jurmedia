<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {


    public static function sendMail($user, $subject, $msg, $redirect,$message)
    {
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        require_once "vendor/autoload.php";

//PHPMailer Object
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
        $mail->From = "team@jurimedia.org";
        $mail->FromName = "Jacky Anizaire";

//To address and name
        $mail->addAddress("anizairejacky@gmail.com", "Recepient Name");
        $mail->addAddress("anizairejacky@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
        $mail->addReplyTo("team@jurimedia.org", "Reply");
//Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Subject Text";
        $mail->Body = "<i>Mail body in HTML</i>";
        $mail->AltBody = "This is the plain text version of the email content";

        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
	


    }
}




 
