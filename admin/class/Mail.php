<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {


    public static function sendMail($user, $subject, $msg, $redirect,$message)
    {
    //     //Load Composer's autoloader
    //     require 'vendor/autoload.php';
    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true);
    //     try {
    // //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host = 'mail.jurimedia.org';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    //         $mail->Username = 'team@jurimedia.org';                     //SMTP username
    //         $mail->Password = 'jurimedia2022';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // //Recipients
    //         $mail->setFrom('team@jurimedia.org', 'Equipe de jurimedia');
    //         $mail->addAddress($user->email);     //Add a recipient

    // //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = $subject;
    //         $mail->Body = $msg;

    //         $mail->send();
    //         // Fonctions::set_flash("$message", 'success');
    //         // echo "<script>window.location ='$redirect';</script>";
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }

            $to = $user->email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
            $subject = "Test test";
            $Msg = "Voici un mwsssage de test";
            $headers = "From: $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
            $headers .= "Reply-To: $email_address"; 
            mail($to,$email_address,$subject,$Msg,$headers);
            // mail($to,$email_subject,$email_body,$headers);
            echo '<h6 class="alert alert-success">message envoyé avec succès</h6>';
            

    }
}




 
