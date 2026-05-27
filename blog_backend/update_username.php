<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include "db.php";

if (isset($_POST['old_username']) && isset($_POST['new_username'])) {
    $old_username = mysqli_real_escape_string($conn, $_POST['old_username']);
    $new_username = mysqli_real_escape_string($conn, $_POST['new_username']);

    if ($old_username === $new_username) {
        echo json_encode(["status" => "success"]);
        exit;
    }

    // Check if new username is taken
    $check_sql = "SELECT id FROM users WHERE username='$new_username'";
    $check_res = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_res) > 0) {
        echo json_encode(["status" => "error", "message" => "Username already taken"]);
        exit;
    }

    // Update users table
    $update_user_sql = "UPDATE users SET username='$new_username' WHERE username='$old_username'";
    if (mysqli_query($conn, $update_user_sql)) {
        // Cascade to posts table
        $update_posts_sql = "UPDATE posts SET author_name='$new_username' WHERE author_name='$old_username'";
        mysqli_query($conn, $update_posts_sql);

        // Cascade to comments if author_name is stored there (Assuming not needed based on current schema, but good practice)
        
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing data"]);
}
?>
