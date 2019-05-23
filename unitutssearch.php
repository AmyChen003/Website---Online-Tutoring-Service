<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>UniTuts Search</title>
	<link rel="stylesheet" type="text/css" href="unituts.css">
	<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
</head>

<body>

<!-- search form -->
<h1>Search UniTuts</h1>
	<div class="menu">
		<a href="unitutshome.html">Home</a>
		<a href="unitutsprofile.php">Profile</a>
		<a href="unitutstasks.php">Add Tasks</a>
		<a href="unitutslogout.php">Logout</a>
	</div>
	
	<form method="post">
		<select name="tutorials">
			<option value="">Select...</option>
			<option value="html">HTML</option>
			<option value="css">CSS</option>
			<option value="php">PHP</option>
			<option value="sql">SQL</option>
			<option value="java">Java</option>
			<option value="python">Python</option>
		</select><br>
		<button type="submit" name="submit" class="searchbtn">Search</button>	
	</form>
	
<?php
$output = NULL;

if (isset($_POST['submit']) && isset($_POST['tutorials'])) {
	
	//connect to database
	$conn = new mysqli("localhost", "admin3", "password3", "finalproject");
	
	$tutorials = $conn->real_escape_string($_POST['tutorials']);
	
	//query the database
	$result = $conn->query("SELECT * FROM unitutors WHERE subjects LIKE '%$tutorials%'");
	
	if($result->num_rows > 0) {
		while($rows = $result->fetch_assoc()) {
			$username = $rows['username'];
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$email = $rows['email'];
			$subjects = $rows['subjects'];
			$days = $rows['days'];
			$hours = $rows['hours'];
			
			$output .= "First Name: $firstname<br />
						Last Name: $lastname<br />
						Email: $email<br />
						Subjects: $subjects<br />
						Available Days: $days<br />
						Available Hours: $hours<br /><br />";
		}
	}
	else {
		$output = "No results";
	}
}
?>

<?php echo $output; ?>

</body>
</html>
