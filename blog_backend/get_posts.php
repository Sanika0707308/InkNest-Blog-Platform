<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$sql = "SELECT p.*, u.avatar_url as author_avatar, COUNT(c.id) as comment_count 
        FROM posts p 
        LEFT JOIN comments c ON p.id = c.post_id 
        LEFT JOIN users u ON p.author_name = u.username
        GROUP BY p.id 
        ORDER BY p.id DESC";
$result = mysqli_query($conn, $sql);

$posts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}

echo json_encode($posts);
?>