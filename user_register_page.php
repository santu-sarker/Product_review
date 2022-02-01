<?php session_start();
if (isset($_SESSION['user_id'])) {
    header("location: ./index.php");

} else if (isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['first_name'] = $_COOKIE['first_name'];
    $_SESSION['last_name'] = $_COOKIE['last_name'];
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
  <link rel="stylesheet" type='text/css' href="./css/user_registration.css">
  <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
  <link rel="stylesheet" type='text/css' href="./css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script defer src="./javascript/user_registration_validation.js"></script>
  <title>Registration Page</title>
</head>
  <body>

    <div class="container-fluid p-0 main_div">

      <div class="">
        <?php include './side_views/login_navbar.php'?>
      </div>
      <div class="row justify-content-center my-3">
        <div class="card col-lg-6 col-md-8 col-sm-10 col-12 justify-content-center p-5 m-5 user_card">
        <?php
if (isset($_SESSION['reg_err_type'])) {?>
                    <div class="alert alert-<?php printf($_SESSION['reg_err_type']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['reg_err'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

        <?php
unset($_SESSION['reg_err']);unset($_SESSION['reg_err_type']);}?>
          <form class="form-signin" action="./Class/handle_user_registration.class.php" method="POST">
            <h1 class="h3 mb-3 text-center register_head p-2">User Registration </h1>
            <div class="card-body justify-content-center">
              <div class="row my-3">

                <input type="name" name="first_name" id="first_name" class="form-control col-lg-6 col-md-6 col-sm-12 col-12  " placeholder="First Name" required autofocus>
                <input type="name" name="last_name" id="last_name" class="form-control col-lg-6 col-md-6 col-sm-12 col-12" placeholder="Last Name" required autofocus>

              </div>
              <div class="row my-3">

                <input type="email" name="user_email" id="user_email" class="form-control col-12 "  placeholder="Enter a Valid Email Adress" required autofocus>

              </div>
              <div class="row my-3">

                <input type="password" name="user_pass" id="user_Password" class="form-control col-12" placeholder="Password" autocomplete="on" required>

              </div>
              <div class="row my-3">

                <input type="password" name="user_confirm_password" id="confirm_password" class="form-control col-12" placeholder="Confirm Entered Password" autocomplete="on" required>

              </div>
              <div class="row gender_pad">
                <div class="text col-3 gender_pad">Gender</div>
                <div class=" form-check col-3 ">
                <label class="gender-check-label " for="male">
                <input  type="radio" class="form-check-input" id="male" name="gender" value="male" >Male
                </label>
                </div>
                <div class="form-check col-3">
                <label class="gender-check-label" for="female">
                <input type="radio" class="form-check-input" id="female" name="gender" value="female">Female
                </label>
                </div>
              </div>
              <div class="row checkbox ">

                <label class="form-check-label col-lg-12 col-md-12 col-sm-12 col-12">
                  <input type="checkbox" name="check_box" id="user_check" class="form-check-input" required>
                  I Read and Accept <a href="#">Terms and Conditions</a>
                </label>

              </div>

            </div>

            <button class="btn btn-lg btn-success btn-block" type="submit" id="submit" name="submit">Create Account</button>
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
      <script src="./javascript/sweetalert.min.js"></script>
      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
