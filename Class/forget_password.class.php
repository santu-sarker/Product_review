<?php
session_start();
include "./input_validation.class.php";
include "../Database/forget_password.data.php";

$user_validate = new Validate();
$forget_class = new Forget_Password();

if (isset($_POST['submit'])) {
    $email = $user_validate->validate_input($_POST['email']);
    $email_res = $forget_class->email_user($email);
    if ($email_res['error'] == 101 || $email_res['error'] == 404) {
        header("location: ../forget_password.php?fail_to_get_data");
    } else if ($email_res['error'] == 102) {
        header("location: ../forget_password.php?email_donot_exists");
    } else if ($email_res['error'] = 100) {
        $verify_code = $email_res['verify_code'];
        $_SESSION['forget_error'] = "success";
        $_SESSION['forget_msg'] = "check your Email For Reset Password !";
        header("location: ../forget_password.php?email_sent_successfully ");
    }

}
if (isset($_GET['verify_code']) && isset($_GET['email'])) {
    $verify_code = $_GET['verify_code'];
    $user_email = $_GET['email'];
    $change_res = $forget_class->change_pass($user_email, $verify_code);
    if ($change_res['error'] == 101 || $email_res['error'] == 404) {
        header("location: ../forget_password.php?fail_to_update");
    } else if ($email_res['error'] == 102) {
        header("location: ../forget_password.php?email_donot_exists");
    } else if ($email_res['error'] = 100) {

        $_SESSION['forget_error'] = "success";
        $_SESSION['forget_msg'] = "check your Email For Reset Password !";
        header("location: ../change_password.php?email=$user_email&verify_code=$verify_code ");
    }
}
