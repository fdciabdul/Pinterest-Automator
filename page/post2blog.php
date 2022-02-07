<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require("../app/mailer/mail/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder

if (isset($_GET["mail"])) {
    echo "Yes, mail is set";   

$mail = new PHPMailer;

$mail->isSMTP();                            
$mail->Host = 'mail.merahputih.id ';            
$mail->SMTPAuth = true;                     
$mail->Username = 'abdulm@merahputih.id';          
$mail->Password = 'mana123'; 
$mail->SMTPSecure = 'tls';               
$mail->Port = 587;
$rec1=$_GET["mail"]; //receiver. email addresses to which u want to send the mail.
$mail->setFrom('abdulm@merahputih.id', 'Mailer');
$mail->AddAddress($rec1);
$mail->Subject  = "hahah";
$mail->Body     = "mnrnr hi, testing";
$mail->WordWrap = 200;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
	echo 'terkirim';
}
}else{
	echo "mail ga ke kirim";
}
?>