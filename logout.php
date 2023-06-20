<h4>Log out success</h4>
<?php 
session_start(); 
session_destroy(); 
header("location:login.php"); 
exit();
?>

