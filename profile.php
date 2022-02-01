<?php
session_start();
include './Class/profile_handle.class.php';

if (!isset($_SESSION['user_id'])) {
    header("location: ./login_page.php");

}
if (isset($_GET['profile_id'])) {
    $profile = new Profile_Handle();
    $data = $profile->profile_id($_GET['profile_id']);
    printf("foound id : " . $_SESSION['user_id']);
    if ($_GET['profile_id'] == $_SESSION['user_id']) {
        printf(" \n\n matched ");
    } else {
        printf("don't match");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <?php if ($_SESSION['user_type'] == 'user') {?>
         <link rel="stylesheet" type="text/css" href="./css/profile.css">
    <?php }?>
    <?php if ($_SESSION['user_type'] == 'page') {?>
         <link rel="stylesheet" type="text/css" href="./css/page_profile.css">
         <link rel="stylesheet" type="text/css" href="./css/user_post.css">
    <?php }?>
    <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
    <link rel="stylesheet" type='text/css' href="./css/footer.css">

    <title>Review Website | profile</title>
  </head>
  <body>
    <div class="container-fluid p-0 m-0 main_div">
    <div class="">
        <?php include './Side_views/index_navbar.php'?>
    </div>
    <div class="container-fluid p-0 m-0 profile_div_container">
        <?php
if ($_SESSION['user_type'] == 'user') {
    include './side_views/user_profile.php';

} else if ($_SESSION['user_type'] == 'page') {
    include './side_views/page_profile.php';
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
      <script src="javascript/all.min.js">

      </script>

      </script>
      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
