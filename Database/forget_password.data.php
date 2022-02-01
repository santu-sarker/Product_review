<?php
include "../phpmailer/send_mail.php";
include "../Database/database.data.php";

class Forget_Password extends Database
{
    public function email_user($email)
    {
        $message = array();
        $query = "SELECT user_id , token  FROM master_users WHERE  user_email = '$email';";
        $res = $this->read($query); // reading data from database
        if ($res == 202) {
            $message['error'] = 102; //no data found
            return $message;
        } else if ($res == 404) {
            $message['error'] = 404; // connection error
            return $message;
        } else {
            $verify_code = $res[0]['token'];
            $send_mail = new Email_Sender();
            $subject = "Product Review(Forget Password)";
            $body = "Hello  User " . "Here Is Your Password Reset Link : http://localhost/Product_Review/change_password.php?email=$email&verify_code=$verify_code";
            $mail_res = $send_mail->send_email($email, $subject, $body);
            if ($mail_res == 100) {
                $message['error'] = 100;
                $message['verify_code'] = $verify_code;
                return $message;

            } elseif ($mail_res == 101) {
                $message['error'] = 101; //fail to sent mail
                return $message;
            }
        }
    }
    public function change_pass($email, $verify_code)
    {
        $query = "SELECT user_id , token  FROM master_users WHERE  user_email = '$email';";
        $res = $this->read($query); // reading data from database
        if ($res == 202) {
            $message['error'] = 102; //no data found
            return $message;
        } else if ($res == 404) {
            $message['error'] = 404; // connection error
            return $message;
        } else {
            if (strcmp($verify_code, $res[0]['token']) == 0) {
                $message['error'] = 100;
                return $message;
            } else {
                $message['error'] = 101;
                return $message;
            }
        }

    }
    public function reset_pass($email, $verify_code, $new_pass)
    {
        $query = "SELECT user_id , token  FROM master_users WHERE  user_email = '$email';";
        $res = $this->read($query); // reading data from database
        if ($res == 202) {
            $message['error'] = 102; //no data found
            return $message;
        } else if ($res == 404) {
            $message['error'] = 404; // connection error
            return $message;
        } else {
            if (strcmp($verify_code, $res[0]['token']) == 0) {
                $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $token = bin2hex(random_bytes(15));
                $query = "UPDATE  master_users SET user_password = '$hash_pass' , token = '$token' WHERE user_email = '$email' ;";
                $update_res = $this->update($query);
                if ($update_res == 100) {
                    $message['error'] = 100; // update successfully
                    return $message;
                } else {
                    $message['error'] = 101; // failed to update
                    return $message;
                }

            } else {
                $message['error'] = 101;
                return $message;
            }
        }
    }
}
