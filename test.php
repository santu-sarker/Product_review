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
  <title>Login Page</title>
</head>
  <body>
    <div class="container-fluid p-0 main_div">

      <div class="">
        <?php include './side_views/login_navbar.php'?>
      </div>
      <div class="row space-sec">
      <section>
        <h2>image upload</h2>

        <form action="./class/image_upload.class.php" method="post" enctype="multipart/form-data">
          <input type="file" name="profile_img" id="fileToUpload" accept="image/*"  >
          <input type = "submit" name="submit" >
          <button id="remove">remove img</button>
          <section>
            <img src="" height="50"  alt="Image preview..." id="preview_img">
          </section>
        </form>
      </section>
      </div>
      <div class="">
        <?php include './side_views/footer.php'?>
      </div>
    </div>

      <!-- Bootstrap Js -->
      <script src="./javascript/jquery-3.5.1.min.js"></script>
      <script src="./javascript/bootstrap.min.js"></script>
      <script src="./javascript/popper.min.js"></script>
      <script src="./javascript/all.min.js"></script>
      <script src="./javascript/profile_img.js"></script>

      <!-- <script src="./javascript/header.js"> </script> -->
  </body>
</html>
