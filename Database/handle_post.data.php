<?php
include "../Database/database.data.php";

class Post extends Database
{
    public function add_post($product_title, $product_price, $post_details, $post_category, $img_res, $user_id)
    {
        $query = "INSERT INTO master_post (post_category,post_title,post_owner_id,product_price,post_content,post_image) VALUES ('$post_category', '$product_title','$user_id', '$product_price','$post_details','$img_res')";
        $res = $this->create($query); // inserting post content into database
        if ($res == 100) {
            $message['error'] = 100; //post successfull
            return $message;
        } else if ($res == 404) {
            $message['error'] = 404; // connection error
            return $message;
        } else if ($res == 102) {
            $message['error'] = 102; //failed to create post
            return $message;
        }
    }

}

/*
public function upload_img($img_name){

$query = "INSERT INTO post_images (post_category,post_title,post_owner_id,product_price,post_content,post_image) VALUES ('$post_category', '$product_title','$user_id', '$product_price','$post_details','$img_res')";
$res = $this->create($query); // inserting post content into database
if ($res == 100) {
$message['error'] = 100; //post successfull
return $message;
} else if ($res == 404) {
$message['error'] = 404; // connection error
return $message;
} else if ($res == 102) {
$message['error'] = 102; //failed to create post
return $message;
}
}

 */
