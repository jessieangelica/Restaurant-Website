<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "ssip";

$conn = mysqli_connect($host, $user, $pass, $database);
if (isset($_POST['submit'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productQty = $_POST['productQty'];
    $productImage = $_POST['productImage'];

    $sql = "insert into product(productId,productName,productDesc,productPrice,productQty,productImage) values ('$productId','$productName', '$productDesc','$productPrice', 'productQty', 'productImage')";
    $insert = mysqli_query($conn, $sql);
}
?>

<?php if (isset($_POST['submit'])) ?>
<table border="1">
    <tbody>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Image</th>
        </tr>
        <?php
    $sql = mysqli_query($conn, "SELECT * from product");
    $no = 1;
    foreach ($sql as $row) {
        echo
            "<tr>
            <td>" . $row['productId'] . "</td>
            <td>" . $row['productName'] . "</td>
            <td>" . $row['productDesc'] . "</td>
            <td>" . $row['productPrice'] . "</td>
            <td>" . $row['productQty'] . "</td>
            <td>" . $row['productImage'] . "</td>
            <td> <a href=product_delete.php?productId=" . $row['productId'] . "> Delete </a> &nbsp;
             <a href=product_update.php?productId=" . $row['productId'] . "> Update </a> </td>
            </tr>
           ";
        $no++;
    }
        ?>
    </tbody>
</table>
