<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
include "db.php";

$id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;
$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : null;
$content = isset($_POST['content']) ? mysqli_real_escape_string($conn, $_POST['content']) : null;
$image_url = isset($_POST['image_url']) ? mysqli_real_escape_string($conn, $_POST['image_url']) : '';
$tags = isset($_POST['tags']) ? mysqli_real_escape_string($conn, $_POST['tags']) : '';
$author_name = isset($_POST['author_name']) ? mysqli_real_escape_string($conn, $_POST['author_name']) : 'Admin';

if($id !== null && $title !== null && $content !== null) {
    $sql = "UPDATE posts SET title='$title', content='$content', image_url='$image_url', tags='$tags', author_name='$author_name' WHERE id='$id'";
    if(mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "missing_fields";
}
?>
