<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
include "db.php";

$id = $_POST['id'];

if(isset($id)) {
    // Delete comments associated with the post first (optional, depends on ON DELETE CASCADE, but good practice if not set)
    $sql_comments = "DELETE FROM comments WHERE post_id='$id'";
    mysqli_query($conn, $sql_comments);

    // Delete the post
    $sql_post = "DELETE FROM posts WHERE id='$id'";
    if(mysqli_query($conn, $sql_post)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
