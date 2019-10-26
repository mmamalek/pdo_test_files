<?php
$server='localhost';
$admin='root';
$password='mypassword';
$database = 'camagru';

//connect to the host
$conn = NULL;
try{
	$conn = new PDO("mysql:host=$server", $admin, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Host Connected <br />";
} catch(PDOException $e)
{
	die($e->getMessage().'<br />');
}

//create database
try{
	$query = "CREATE DATABASE $database";
	$conn->exec($query);
	echo "Database created<br />";
} catch(PDOException $e){
	die($e->getMessage().'<br />');
}

//connect to the database
$conn = NULL;
try{
	$conn = new PDO("mysql:host=$server;dbname=$database", $admin, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Database Connected <br />";
} catch(PDOException $e)
{
	die($e->getMessage().'<br />');
}

//create users table
try{
	$query = "CREATE TABLE `camagru`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `passwd` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `notifications` BOOLEAN NOT NULL DEFAULT TRUE , `verified` BOOLEAN NULL DEFAULT FALSE, `verification-code` VARCHAR(255) NOT NULL DEFAULT '0', `registration-date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB ";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	echo "Users Table created<br />";
	
} catch(PDOException $e){
	die($e->getMessage().'<br />');
}

//create images table
try{
	$query = "CREATE TABLE `camagru`.`images` (`id` INT NOT NULL AUTO_INCREMENT , `location` TEXT NOT NULL, `author` VARCHAR(20) NOT NULL, `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, `likes` TEXT NOT NULL, `comments` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	echo "Images Table created<br />";
	
} catch(PDOException $e){
	die($e->getMessage().'<br />');
}
$conn = null;