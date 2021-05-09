<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $mail = \stdClass::class;

    public function __construct($host, $user, $pass, $port, $setFromEmail, $setFromName) {
        $this->mail             = new PHPMailer(true);
        $this->mail->SMTPDebug  = SMTP::DEBUG_SERVER;     //Enable verbose debug output
        $this->mail->isSMTP();                            //Send using SMTP
        $this->mail->Host       = $host;                  //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                   //Enable SMTP authentication
        $this->mail->Username   = $user;                  //SMTP username
        $this->mail->Password   = $pass;                  //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = $port;                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $this->mail->CharSet    = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);
    }

    public function sendEmail($subject, $body, $replayEmail, $replayName, $addressEmail, $addressName) {
        $this->mail->Subject = (string) $subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replayEmail, $replayName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }

}
