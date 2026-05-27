<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include "db.php";

if (isset($_POST['username']) && isset($_POST['avatar_url'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $avatar_url = mysqli_real_escape_string($conn, $_POST['avatar_url']);

    $sql = "UPDATE users SET avatar_url='$avatar_url' WHERE username='$username'";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing data"]);
}
?>
