<?php
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["mail"];
$mob=$_POST["mobile"];
$subject=$_POST["subject"];

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "588";
//Set gmail username
	$mail->Username = "webdearsproject@gmail.com";
//Set gmail password
	$mail->Password = "web@1234";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('webdearsproject@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	// $mail->addAttachment('images/1.2.jpg');
//Email body
	$mail->Body = "<h1>{$firstname}{$lastname}</h1></br><p>{$email}</p></br><p>{$subject}</p></br><p>{$mob}</p>";
//Add recipient
	$mail->addAddress('webdearsproject@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo customer($email,$firstname);
	}else{
		echo $mail->ErrorInfo;
	}
//Closing smtp connection
	$mail->smtpClose();
 
function customer($email,$name){
	
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "webdearsproject@gmail.com";
//Set gmail password
	$mail->Password = "web@1234";
//Email subject
	$mail->Subject = "REQUEST RECEIVED";
//Set sender email
	$mail->setFrom('webdearsproject@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('images/THANK-YOU.jpg');
//Email body
	$mail->Body = "<h1>WEB DEARS</h1></br><h3>Hi {$name},</h3></br><p>You have connected with right people ,THANK YOU for choosing us.</p></br><p>WE WILL GET BACK TO AS SOON AS POSSIBLE.</p>";
//Add recipient
	$mail->addAddress($email);
//Finally send email
	if ($mail->send()) {
		// return "request suuccessful";
		return 1;
	}else{
		// echo $mail->ErrorInfo;
		// return "error occoured";
		return 0;
	}
//Closing smtp connection
	$mail->smtpClose();
}
