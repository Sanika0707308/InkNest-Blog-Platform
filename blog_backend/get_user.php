<?php
header("Access-Control-Allow-Origin: *");
include "db.php";

$username = $_GET['username'];

$sql = "SELECT username, avatar_url FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(["status" => "success", "user" => $row]);
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
?>
