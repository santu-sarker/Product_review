<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="./css/account_settings.css">
    <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
    <link rel="stylesheet" type='text/css' href="./css/footer.css">

    <title>Review Website | settings</title>
  </head>
  <body>
    <div class="container-fluid p-0 m-0 main_div">
    <div class="">
        <?php include './Side_views/index_navbar.php'?>
    </div>
    <div class="profile_div_container">
        <?php
if ($_SESSION['user_type'] == 'user') {
    include './side_views/user_settings.php';

} else if ($_SESSION['user_type'] == 'page') {
    include './side_views/page_settings.php';
}
?>
    </div>
    <div class="footer">
        <?php include "./side_views/footer.php"?>
      </div>
    </div>

      <!-- Bootstrap Js -->
      <script src="javascript/jquery-3.5.1.min.js"></script>
      <script src="javascript/bootstrap.min.js"></script>
      <script src="javascript/popper.min.js"></script>
      <script src="javascript/all.min.js"></script>
      <script src="javascript/tab_content.js"></script>
      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
