<?php

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["mail"];
$mob=$_POST["mobile"];
$subject=$_POST["subject"];
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
    //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'webdearsproject@gmail.com';                     //SMTP username
    $mail->Password   = 'web@1234';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('webdearsproject@gmail.com', 'Web-dears');
    $mail->addAddress('webdearsproject@gmail.com');     //Add a recipient
    // $mail->addAddress('web-dears');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('images/THANK-YOU.jpg');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  "Test email using PHPMailer";
    $mail->Body    =  "<h1>{$firstname}{$lastname}</h1></br><p>{$email}</p></br><p>{$subject}</p></br><p>{$mob}</p>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){

        echo customer($email,$firstname); 
    }
    // echo 'Message has been sent';
    else{
        echo $mail->ErrorInfo;
    }
    $mail->smtpClose();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
function customer($email,$name){

    $mail = new PHPMailer(true);

//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'webdearsproject@gmail.com';                     //SMTP username
    $mail->Password   = 'web@1234';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('webdearsproject@gmail.com', 'Web-dears');
    $mail->addAddress($email);     //Add a recipient
    // $mail->addAddress('web-dears');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('images/THANK-YOU.jpg');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  "Request Received";
    $mail->Body = "<h1>WEB DEARS</h1></br><h3>Hi {$name},</h3></br><p>You have connected with right people ,THANK YOU for choosing us.</p></br><p>WE WILL GET BACK TO AS SOON AS POSSIBLE.</p>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){

        return 1;
    }
    // echo 'Message has been sent';
    else{
        return 0;
    
    }

    $mail->smtpClose();




















}
