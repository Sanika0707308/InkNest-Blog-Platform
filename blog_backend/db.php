<?php
header("Access-Control-Allow-Origin: *");
$host = "localhost";
$user = "root";
$pass = "";
$db   = "blog_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed");
}
?>