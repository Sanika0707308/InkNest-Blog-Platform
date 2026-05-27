<?php
require "db.php";

$sql = "ALTER TABLE posts 
ADD COLUMN image_url VARCHAR(255) DEFAULT '',
ADD COLUMN tags VARCHAR(255) DEFAULT '',
ADD COLUMN likes INT DEFAULT 0,
ADD COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN author_name VARCHAR(100) DEFAULT 'Admin';";

if (mysqli_query($conn, $sql)) {
    echo "Migration successful.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
