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
		if ($_POST['password'] == $row["password"]) {
			echo 'Welcome, ' . $_POST['login'];
		} else {
			echo 'Wrong password';
		}
	} else {
		echo 'No such user'; 
	}
	
	mysqli_close($connection);
?>