<?php

if (isset($_POST['submit'])) {
    $directory = "profile_images/";
    $img = $_FILES['profile_img'];
    $img_name = $_FILES['profile_img']['name'];
    $result = move_uploaded_file($img_name, $directory . $img_name);
}
