<?php
session_start();
if (!isset($_SESSION['username'])){
	header("Location: youmustlogin.php");
}
?>

<h4>Login Success</h4>

<p>Logged in as 
        <?php echo $_SESSION['username']; ?> 
</p>
        <a href="logout.php"><input type="button" value="Log Out"></a>

