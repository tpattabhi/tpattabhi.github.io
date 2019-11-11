#!/usr/local/bin/php
<?php
    //path to PHPMailer class
    require_once('./PHPMailer/class.phpmailer.php');
    // optional, gets called from within class.phpmailer.php if not already loaded
    include("./PHPMailer/class.smtp.php"); 

	$to = "tejas.pattabhi@gmail.com";
	$subject = "Message from \"" . $_REQUEST ['c_name'] . "\"";
	$message = "<b>Reply to Email: </b>" . $_REQUEST ['c_email'] . "<br /><br />";
	$message = $message . "<b>Message sent: </b>" . $_REQUEST ['c_message'];
	
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = "tejaspattabhiwebsite@gmail.com";
    $mail->Password   = "9945608039";
    $mail->SetFrom('tejaspattabhiwebsite@gmail.com');
    $mail->FromName   = "Website Enquiry";
    $mail->Subject    = $subject;

    //Main message
    $mail->MsgHTML($message);
    $mail->AddAddress($to, "");
    if(!$mail->Send()) 
    {
		$res = array ('sendstatus' => 0, 'message' => 'Failed to send your message to Tejas');
		// echo json_encode ($res);
    } 
    else 
    {
		$res = array ('sendstatus' => 1, 'message' => 'Tejas will get back to you soon!');
		// echo json_encode ($res);
    }
	echo json_encode ($res);
?>