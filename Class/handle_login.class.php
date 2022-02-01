<?php session_start();
include "../Database/register_user.data.php";
include "./input_validation.class.php";
$user_login = new Register_user();
$user_validate = new Validate();

// ******* getting form data through post method ****************
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {

        $email = $user_validate->validate_input($_REQUEST['input_email']);
        $pass = $user_validate->validate_input($_REQUEST['input_password']);

        if ($user_validate->email_check($email)) {
            $user = $user_login->login_user($email, $pass);
            $login_check = isset($_REQUEST['login_check']);

            if ($user['code'] == 100) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_type'] = $user['user_type'];
                $_SESSION['session_id'] = $user['session_id'];
                /*$user_array = explode("*brk*", $user['user_name']);
                $_SESSION['first_name'] = $user_array[0];
                $_SESSION['last_name'] = $user_array[1]; */
                header("location: ../index.php?user_mail=$email");

                if ($login_check) {
                    login_save($user);
                }

            } else if ($user['code'] == 105) {

                $email = $user['user_email'];
                header("location: ../email_verification.php?user_mail=$email");

            } else if ($user['code'] = 101) {
                $_SESSION['log_err_type'] = "danger";
                $_SESSION['log_err'] = "invalid Credintials !";
                header("location: ../login_page.php?error=email_or_password_mismatch");
            } else if ($user['code'] = 102) {
                $_SESSION['log_err_type'] = "warning";
                $_SESSION['log_err'] = "User Do Not Exists !";
                header("location: ../login_page.php?error=user_do_not_exists");
            } else if ($user['code'] = 103) {
                $_SESSION['log_err_type'] = "warning";
                $_SESSION['log_err'] = "Connection Error !";
                header("location: ../login_page.php?error=connection_error");
            } else if ($user['code'] = 104) {
                $_SESSION['log_err_type'] = "warning";
                $_SESSION['log_err'] = "Failed to Login !";
                header("location: ../login_page.php?error=fail_to_fetch_session_id");
            }
        } else if ($user_validate->email_check($email) != true) {
            $_SESSION['log_err_type'] = "warning";
            $_SESSION['log_err'] = "invalid email address !";
            header("location: ../login_page.php?error=invalid_email_address");

        } else {
            $_SESSION['log_err_type'] = "warning";
            $_SESSION['reg_err'] = "invalid Data !";
            header("location: ../login_page.php?error=invalid_data");
        }

    } else {
        printf("something went wronge"); //submit is not submitted
    }

}

function login_save($user)
{
    /* $user_array = explode("*brk*", $user['user_name']);
    $user_name['first_name'] = $user_array[0];
    $user_name['first_name'] = $user_array[1]; */
    setcookie("user_id", $user['user_id'], time() + (86400 * 2), "/");
    setcookie("user_email", $user['user_email'], time() + (86400 * 2), "/");
    setcookie("session_id", $user['session_id'], time() + (86400 * 2), "/");
    /* setcookie("first_name", $user_name['first_name'], time() + (86400 * 2), "/");
    setcookie("last_name", $user_name['last_name'], time() + (86400 * 2), "/"); */
    setcookie("user_type", $user['user_type'], time() + (86400 * 2), "/");

}
