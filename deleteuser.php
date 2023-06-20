<?php 
include 'components/function.php';
$Id = $_GET['id'];

if(deleteUser($Id) > 0 ) {
    echo "<script>
              alert('Data deleted');
              document.location.href = 'usersetting.php';
          </script>";
}  
?>