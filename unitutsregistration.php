<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>UniTuts Registration</title>
	<link rel="stylesheet" type="text/css" href="unituts.css">
	<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
<script src="validate.js">
    
</script>
</head>


<body>
<h1>UniTuts Registration</h1>
	<div class="menu">
		<a href="unitutslogin.php">Login</a>
	</div>

	<form method="post"  onsubmit="return validateForm()">
		<div class="form">
			<!-- USER CREDENTIALS -->
			<label><b>First Name:</b></label>
			<input type="text" placeholder="Enter first name" name="fname" required>
			<label><b>Last Name:</b></label>
			<input type="text" placeholder="Enter last name" name="lname" required>
			<label><b>Username:</b></label>
			<input type="text" placeholder="Enter username" name="uname" required>
			<label><b>Email:</b></label>
			<input type="text" placeholder="Enter email address" name="email" required>
			<label><b>Password:</b></label>
			<input type="password" placeholder="Enter password" name="password" required>
			<!-- SERVICES/SUBJECTS -->
			<label><b>Tutoring Subject(s):</b></n></label><br>
			<input type="checkbox" name="subjects[]" value="html">HTML<br>
			<input type="checkbox" name="subjects[]" value="css">CSS<br>
			<input type="checkbox" name="subjects[]" value="php">PHP<br>
			<input type="checkbox" name="subjects[]" value="sql">SQL<br>
			<input type="checkbox" name="subjects[]" value="java">Java<br>
			<input type="checkbox" name="subjects[]" value="python">Python<br>
			<!-- POST DAYS -->			
			<label><b>Available Days:</b></label><br>
			<input type="checkbox" name="days[]" value="saturday">Saturday<br>
			<input type="checkbox" name="days[]" value="sunday">Sunday<br>
			<!-- POST TIMES -->		
			<label><b>Available Hours:</b></label><br>
			<input type="checkbox" name="hours[]" value="morning">Morning (8:00 - 11:00 AM)<br>
			<input type="checkbox" name="hours[]" value="noon">Noon (11:00 AM - 2:00 PM)<br>
			<input type="checkbox" name="hours[]" value="afternoon">Afternoon (2:00 - 5:00 PM)<br>	
			<!-- BUTTONS -->
			<div class="buttons">
				<button type="submit" name="submit" class="submitbtn">Submit</button>
				<button type="reset" class="resetbtn">Reset</button>
			</div>
		</div>
	</form>
	
<?php
//connect to database
$conn = new mysqli("localhost", "admin3", "password3", "finalproject");
if (mysqli_connect_errno($conn)) {
	echo 'Cannot connect to database: ' . mysqli_connect_error();
}
else {
	echo "Connected to MySQL finalproject database <br />";
	
//escape user inputs for security
if (isset($_POST['submit'])) {

$username=$_POST['uname'];

$firstname=$_POST['fname'];

$lastname=$_POST['lname'];

$email=$_POST['email'];

$password=$_POST['password'];

$subjects=implode(',', $_POST['subjects']);

$days=implode(',', $_POST['days']);

$hours=implode(',', $_POST['hours']);

//insert queries
$query = "insert into unitutors (username, firstname, lastname, email, password, subjects, days, hours) 
values ('$username', '$firstname', '$lastname', '$email', '$password', '".$subjects."', '".$days."', '".$hours."')";

$result = mysqli_query($conn, $query);
}
}
?>

</body>
</html>
