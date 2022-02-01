<?php session_start();

include "./input_validation.class.php";
include "../Database/handle_post.data.php";

$data_validate = new Validate();
$post = new Post();
// ******* getting form data through post method ****************
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['post_submit'])) {

        $product_title = $data_validate->validate_input($_REQUEST['post_title']);
        $product_price = $data_validate->validate_input($_REQUEST['product_price']);
        $post_details = $data_validate->validate_input($_REQUEST['post_content']);
        $post_category = $data_validate->validate_input($_REQUEST['post_category']);
        if (isset($_FILES['post_img'])) {
            $img_res = process_img($_FILES['post_img']);

        } else {
            $img_res = 404; // no img uploaded for post
        }
        if ($img_res == 102) {
            $_SESSION['post_error'] = "warning";
            $_SESSION['post_msg'] = "invalid file format selected";
            header("location: ../index.php?post=file_format_not_allowed");
        } else if ($img_res == 101) {
            $_SESSION['post_error'] = "warning";
            $_SESSION['post_msg'] = "failed to upload img";
            header("location: ../index.php?post=failed_to_upload_img");
        } else {
            $user_id = $_SESSION['user_id'];
            // img_res[404] = no img to upload
            $add_res = $post->add_post($product_title, $product_price, $post_details, $post_category, $img_res, $user_id);
            if ($add_res['error'] == 100) {
                $_SESSION['post_error'] = "success";
                $_SESSION['post_msg'] = "posted successfully";
                header("location: ../index.php?post=successfully_posted");
            } else if ($add_res['error'] == 404) {
                $_SESSION['post_error'] = "danger";
                $_SESSION['post_msg'] = "connection error";
                header("location: ../index.php?post=connection_error");
            } else if ($add_res['error'] == 102) {
                $_SESSION['post_error'] = "danger";
                $_SESSION['post_msg'] = "failed to create post";
                header("location: ../index.php?post=failed_to_create_post");
            }
        }

    } else {
        printf("something went wronge"); //submit is not submitted
    }

}

function process_img($img)
{

    $pic_name = $img['name'];
    $pic_ext = explode('.', $pic_name);
    $pic_actual_ext = strtolower(end($pic_ext));
    $pic_rename = bin2hex(random_bytes(4)) . time();
    $pic_type = $img['type'];
    $tmp_location = $img['tmp_name'];
    $allowed = array('jpg', 'jpeg', 'png', 'psd', 'gif');
    if (in_array($pic_actual_ext, $allowed)) {
        if (move_uploaded_file($tmp_location, "../assets/post_images/" . $pic_rename . "." . $pic_actual_ext)) {
            return $pic_rename . "." . $pic_actual_ext; // upload successful
        } else {
            return 101; // failed to upload
        }
    } else {
        return 102; // invalid file type
    }

}
