<?php
	
	session_start();
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	require_once 'inc/dbcon.php';
	$conn = connect();

	$sql = "select * from users where email='$email' AND pass='$pass'";
	$result = $conn->query($sql);
		
	if($result->num_rows > 0){
		foreach($result AS $row){
			$_SESSION['user_name'] = $row['name'];
			$_SESSION['role'] = $row['user_role'];
		}
		
		$_SESSION['loggedin'] = true;
		header('location:index.php');
	}else{
		$_SESSION['msg'] = 'Invalid user';
		header('location:login.php');
	}