<?php
require __DIR__ . '/PHPMailerAutoload.php';
require __DIR__ . '/class.smtp.php';

class Email_Sender
{
    private $Username = ''; // your own mail  address
    private $password = '';  // email address password here

    public function send_email($address, $subject, $body)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        //$mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $this->Username;
        $mail->Password = $this->password;
        $mail->SMTPSecure = 'tls';

        $mail->From = $this->Username;
        $mail->FromName = 'Product Review ';
        $mail->addAddress($address);
        $mail->addReplyTo($this->Username, 'Product Review');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            return 100; // successfully sent mail
        } else {
            return 101; //failed to sent mail
        }
    }

}

