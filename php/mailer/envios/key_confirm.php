<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
$nombre = "Dituri";
$email_noti_1 = "marcos.e.dituri@gmail.com";
$email_noti_2 = "bastetproduccion@gmail.com";

date_default_timezone_set('Etc/UTC');

require '../../mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com.ar';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'admin@intranet-nuvatronic.com';
//Password to use for SMTP authentication
$mail->Password = "Admin2021!!";
//Set who the message is to be sent from
$mail->setFrom('admin@intranet-nuvatronic.com', 'Intranet');
//Set an alternative reply-to address
$mail->addReplyTo('admin@intranet-nuvatronic.com ', 'Nuvatronic');
//Set who the message is to be sent to
$mail->addAddress('admin@intranet-nuvatronic.com ', 'John Doe');
//Set the subject line
$mail->addAddress($email, 'John Doe');

$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

$body = file_get_contents('../../mailer/contenidos/notificacion_tarea/index.html');
$body = str_replace('$nombre', $nombre, $body);
$body = str_replace('$email_noti_1', $email_noti_1, $body);
$body = str_replace('$email_noti_2', $email_noti_2, $body);
$body = preg_replace('/\\\\/','', $body);

//Replace the plain text body with one created manually
$mail->MsgHTML($body);
$mail->IsHTML(true); // send as HTML
$mail->CharSet="utf-8"; // use utf-8 character encoding

$mail->AltBody = 'This is a plain-text message body';
//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Salgo salio Bien che";
    //header('Location: ../backoffice/login.php');
}

