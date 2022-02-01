<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: ./login_page.php");

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
    <link rel="stylesheet" type='text/css' href="./css/index.css">
    <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
    <link rel="stylesheet" type='text/css' href="./css/user_index.css">
    <link rel="stylesheet" type='text/css' href="./css/star.css">
    <link rel="stylesheet" type='text/css' href="./css/user_post.css">
    <link rel="stylesheet" type='text/css' href="./css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Review Website | index </title>
  </head>
  <body>
  <div class="container-fluid p-0 m-0">
      <div class="row">
        <div class="col-12">
        <?php include './Side_views/index_navbar.php'?>
        </div>
      </div>
      <div class="row">
      <?php if ($_SESSION['user_type'] == 'user') {
    include './side_views/user_index.php';
} else if ($_SESSION['user_type'] == 'page') {
    include './side_views/page_index.php';
}
?>
      </div>
  </div>




      <!-- Bootstrap Js -->
      <script src="javascript/jquery-3.5.1.min.js"></script>
      <script src="javascript/bootstrap.min.js"></script>
      <script src="javascript/popper.min.js"></script>
      <script src="javascript/all.min.js"></script>
     <!-- <script src="javascript/user_index_tab.js"></script> -->
      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
