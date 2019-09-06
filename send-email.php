<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';


/*if ( !isset($_POST['name']) && $_POST['name'] == '' ||
     !isset($_POST['email']) && $_POST['email'] == '' ||
     !isset($_POST['message']) && $_POST['message'] == '' ) 
{*/

$response = [];
if ( !isset($_POST['name']) || 
     !isset($_POST['email']) ||
     !isset($_POST['message']) ) 
{
    die();
    $response['thereIsError'] = true;
} else {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ezequiel.estigarribia@gmail.com';               // SMTP username
        $mail->Password = '4739eerr';                         // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to2

        //Recipients
        $mail->setFrom('ezequie.estigarribia@gmail.com', 'Invite');
        $mail->addAddress('invite@blur.com.ar', 'Invite');     // Add a recipient
        $mail->addAddress('info@blur.com.ar', 'Blur');     // Add a recipient

        //Attachments
        if (isset($_FILES['attachFile'])) {
            $mail->AddAttachment($_FILES['attachFile']['tmp_name'],$_FILES['attachFile']['name']); 
        }

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject  = 'Contacto desde INVITE';
        $mail->Body     = "<b></b>Nuevo mensaje enviado desde invite.blur</b> <br><br>
                          Nombre: " . $_POST['name'] . "<br>
                          Email: " . $_POST['email'] . "<br>";
        
        if (isset($_POST['phone']) && $_POST['phone'] != '') {
            $mail->Body .= "Tel&eacute;fono: " . $_POST['phone'] . "<br>";
        }

        $mail->Body     .="Mensaje: " . $_POST['message'] . "<br>";

        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $response['thereIsError'] = false;
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}

echo json_encode($response);