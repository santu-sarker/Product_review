<?php
session_start();
include "../Database/register_user.data.php";
include "./input_validation.class.php";
include "../phpmailer/send_mail.php";

$register_user = new Register_user();
$validate_user = new Validate();
$send_mail = new Email_Sender();

// ******* getting form data through post method ****************
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {
        $firstname = $validate_user->validate_input($_REQUEST['first_name']);
        $lastname = $validate_user->validate_input($_REQUEST['last_name']);
        $email = $validate_user->validate_input($_REQUEST['user_email']);
        $pass = $validate_user->validate_input($_REQUEST['user_pass']);
        $confirm_pass = $validate_user->validate_input($_REQUEST['user_confirm_password']);
        $gender = $_REQUEST['gender'];
        $check_password = $validate_user->pass_check($pass, $confirm_pass);
        $check_email = $validate_user->email_check($email);
        $check_name = $validate_user->name_check($firstname, $lastname);
        if ($check_email == true && $check_password == true && $check_name == true) {
            $name = $firstname . "*brk*" . $lastname;
            $type = "user";
            $user = $register_user->create_user($name, $email, $pass, $type, $gender);

            if ($user == 100) {
                $_SESSION['reg_err_type'] = "success";
                $_SESSION['reg_err'] = "Check Your Email Address To Activate Your Account!";

                $get_token = $register_user->get_token($email);
                $get_code = $register_user->get_verify_code($email);
                if ($get_token['status'] == 100 && $get_code['status'] == 100) {
                    $token = $get_token['token'];
                    $verify_code = $get_code['verify_code'];
                    $subject = 'Product Review(verification)';
                    $token_msg = "Hello " . $firstname . " " . $lastname . " " . "Here Is Your Account Activation Link : http://localhost/Product_Review/Class/handle_verification.class.php?email=$email&token=$token' ";
                    $verify_msg = "Verification Code :" . $verify_code;
                    $body = $token_msg . "" . $verify_msg;

                    $mail_res = $send_mail->send_email($email, $subject, $body);
                    if ($mail_res == 100) {
                        header("location: ../email_verification.php?user_mail=$email");
                    } elseif ($mail_res == 101) {
                        header("location: ../email_verification.php?error=failed_to_sent_mail");
                    }
                } else {
                    $_SESSION['reg_err_type'] = "danger";
                    $_SESSION['reg_err'] = "Something Went Wrong";
                    header("location: ../email_verification.php?error=failed_to_get_token_or_verify_code");
                }

            } else if ($user = 101) {
                $_SESSION['reg_err_type'] = "danger";
                $_SESSION['reg_err'] = "User Already Exists !";
                header("location: ../email_verification.php");
            } else if ($user = 102) {
                $_SESSION['reg_err_type'] = "warning";
                $_SESSION['reg_err'] = "Connection Error !";
                header("location: ../user_register_page.php");
            }

        } else if ($check_name != true) {
            $_SESSION['reg_err_type'] = "warning";
            $_SESSION['reg_err'] = "invalid name format !";
            header("location: ../views/user_register_page.php?error=invalid_data");

        } else if ($check_email != true) {
            $_SESSION['reg_err_type'] = "warning";
            $_SESSION['reg_err'] = "invalid Email Address";
            header("location: ../views/user_register_page.php?error=invalid_email_address");

        } else if ($check_password != true) {
            $_SESSION['reg_err_type'] = "warning";
            $_SESSION['reg_err'] = "invalid password ";
            header("location: ../views/user_register_page.php?error=invalid_password");

        } else {
            header("location: ../views/user_register_page.php?error=invalid_data");
        }

    }

}
function send_mail($email)
{

}
