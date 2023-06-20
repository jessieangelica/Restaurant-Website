<?php 
include 'components/function.php';
$Id = $_GET['id'];

if(deleteProduct($Id) > 0 ) {
    echo "<script>
              alert('Data deleted');
              document.location.href = 'product.php';
          </script>";
}  
?>