<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    function enviarEmail($email, $asunto, $cuerpo)
    {
        require_once __DIR__ . '/../config/config.php';
        require __DIR__ . '/../phpmailer/src/PHPMailer.php';
        require __DIR__ . '/../phpmailer/src/SMTP.php';
        require __DIR__ . '/../phpmailer/src/Exception.php';

        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USER;
            $mail->Password   = MAIL_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = MAIL_PORT;

            // Configuración del correo emisor y nombre
            $mail->setFrom(MAIL_USER, 'Tienda CDP');

            // Configuración del correo receptor y nombre
            $mail->addAddress($email);

            // Configuración del contenido
            $mail->isHTML(true);
            $mail->Subject = $asunto;

            // Cuerpo del correo
            $mail->Body = $cuerpo;

            // Configuración del idioma
            $mail->setLanguage('es', __DIR__ . '/../phpmailer/src/language/phpmailer.lang-es.php');

            // Envío del correo
            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Capturar y manejar la excepción
            error_log("No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}");
            return false;
        }
    }
}
