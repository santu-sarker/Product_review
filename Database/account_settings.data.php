<?php
require "../Database/database.data.php";

class Account extends Database
{
    public function pass_change($user_email, $session_id, $input_pass, $new_pass)
    {
        $message = array();
        $query = "SELECT user_id ,user_password,  session_id FROM master_users WHERE  user_email = '$user_email';";
        $res = $this->read($query); // reading data from database
        if ($res == 202) {
            $message['error'] = 102; //no data found
            return $message;
        } else if ($res == 404) {
            $message['error'] = 404; // connection error
            return $message;
        } else {
            if (password_verify($input_pass, $res[0]['user_password'])) {
                if (!strcmp($session_id, $res[0]['session_id'])) {
                    $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                    $query = "UPDATE  master_users SET user_password = '$hash_pass'  WHERE user_email = '$user_email' ;";
                    $update_res = $this->update($query);
                    if ($update_res == 100) {
                        $message['code'] = 100; // update successfully
                        return $message;
                    } else {
                        $message['code'] = 103; // failed to update
                        return $message;
                    }
                } else {
                    $message['code'] = 110; // session id miss match
                    return $message;
                }
            } else {
                $message['code'] = 101; // password miss match
                return $message;
            }
        }

    }
}

/*
if (!strcmp($session_id, $res[0]['session_id'])) {
$hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
$query = "UPDATE  master_users SET user_password = '$hash_pass'  WHERE user_email = '$user_email' ;";
$update_res = $this->update($query);
if ($update_res == 100) {
$message['code'] = 100; // update successfully
return $message;
} else {
$message['code'] = 103; // failed to update
return $message;
}
} else {
$message['code'] = 110; // session id miss match
return $message;
}

 */
