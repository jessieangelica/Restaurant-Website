<?php
include 'components/function.php';
$conn = connection();

$id = $_GET['productId'];
$query = "SELECT productName, typefile, size, productImage FROM product WHERE productId = '$id'";
$result = mysqli_query($conn,$query) or die('Error, query failed');
list($namefile, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$content");
echo $content;
?>