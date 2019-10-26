<?php
	session_start();

	$name = $_POST['name'];
	$pass = $_POST['passwd'];
	$mail = $_POST['email'];
	$conn = null;
	if ($name != '' && $pass!='' && $mail!=''){
		require_once('connect.php');
		if ($conn = connect()){
			
			//add user to table
				try{
					$query = "INSERT INTO `users` (`username`, `email`, `passwd`, `notifications`, `verified`) VALUES (?, ?, ?, '1', '0')";
					$stmt = $conn->prepare($query);
					$stmt->execute([$name, $mail, $pass]);
				echo "user added";
				} catch (PDOException $e){
					echo $e->getMessage();
				}
		}
		else
			echo "connection failed";
	}
	else var_dump($_POST);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
</head>
<body>
<form action="register.php" method="post">
	name : <input type="text" name="name" id="name"> <br />
	email : <input type="text" name="email" id="email"><br />
   password:  <input type="password" name="passwd" id="passwd"><br />
   confirm password:  <input type="password" name="passwd2" id="passwd2"><br />
    <input type="submit" name="submit" id="submit" value="OK"><br />
	 <br />
</form>
</body>
</html>