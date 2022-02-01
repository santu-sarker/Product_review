<?php
session_start();
include "./input_validation.class.php";
include "../Database/forget_password.data.php";

$user_validate = new Validate();
$forget_class = new Forget_Password();

if (isset($_POST['pass_submit'])) {
    $email = $user_validate->validate_input($_GET['email']);
    $verify_code = $user_validate->validate_input($_GET['verify_code']);
    $new_pass = $user_validate->validate_input($_POST['new_pass']);
    $confirm_pass = $user_validate->validate_input($_POST['confirm_pass']);
    if ($new_pass == $confirm_pass) {
        $change_res = $forget_class->reset_pass($email, $verify_code, $new_pass);
        if ($change_res['error'] == 100) {
            $_SESSION['log_err_type'] = "success";
            $_SESSION['log_err'] = "password updated successfully !";
            header("location: ../login_page.php?password_update_successfull");
        } elseif ($change_res['error'] == 102) {
            $_SESSION['change_error'] = "danger";
            $_SESSION['change_msg'] = "Invalid User !";
            header("location: ../change_password.php?user_not_found");
        } else {
            $_SESSION['change_error'] = "danger";
            $_SESSION['change_msg'] = "Failed To Update !";
            header("location: ../change_password.php?fail_to_update");
        }

    } else {
        $_SESSION['change_error'] = "warning";
        $_SESSION['change_msg'] = "new password and confirm password mismatch";
        header("location: ../change_password.php?input_data_mismatch");
    }
}
