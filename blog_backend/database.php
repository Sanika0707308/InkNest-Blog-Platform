<?php
$conn = mysqli_connect("localhost", "root", "","shop") ;
$result = mysqli_query($conn, "Select * from items");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
while($row = mysqli_fetch_assoc($result)) {
?>
<div style="border:1px solid black; padding:10px; margin:10px; width:200px;">
    <p>Product ID: <?php echo $row['Product_ID']; ?></p>
    <p>Product Name: <?php echo $row['Product_Name']; ?></p>
    <p>Price: <?php echo $row['Price']; ?></p>
    <p>Discount: <?php echo $row['Discount']; ?></p>
    <p>Final_Price: <?php echo $row['Final_Price']; ?></p>
</div>

<?php
}
?>

</body>
</html>