<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$id = $_GET['id'];

$sql = "SELECT p.*, u.avatar_url as author_avatar 
        FROM posts p 
        LEFT JOIN users u ON p.author_name = u.username 
        WHERE p.id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>