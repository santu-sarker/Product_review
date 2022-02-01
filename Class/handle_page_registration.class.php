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
        $page_name = $validate_user->validate_input($_REQUEST['page_name']);
        $page_email = $validate_user->validate_input($_REQUEST['page_email']);
        $page_pass = $validate_user->validate_input($_REQUEST['page_pass']);
        $page_confirm_pass = $validate_user->validate_input($_REQUEST['page_confirm_password']);
        $check_box = $_REQUEST['check_box'];

        $check_password = $validate_user->pass_check($page_pass, $page_confirm_pass);
        $check_email = $validate_user->email_check($page_email);
        $check_name = $validate_user->page_check($page_name);
        if ($check_email == true && $check_password == true && $check_box == true) {
            $type = "page";
            $user = $register_user->create_page($page_name, $page_email, $page_pass, $type);

            if ($user == 100) {

                $get_token = $register_user->get_token($page_email);
                $get_code = $register_user->get_verify_code($page_email);
                if ($get_token['status'] == 100 && $get_code['status'] == 100) {
                    $token = $get_token['token'];
                    $verify_code = $get_code['verify_code'];
                    $subject = 'Product Review(verification)';
                    $token_msg = "Hello " . $page_name . " " . "Here Is Your Account Activation Link : http://localhost/Product_Review/Class/handle_verification.class.php?email=$page_email&token=$token' ";
                    $verify_msg = "Verification Code :" . $verify_code;
                    $body = $token_msg . "" . $verify_msg;

                    $mail_res = $send_mail->send_email($page_email, $subject, $body);
                    if ($mail_res == 100) {
                        header("location: ../email_verification.php?user_mail=$page_email");
                    } elseif ($mail_res == 101) {
                        header("location: ../email_verification.php?error=failed_to_sent_mail");
                    }
                } else {
                    $_SESSION['reg_err_type'] = "danger";
                    $_SESSION['reg_err'] = "Something Went Wrong";
                    header("location: ../email_verification.php?error=failed_to_get_token_or_verify_code");
                }
            } else if ($user = 101) {
                $_SESSION['page_reg_err_type'] = "danger";
                $_SESSION['page_reg_err'] = "Page Already Exists !";
                header("location: ../page_register_page.php?error=page_already_exists");
            } else if ($user = 102) {
                $_SESSION['page_reg_err_type'] = "warning";
                $_SESSION['page_reg_err'] = "Connection Error !";
                header("location: ../page_register_page.php?error=Connection_error");
            }

        } else if ($check_name == false) {
            $_SESSION['page_reg_err_type'] = "warning";
            $_SESSION['page_reg_err'] = "Invalid Name Format !";
            header("location: ../page_register_page.php?error=invalid_name_format");

        } else if ($check_email == false) {
            $_SESSION['page_reg_err_type'] = "warning";
            $_SESSION['page_reg_err'] = "Invalid Email Adress !";
            header("location: ../page_register_page.php?error=invalid_email_address");

        } else if ($check_password == false) {
            $_SESSION['page_reg_err_type'] = "warning";
            $_SESSION['page_reg_err'] = "Password Mismatch !";
            header("location: ../page_register_page.php?error=password_mismatch");

        }

    }

}
