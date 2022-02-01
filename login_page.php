<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("location: ./index.php");

} else if (isset($_COOKIE['user_id'])) {

    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['session_id'] = $_COOKIE['session_id'];
    $_SESSION['user_type'] = $_COOKIE['user_type'];
    header("location: ./index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="./images/icon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type='text/css' href="./css/login_page.css">
  <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
  <link rel="stylesheet" type='text/css' href="./css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script defer src="./javascript/login_validation.js"></script>
  <title>Login Page</title>
</head>
  <body>
    <div class="container-fluid p-0 main_div">

      <div class="">
        <?php include './side_views/login_navbar.php'?>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="card col-lg-5 col-md-7 col-sm-10 col-12 justify-content-center p-5 m-5">
        <?php
if (isset($_SESSION['log_err_type'])) {?>
                    <div class="alert alert-<?php printf($_SESSION['log_err_type']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['log_err'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

        <?php
unset($_SESSION['log_err_type']);unset($_SESSION['log_err']);}?>
          <form id="form_signin" action="./Class/handle_login.class.php" method="POST">
            <h1 class="h3 mb-3 text-center login_head p-2">Please sign in</h1>
            <div class="card-body justify-content-center">
              <div class="row my-4">

                <input type="email" id="input_email" name="input_email" class="form-control col-12 " placeholder="Email address" required autofocus>

              </div>
              <div class="row my-3">

                <input type="password" id="input_password" name="input_password" class="form-control col-12" placeholder="Password" autocomplete="on" required>

              </div>

              <div class="row ">
                <div class="checkbox ">
                  <label>
                    <input type="checkbox" id="login_check" name="login_check" value="login_check"> Remember me </input>
                  </label>
                </div>
                <div class="forget_password ml-3">
                  <a href="./forget_password.php" > Forget password </a>
              </div>
              </div>

            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Sign in</button>
          </form>


        </div>

      </div>
      <div class="footer">
        <?php include "./side_views/footer.php"?>
      </div>
    </div>

      <!-- Bootstrap Js -->
      <script src="./javascript/jquery-3.5.1.min.js"></script>
      <script src="./javascript/bootstrap.min.js"></script>
      <script src="./javascript/popper.min.js"></script>
      <script src="./javascript/all.min.js"></script>

      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
