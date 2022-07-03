<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {


    public static function sendMail($user, $subject, $msg, $redirect,$message)
    {
        //Load Composer's autoloader
        require 'vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer();
        try {
    //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'mail.jurimedia.org';                     //Set the SMTP server to send through
            $mail->SMTPAuth = false;                                   //Enable SMTP authentication
            $mail->Username = 'team@jurimedia.org';                     //SMTP username
            $mail->Password = 'jurimedia2022';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
            $mail->setFrom('team@jurimedia.org', 'Equipe de jurimedia');
            $mail->addAddress($user->email);     //Add a recipient

    //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $msg;

            $mail->send();
            // Fonctions::set_flash("$message", 'success');
            // echo "<script>window.location ='$redirect';</script>";
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}




 
