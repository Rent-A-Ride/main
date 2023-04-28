<?php

namespace app\models\Email;

class Email
{
    public string $from;
    public string $to;

    public string $subject;
    public string $body;

    private PHPMailer $mailer;

    public function __construct(array $config)
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = $config['port'];
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = 'UTF-8';
    }

}