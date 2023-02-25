<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */
//Import the PHPMailer class into the global namespace


$name = $_POST['contact-name'].' '.$_POST['contact-last'];
$email = $_POST['contact-email'];
$phone = $_POST['contact-phone'];
$message = $_POST['contact-message'];



require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require '../vendor/autoload.php';
//Create a new PHPMailer instance
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'mail.casadelchile.mx';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'contacto@casadelchile.mx';
//Password to use for SMTP authentication
$mail->Password = 'Contacto*Chil3';
//Set who the message is to be sent from
$mail->setFrom('contacto@casadelchile.mx', $name);
//Set an alternative reply-to address
$mail->addReplyTo($email, $name);
//Set who the message is to be sent to
$mail->addAddress('contacto@casadelchile.mx', 'Contacto Web');
//$mail->addAddress('sistemas@.mx', 'Contacto Web');
//$mail->AddCC('administracion@.mx', 'Contacto Web');
//Set the subject line
$mail->Subject = 'Contacto pagina web';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);
$mail->Body = 'Hola, <br><b>Nuevo contacto Web</b>!<br> Nombre: '.$name.'<br>Email: '.$email.'<br>Telefono: '.$phone.'<br>Mensaje: '.$message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    header('Location: /index.html#contact1?mensaje=0');
    //echo 'fail';
} else {
    header('Location: /index.html#contact1?mensaje=1');
    //echo 'success';
}