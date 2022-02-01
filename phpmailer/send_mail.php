<?php
require __DIR__ . '/PHPMailerAutoload.php';
require __DIR__ . '/class.smtp.php';

class Email_Sender
{
    private $Username = 'webproject11.su@gmail.com';
    private $password = '6646405117@@@&&&Santu';

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

/*
// Initialize library class
$mail_check = new VerifyEmail();

// Set the timeout value on stream
$mail_check->setStreamTimeoutWait(20);

// Set debug output mode
$mail_check->Debug = false;
//$mail_check->Debugoutput = 'html';

// Set email address for SMTP request
$mail_check->setEmailFrom('webproject11.su@gmail.com');

// Email to check
$exp_mail = 'mdsantusarker@gmail.com';

// Check if email is valid and exist
if ($mail_check->check($exp_mail)) {
echo 'Email &lt;' . $exp_mail . '&gt;  exist g!';
} elseif (verifyEmail::validate($exp_mail)) {
echo 'Email &lt;' . $exp_mail . '&gt; is valid, but not exist!';
} else {
echo 'Email &lt;' . $exp_mail . '&gt; is not valid and not exist!';
}

 */
