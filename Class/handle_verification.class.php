<?php
session_start();
include "../Database/register_user.data.php";
$verify = new Register_user();
if (isset($_GET['token'])) {
    $url_token = $_GET['token'];
    $user_email = $_GET['email'];
    $get_token = $verify->get_token($user_email);
    $verify_sts = $verify->verify_status($user_email);
    if ($verify_sts['status'] == 100) {
        $_SESSION['log_err_type'] = "warning";
        $_SESSION['log_err'] = "Account Already Verified!";
        header("location: ../login_page.php?error=already_verified");
    } else if ($verify_sts['status'] == 101 || $verify_sts['status'] == 102) {
        $_SESSION['log_err_type'] = "danger";
        $_SESSION['log_err'] = "Account do not exists";
        header("location: ../login_page.php?error=account_not_found");
    }
    if ($get_token['status'] == 100) {
        if ($get_token['token'] == $url_token) {
            header("location: ../login_page.php?error=verified");
        } else {
            header("location: ../login_page.php?error=not_verified");
        }
    } else {
        header("location: ../login_page.php?error=failed_to_get_token");
    }
}
if (isset($_POST['submit'])) {
    $page_verify_code = $_POST['verify_code'];
    $page_email = $_GET['user_mail'];
    $code_res = $verify->get_verify_code($page_email);

    if ($code_res['status'] == 100) {
        if ($code_res['verify_code'] == $page_verify_code) {
            if ($verify->verify_change($page_email) == 100) {
                $_SESSION['log_err_type'] = "success";
                $_SESSION['log_err'] = "Account verified successfully";
                header("location: ../login_page.php?error=verified_through_code");
            } else {
                $_SESSION['verify_error'] = "danger";
                $_SESSION['verify_msg'] = "failed to update in database";
                header("location: ../email_verification.php?error=fail_to_update");
            }

        } else {
            $_SESSION['verify_error'] = "danger";
            $_SESSION['verify_msg'] = "Incorrect Verification Code ";
            header("location: ../email_verification.php?user_mail=$page_email");
        }
    } elseif ($code_res['status'] == 101) {
        $_SESSION['log_err_type'] = "danger";
        $_SESSION['log_err'] = "Account do not exists";
        header("location: ../login_page.php?error=account_not_found");

    }

}

/*
if ($code_res['status'] == 100) {
if ($code_res['verify_code'] == $page_verify_code) {
$_SESSION['log_err_type'] = "success";
$_SESSION['log_err'] = "Account verified successfully";
header("location: ../login_page.php?error=verified_through_code");
} else {
$_SESSION['verify_error'] = "danger";
$_SESSION['verify_msg'] = "Account verified successfully";
header("location: ../email_verification.php?error=verification_code_did_not_match");
}
} elseif ($code_res['status'] == 101) {
$_SESSION['log_err_type'] = "danger";
$_SESSION['log_err'] = "Account do not exists";
header("location: ../login_page.php?error=account_not_found");

}
 */
