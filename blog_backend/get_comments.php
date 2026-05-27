<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$post_id = $_GET['post_id'];

$sql = "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$comments = [];

while ($row = mysqli_fetch_assoc($result)) {
    $comments[] = $row;
}

echo json_encode($comments);
?>