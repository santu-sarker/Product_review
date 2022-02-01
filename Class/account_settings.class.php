<?php
session_start();
require "../Database/account_settings.data.php";
include "./input_validation.class.php";

$validate = new Validate();
$account = new Account();
/***************************** password change section ************************ */

if (isset($_POST['password_change'])) {
    $c_password = $validate->validate_input($_POST['c_password']);
    $n_password = $validate->validate_input($_POST['n_password']);
    $cn_password = $validate->validate_input($_POST['cn_password']);
    $email = $_SESSION['user_email'];
    $session_id = $_SESSION['session_id'];
    $user_id = $_SESSION['user_id'];

    if ($n_password == $cn_password) {

        $pass_response = $account->pass_change($email, $session_id, $c_password, $n_password);
        if ($pass_response['code'] == 100) {
            $_SESSION['log_err_type'] = "success";
            $_SESSION['log_err'] = "Password Successfully updated";
            header("location: ../logout.php");

        } else if ($pass_response['code'] == 101) {
            $_SESSION['pass_change_error'] = "danger";
            $_SESSION['pass_change_error_log'] = "wronge password provided !";
            header("location: ../account_settings.php?tab=change_pass&res=incorrect_pass");
        } else if ($pass_response['code'] == 102 || $pass_response['code'] == 102) {
            $_SESSION['pass_change_error'] = "warning";
            $_SESSION['pass_change_error_log'] = "Failed To Update Password";
            header("location: ../account_settings.php?tab=change_pass&res=failed_to_update");
        } else if ($pass_response['code'] == 404 || $pass_response['code'] == 110) {
            $_SESSION['pass_change_error'] = "warning";
            $_SESSION['pass_change_error_log'] = "something went wrong !";
            header("location: ../account_settings.php?tab=change_pass&res=connection_error");
        }
    } else {
        $_SESSION['pass_change_error'] = "warning";
        $_SESSION['pass_change_error_log'] = "New Password & Confirm Password Do not Match";
        header("location: ../account_settings.php?tab=change_pass&res=n_pass_c_pass_mismatch");
    }
}

/*
if ($n_password == $cn_password) {

$pass_response = $account->pass_verify($email, $session_id, $c_password, $n_password);
if ($pass_response['code'] == 100) {
$_SESSION['log_err_type'] = "success";
$_SESSION['log_err'] = "Password Successfully updated";
header("location: ../login_page.php");

} else if ($pass_response['code'] == 101) {
$_SESSION['pass_change_error'] = "danger";
$_SESSION['pass_change_error_log'] = json_encode($pass_response['pass']);
header("location: ../account_settings.php?incorrect_pass");
} else {
$_SESSION['pass_change_error'] = "warning";
$_SESSION['pass_change_error_log'] = "Failed To Update Password";
header("location: ../account_settings.php");
}
} else {
$_SESSION['pass_change_error'] = "warning";
$_SESSION['pass_change_error_log'] = "New Password & Confirm Password Mismatch";
header("location: ../account_settings.php");
}

 */
