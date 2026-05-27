<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
include "db.php";

$id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;

if($id !== null) {
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id='$id'";
    if(mysqli_query($conn, $sql)) {
        // Fetch new like count
        $result = mysqli_query($conn, "SELECT likes FROM posts WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['success' => true, 'likes' => $row['likes']]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'missing_fields']);
}
?>
