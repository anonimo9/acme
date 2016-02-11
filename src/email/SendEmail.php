<?php namespace Acme\Email;

class SendEmail {
    public static function sendEmail($to, $subject, $message, $from = "") {
        if(strlen($from) == 0) {
            $from = getenv('SMTP_FROM');
        }
        
        // Create the Transport
        $transport = \Swift_SmtpTransport::newInstance(getenv('SMTP_HOST'), getenv('SMTP_PORT'))
          ->setUsername(getenv('SMTP_USER'))
          ->setPassword(getenv('SMTP_PASS'))
          ;

        // Create the Mailer using your created Transport
        $mailer = \Swift_Mailer::newInstance($transport);

        // Create a message
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody($message);

        // Send the message
        $result = $mailer->send($message);
    }
}