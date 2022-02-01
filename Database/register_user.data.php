<?php
include "../Database/connection.data.php";

class Register_user extends Connection
{

    public function create_user($name, $email, $pass, $type, $gender)
    {
        $hash_pass = password_hash($pass, PASSWORD_BCRYPT);
        $conn = $this->connect();
        if ($conn) {
            $message = array();
            $sql = "SELECT user_name,user_email,user_password,user_type FROM master_users WHERE user_email = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->bind_result($user_name, $user_email, $user_pass, $user_type);
            $stmt->execute();

            if (!$stmt->fetch()) { // user do nto exists
                $token = bin2hex(random_bytes(15));
                $verify_code = strtoupper(bin2hex(random_bytes(3)));
                $is_verified = 'no';
                $sql = "INSERT INTO master_users(user_name , user_email, user_password,user_gender,user_type,token,verify_code,is_verified) VALUES(?,?,?,?,?,?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssss', $name, $email, $hash_pass, $gender, $type, $token, $verify_code, $is_verified);
                $stmt->execute();
                return 100; // created successfully
            } else {
                return 101; // user already exists
            }

        } else {
            return 102; // connection error
        }

    }
    public function create_page($page_name, $page_email, $page_pass, $type)
    {
        $hash_pass = password_hash($page_pass, PASSWORD_BCRYPT);
        $conn = $this->connect();
        if ($conn) {
            $message = array();
            $sql = "SELECT user_name,user_email,user_password,user_type FROM master_users WHERE user_email = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $page_email);
            $stmt->bind_result($page_name, $page_email, $page_pass, $type);
            $stmt->execute();

            if (!$stmt->fetch()) { // user do nto exists
                $token = bin2hex(random_bytes(15));
                $verify_code = strtoupper(bin2hex(random_bytes(3)));
                $is_verified = 'no';
                $sql = "INSERT INTO master_users(user_name , user_email, user_password,user_type,token,verify_code,is_verified) VALUES(?,?,?,?,?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssssss', $page_name, $page_email, $hash_pass, $type, $token, $verify_code, $is_verified);
                $stmt->execute();
                return 100; // created successfully
            } else {
                return 101; // user already exists
            }

        } else {
            return 102; //connection error
        }

    }
    public function login_user($email, $password)
    {
        $conn = $this->connect();
        $message = array();
        if ($conn) {
            $sql = "SELECT user_id,user_password,user_email ,user_type,session_id,is_verified FROM master_users WHERE user_email = ?;";
            $result = $conn->prepare($sql);

            $result->bind_param('s', $email);
            $result->bind_result($user_id, $user_password, $user_email, $user_type, $session_id, $is_verified);
            $result->execute();

            if ($result->fetch()) {
                if (password_verify($password, $user_password)) {
                    if ($is_verified == "yes") {
                        $res = $this->session($user_id);
                        if ($res['code'] == 100) {
                            $message['code'] = 100;
                            $message['user_id'] = $user_id;
                            $message['user_email'] = $user_email;
                            $message['session_id'] = $res['session'];
                            $message['user_type'] = $user_type;
                            $message['is_verified'] = $is_verified;
                            return $message; // login successful
                        } else {
                            $message['code'] = 104;
                            return $message; // fail to login
                        }

                    } else if ($is_verified == "no") {
                        $message['code'] = 105; //not varified profile
                        $message['user_email'] = $user_email;
                        $message['user_id'] = $user_id;
                        return $message;
                    }
                } else {
                    $message['code'] = 101;
                    return $message;
                    return $message; // password mismatch
                }
            } else {
                $message['code'] = 102;
                return $message; // invalid email address
            }
        } else {
            $message['code'] = 103;
            return $message; // invalid email address
        }

    }
    public function get_token($email)
    {
        $conn = $this->connect();
        $message = array();
        if ($conn) {
            $sql = "SELECT user_id , user_name,user_email,user_type,token FROM master_users WHERE user_email = ?;";
            $result = $conn->prepare($sql);

            $result->bind_param('s', $email);
            $result->bind_result($user_id, $user_name, $user_email, $user_type, $token);
            $result->execute();

            if ($result->fetch()) {
                $message['status'] = 100; // user found
                $message['token'] = $token;
                return $message;
            } else {
                $message['status'] = 101; // user not found
                return $message; // invalid email address
            }
        } else {
            $message['code'] = 103;
            return $message; // connection error
        }

    }
    public function get_verify_code($email)
    {
        $conn = $this->connect();
        $message = array();
        if ($conn) {
            $sql = "SELECT user_id , verify_code FROM master_users WHERE user_email = ?;";
            $result = $conn->prepare($sql);

            $result->bind_param('s', $email);
            $result->bind_result($user_id, $verify_code);
            $result->execute();

            if ($result->fetch()) {
                $message['status'] = 100; // user found
                $message['verify_code'] = $verify_code;
                return $message;
            } else {
                $message['status'] = 101; // user not found
                return $message; // invalid email address
            }
        } else {
            $message['code'] = 103;
            return $message; // connection error
        }

    }
    public function verify_status($email)
    {
        $conn = $this->connect();
        $message = array();
        if ($conn) {
            $sql = "SELECT user_id , is_verified FROM master_users WHERE user_email = ?;";
            $result = $conn->prepare($sql);

            $result->bind_param('s', $email);
            $result->bind_result($user_id, $is_verified);
            $result->execute();

            if ($result->fetch()) {
                $message['status'] = 100; // user found
                $message['verify_status'] = $is_verified;
                return $message;
            } else {
                $message['status'] = 101; // user not found
                return $message; // invalid email address
            }
        } else {
            $message['code'] = 103;
            return $message; // connection error
        }

    }
    public function verify_change($email)
    {
        $conn = $this->connect();
        $message = array();
        if ($conn) {
            $sql = "UPDATE master_users SET is_verified = 'yes' WHERE user_email = '$email'";

            if ($conn->query($sql) === true) {
                return 100; // updated successfully
            } else {
                return 101; // failed to update
            }

        } else {
            $message['code'] = 103;
            return $message; // connection error
        }

    }
    public function session($user_id)
    {
        $conn = $this->connect();
        $message = array();
        $session = base64_encode(random_bytes(16));
        if ($conn) {
            $sql = "UPDATE  master_users SET session_id = '$session'  where user_id = " . $user_id . " ;";

            if ($conn->query($sql) === true) {
                $message['code'] = 100;
                $message['session'] = $session;
                return $message; // updated successfully
            } else {
                $message['code'] = 101;
                return $message; // failed to update
            }

        } else {
            $message['code'] = 103;
            return $message; // connection error
        }
    }

    /*public function table_creation(){
$sql = "CREATE TABLE IF NOT EXISTS Master_User (
user_id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
user_name VARCHAR(50) NOT NULL ,
user_email varchar(50) NOT NULL UNIQUE,
user_password VARCHAR(50) NOT NULL ,
user_gender VARCHAR(10) NOT NULL ,
user_type VARCHAR(10) NOT NULL ,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if($this->connect()){
$result = $mysqli->query($sql);
if($result){
return true ;
}
return false;
}
else return false;
} */

}
