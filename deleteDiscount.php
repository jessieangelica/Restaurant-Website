<?php 
include 'components/function.php';
$Id = $_GET['discountId'];

if(deleteDiscount($Id) > 0 ) {
    echo "<script>
              alert('Data deleted');
              document.location.href = 'discount.php';
          </script>";
}  
?>