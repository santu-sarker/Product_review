<?php
session_start();

if (isset($_SESSION['user_id'])) {
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
  <link rel="stylesheet" type='text/css' href="./css/verify_page.css">
  <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
  <link rel="stylesheet" type='text/css' href="./css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Forget Password</title>
</head>
  <body>
    <div class="container-fluid p-0 main_div">

      <div class="">
        <?php include './side_views/login_navbar.php'?>
      </div>

      <div class="row justify-content-center my-5">
        <div class="card col-lg-5 col-md-7 col-sm-10 col-12 justify-content-center p-5 m-5">
        <?php if (isset($_SESSION['change_error'])) {?>
                    <div class="alert alert-<?php printf($_SESSION['change_error']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['change_msg'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

        <?php
unset($_SESSION['change_error']);unset($_SESSION['change_msg']);}?>
          <form id="email_verify" action="./Class/change_password.class.php?email=<?php echo $_GET['email'] ?>&verify_code=<?php echo $_GET['verify_code'] ?>" method="POST">
            <div class=" card-body justify-content-center">
                <div class="row my-4">

                    <input type="password" id="new_pass" name="new_pass" class="form-control col-12 " placeholder="Enter New Password" required autofocus>

                </div>
                <div class="row my-3">

                    <input type="password" id="confirm_pass" name="confirm_pass" class="form-control col-12" placeholder="Confirm Password" autocomplete="on" required>

                </div>
                <div class="row my-3">

                    <button class="btn btn-lg btn-primary btn-block " type="submit" id="submit" name="pass_submit">Change Password</button>

                </div>
            </div>


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
