<?php
	error_reporting(E_ALL ^ E_WARNING);
	$connection = mysqli_connect('127.0.0.1', 'root', '', 'lp');
	
	if($connection == false) {
		echo 'Database connection error';
		echo mysqli_connect_error();
		exit();
	}
	
	$query = "SELECT * FROM `data` WHERE `login` = '" . $_POST['login'] . "';";
	$result = mysqli_query($connection, $query);
	
	$row = $result->fetch_assoc();
	if (array_shift($row) != null) {
		echo 'This user already exists';
	} else {
		$query = "INSERT INTO `data` (`login`, `password`) VALUES ('" . $_POST['login'] . "', '" . $_POST['password'] . "');";
		mysqli_query($connection, $query);
		echo 'Register successful'; 
	}
	
	mysqli_close($connection);
?>