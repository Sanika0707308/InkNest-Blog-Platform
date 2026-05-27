<?php
require "db.php";

$result = mysqli_query($conn, "SHOW COLUMNS FROM posts");
while($row = mysqli_fetch_assoc($result)){
    echo $row['Field'] . " - " . $row['Type'] . "<br>";
}
?>
