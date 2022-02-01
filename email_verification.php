<?php
session_start();

if (!isset($_GET['user_mail']) || isset($_SESSION['user_id'])) {
    header("location: ./login_page.php");

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
  <title>Email Verification</title>
</head>
  <body>
    <div class="container-fluid p-0 main_div">

      <div class="">
        <?php include './side_views/login_navbar.php'?>
      </div>

      <div class="row justify-content-center my-5">
        <div class="card col-lg-5 col-md-7 col-sm-10 col-12 justify-content-center p-5 m-5">
        <?php if (isset($_SESSION['verify_error'])) {?>
                    <div class="alert alert-<?php printf($_SESSION['verify_error']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['verify_msg'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

        <?php
unset($_SESSION['verify_error']);unset($_SESSION['verify_msg']);}?>
          <form id="email_verify" action="./Class/handle_verification.class.php?user_mail=<?php echo $_GET['user_mail'] ?>" method="POST">
            <div class=" card-body justify-content-center">

            <div class="row mb-3 ml-1">
              <h6 style="color:red">Please Verify your Account </h6>
            </div>
              <div class="row ">
                <div class="col-8 verify_code">
                    <input type="text" id="verify_code" name="verify_code" class="form-control " placeholder="Enter Verification Code" required autofocus>
                </div>
                <div class="d-flex col-4 verify_submit align-items-center"">
                <button class="btn btn-md btn-success btn-block" type="submit" id="submit" name="submit">Verify</button>
                </div>

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
