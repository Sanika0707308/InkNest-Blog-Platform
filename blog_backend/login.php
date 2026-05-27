<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include "db.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(["status" => "success", "username" => $row['username'], "avatar_url" => $row['avatar_url']]);
    } else {
        echo json_encode(["status" => "invalid"]);
    }

} else {
    echo json_encode(["status" => "no data received"]);
}
?>