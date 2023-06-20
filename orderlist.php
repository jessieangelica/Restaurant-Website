<?php

include 'components/function.php';
$conn = connection();
if(isset($_POST['name']) && isset($_POST['price'])){

    $name = $_POST['name'];
    $total = $_POST['price'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $date = date('Y-m-d');
    $query = mysqli_query($conn, "INSERT INTO productorder (userName, price, orderTime, orderQty, orderList) VALUES ('$name', '$total', '$date', '$quantity', '$item')");
    
    if($query){
        echo "<script>alert('Order Success!')</script>";
        echo "<script>window.location.href='dashboarduser.php'</script>";
    }
}
?>