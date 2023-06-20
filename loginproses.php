<?php
session_start();
	require 'components/function.php';
	$username = $_POST["username"];
	$pass = $_POST["password"];
	$conn = connection();

if($_GET['mod']=='login'){
	$Q=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$pass'");
	$r=mysqli_fetch_array($Q);

	//check data
	if(mysqli_num_rows($Q)){
	$_SESSION['username']=$r['username'];
	$_SESSION['name']=$r['name'];
		$_SESSION['pass']=$r['password'];
		$_SESSION['id']=$r['id'];
		$_SESSION['role']=$r['role'];

		if($r['role'] == 'admin'){
			header('location:dashboardadmin.php');	
		} elseif ($r['role'] == 'cashier'){
			header('location:dashboardcashier.php');
		} else {
			header('location:dashboarduser.php');
	}
	}
	else {
	header('location:login.php');	
	}
}


