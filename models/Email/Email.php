<?php

namespace app\models\Email;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Email
{
    public string $from;
    public string $to;

    public string $Subject;
    public string $Body;

    private PHPMailer $mailer;

    public function __construct(array $config)
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mailer->Port = $config['port'];
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = 'UTF-8';
        
        // echo "<pre>";
        // print_r( $this->mailer);
        // exit;
    }


    public function sendEmail($data){
        $this->mailer->setFrom('askrentaride@gmail.com');
        $this->mailer->addAddress($data['email']);
        $this->mailer->isHTML(true);
        $this->mailer->Subject = $data['subject'];
        $this->mailer->Body = $data['body'];
        
        try {
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            echo "Something went wrong :".$e->getMessage();
            return false;
        }
    }

}