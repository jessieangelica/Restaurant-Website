
<?php

include 'components/function.php';
$conn = connection();

if(isset($_POST['productId']) || isset($_POST['productName']) || isset($_POST['productDesc'])  || isset($_POST['productType']) || isset($_POST['productPrice']) || isset($_POST['productQty']) || isset($_POST['productImage'])){
    $Id = $_POST['productId'];
    $Name =$_POST['productName'];
    $Desc = $_POST['productDesc'];
    $Type =$_POST['productType'];
    $Qty = $_POST['productQty'];
    $Price =$_POST['productPrice'];
    
    $no="";
    $qUpdate = "UPDATE product SET productName ='$Name', productDesc ='$Desc',productType='$Type', productPrice ='$Price',  productQty ='$Qty' WHERE productId = '$Id'";

    $update = mysqli_query($conn,$qUpdate);

if($update){
    echo "<script>
    alert('Data updated');
    document.location.href = 'product.php';
    </script>";
}else{
    echo "<script>
    alert('Data not updated');
    document.location.href = 'editproduct.php';
    </script>";
}
}
?>


