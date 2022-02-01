<?php

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
  <link rel="stylesheet" type='text/css' href="./css/footer.css">
  <link rel="stylesheet" type='text/css' href="./css/index_navbar.css">
  <link rel="stylesheet" type='text/css' href="./css/user_post.css">
  <title>Test page</title>
</head>
  <body>
    <div class="container-fluid p-0 main_div">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#post_modal">modal</button>
        <?php include './side_views/post_modal.php'?>
        <?php printf(strtolower(bin2hex(random_bytes(4))) . time())?>
    </div>

      <!-- Bootstrap Js -->
      <script src="./javascript/jquery-3.5.1.min.js"></script>
      <script src="./javascript/bootstrap.min.js"></script>
      <script src="./javascript/popper.min.js"></script>
      <script src="./javascript/all.min.js"></script>

      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
