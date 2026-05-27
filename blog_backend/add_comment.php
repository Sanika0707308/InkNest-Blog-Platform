<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$post_id = $_POST['post_id'];
$name = $_POST['name'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (post_id, name, comment) 
        VALUES ('$post_id', '$name', '$comment')";

if (mysqli_query($conn, $sql)) {
    echo "Comment added";
} else {
    echo "Error";
}
?>