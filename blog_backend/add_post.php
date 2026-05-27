<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : '';
$content = isset($_POST['content']) ? mysqli_real_escape_string($conn, $_POST['content']) : '';
$image_url = isset($_POST['image_url']) ? mysqli_real_escape_string($conn, $_POST['image_url']) : '';
$tags = isset($_POST['tags']) ? mysqli_real_escape_string($conn, $_POST['tags']) : '';
$author_name = isset($_POST['author_name']) ? mysqli_real_escape_string($conn, $_POST['author_name']) : 'Admin';

$sql = "INSERT INTO posts (title, content, image_url, tags, author_name) VALUES ('$title', '$content', '$image_url', '$tags', '$author_name')";

if (mysqli_query($conn, $sql)) {
    echo "Post added";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>