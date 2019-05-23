<!doctype html>
<?php
session_start();
$conn = new mysqli("localhost", "admin3", "password3", "finalproject");
	if (mysqli_connect_errno($conn)) {
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	else {
		
if(isset($_POST["Submit"]))

{
$username=$_POST["username"];
$password=$_POST["password"];
$result="select * from unitutors where username='$username' and password='$password'";
$query=mysqli_query($conn,$result);
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($count==1)
{
	$_SESSION["username"]=$username;
	$_SESSION['email']= $row['email'];
	$_SESSION['firstname']= $row['firstname'];
	$_SESSION['lastname']= $row['lastname'];
	$_SESSION['subjects']= $row['subjects'];
	$_SESSION['days']= $row['days'];
	$_SESSION['hours']= $row['hours'];
	header('location:unitutshome.html');
}
else
{
	echo"Username/password are wrong!";
	
}
mysql_error();
	}	}
?>
<html>
<head>
<meta charset="UTF-8">
<title>UniTuts Login</title>
	<link rel="stylesheet" type="text/css" href="unituts.css">
	<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
</head>

<body>
<h1>Login to UniTuts</h1>	
	<form action="" method="post">
		<div class="login">
			<label><b>Username:</b></label>
			<input type="text" placeholder="Enter username" name="username" required>
			<label><b>Password:</b></label>
			<input type="password" placeholder="Enter password" name="password" required>
			<button type="submit" name="Submit" class="loginbtn">Login</button>
		</div>
		<div class="join">
			<a href="unitutsregistration.php">Not a member? Register here!</a><br>
		</div>
	</form>
</body>
</html>
