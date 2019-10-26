<?php

function connect(){

	$server='localhost';
	$admin='root';
	$password='mypassword';
	$database = 'camagru';

	//connect to the database
	$conn = NULL;
	try{
		$conn = new PDO("mysql:host=$server;dbname=$database", $admin, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Database Connected <br />";
		return $conn;
		var_dump ($conn);
	} catch(PDOException $e)
	{
		echo "testis";
		die($e->getMessage().'<br />');
		return null;
	}
}
?>