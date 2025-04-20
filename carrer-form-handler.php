
<?php

ini_set( 'display_errors', 1 );
    
error_reporting( E_ALL );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer();

//Your SMTP servers details

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "whuk13.whukhost.com";
$mail->Port = "587";
$mail->Username = "websiteemailsender@zaynsolutions.com";
$mail->Password = "ATemp19782341$";
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted


//It should be same as that of the SMTP user

$mail->setFrom('websiteemailsender@zaynsolutions.com', 'Zayn Solutions');
$mail->FromName = "Contact Form";

//where you wish to receive those emails.
$mail->AddAddress("info@zaynsolutions.com", "Contact Form");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Contact from";
$message = "Name :".$_POST['C_Full_Name']." \r\n <br>Email Adrress :".$_POST['C_Email_Address']." \r\n <br> Telphone :".$_POST['C_Telephone_Number'];

$mail->Body = $message;
$mail->AddAttachment($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name']);

if(!$mail->Send())
{
   echo "Message could not be sent.";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
header('Location: index.html#thanks');
?>
 
 
           

