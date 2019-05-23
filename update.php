<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>UniTuts Registration</title>
	<link rel="stylesheet" type="text/css" href="unituts.css">
	<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
</head>

<body>
<h1>UniTuts Online Tutoring</h1>
<div class="menu">
		<a href="unitutshome.html">Home</a>
		<a href="unitutsprofile.php">Update Profile</a>
		<a href="unitutstasks.php">Add Tasks</a>
		<a href="unitutssearch.php">Search for Tutoring</a>
		<a href="unitutslogout.php">Logout</a>
	</div>
	
<?php
	session_start();
	$conn = new mysqli("localhost", "admin3", "password3", "finalproject");
	if (mysqli_connect_errno($conn)) {
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	else {
	//echo "Connected to MySQL tutoring database <br/>";
	//escape user inputs for security
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
	//$username=$_POST['uname'];
	$email=$_POST['email'];
	$subjects=implode(',', $_POST['subjects']);
	$days=implode(',', $_POST['days']);
	$hours=implode(',', $_POST['hours']);
	$session_user=$_SESSION['username'];
	$query="UPDATE unitutors SET email='$email', lastname='$lastname',firstname='$firstname',
	subjects='".$subjects."', hours='".$hours."', days='".$days."' WHERE username='$session_user'" ;	
	$result = mysqli_query($conn, $query);
	//insert queries
   // $query="UPDATE profile SET email='zzzz' WHERE username='jiax'" ;
	
	if (!$result) {
		die ("Invalid query: " . mysqli_error($conn));
	}
    

				
	//checking results
	
	mysqli_close($conn);
	echo "Successfully Updated !";
	}
?>


</body>
</html>
