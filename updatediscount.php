<?php

include 'components/function.php';
$conn = connection();

if(isset($_POST['discountId']) || isset($_POST['discountName']) || isset($_POST['discountCode']) || isset($_POST['discountAmount'])){
   
    $Id = $_POST['discountId'];
    $Name =$_POST['discountName'];
    $Code = $_POST['discountCode'];
    $Amount =$_POST['discountAmount'];
    
    $sql="UPDATE discount SET discountName = '$Name', discountCode = '$Code', discountAmount = '$Amount' WHERE discountId = '$Id'";
    $update = mysqli_query($conn, $sql);

if($update){
    echo "<script>
    alert('Data updated');
    document.location.href = 'discount.php';
    </script>";
}else{
    echo "<script>
    alert('Data not updated');
    document.location.href = 'editdiscount.php';
    </script>";
}

}
?>


