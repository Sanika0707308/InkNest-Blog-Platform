<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
include "db.php";

$id = $_POST['id'];

if(isset($id)) {
    // Delete the comment
    $sql = "DELETE FROM comments WHERE id='$id'";
    if(mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
