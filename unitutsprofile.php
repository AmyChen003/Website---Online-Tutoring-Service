<!doctype html>
<?php 
session_start();
if (!isset($_SESSION['username'])) {
	die ("Unauthorized access! You need to <a href='unitutslogin.php'>login first. ");
}
$subjects=explode(",",$_SESSION['subjects']);
$i=0;
$subjects_array=array_fill(0,6,0);
while (@!is_null($subjects[$i])){
	if ($subjects[$i] == "html") {
		$subjects_array[0]=1;
	} elseif ($subjects[$i] == "css") {
		$subjects_array[1]=1;
	} elseif ($subjects[$i] == "php") {
       $subjects_array[2]=1;
	}elseif ($subjects[$i] == "sql") {
       $subjects_array[3]=1;
	}elseif ($subjects[$i] == "java") {
       $subjects_array[4]=1;
	}elseif ($subjects[$i] == "python") {
       $subjects_array[5]=1;
	}
	$i++;
}

$subjects=explode(",",$_SESSION['days']);
$j=0;
$subjects_array1=array_fill(0,2,0);
while (@!is_null($subjects[$j])){
	if ($subjects[$j] == "saturday") {
		$subjects_array1[0]=1;
	} elseif ($subjects[$j] == "sunday") {
		$subjects_array1[1]=1;
	}
	$j++;
}

$subjects=explode(",",$_SESSION['hours']);
$k=0;
$subjects_array2=array_fill(0,3,0);
while (@!is_null($subjects[$k])){
	if ($subjects[$k] == "morning") {
		$subjects_array2[0]=1;
	} elseif ($subjects[$k] == "noon") {
		$subjects_array2[1]=1;
	}
	elseif ($subjects[$k] == "afternoon") {
		$subjects_array2[1]=1;
	}
	$k++;
}
?>	

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
<h1>UniTuts Online Tutoring</h1>
<div class="menu">
		<a href="unitutshome.html">Home</a>
		<a href="unitutsprofile.php">Update Profile</a>
		<a href="unitutstasks.php">Add Tasks</a>
		<a href="unitutssearch.php">Search for Tutoring</a>
		<a href="unitutslogout.php">Logout</a>
	</div>

	<form name= "form" method="post" action="update.php"  onsubmit="return validateForm()">
		<div class="form2">
			<label><b>First Name:</b></label>
			<input type="text" placeholder="Enter first name" name="fname" value="<?php echo $_SESSION['firstname']?>" required>
			<label><b>Last Name:</b></label>
			<input type="text" placeholder="Enter last name" name="lname" value="<?php echo $_SESSION['lastname']?>" required>
			<label><b>Email:</b></label>
			<input type="text" placeholder="Enter email address" name="email" value="<?php echo$_SESSION['email']?>" required>
			
			<label><b>Tutoring Subject(s):</b></n></label><br>
			<input type="checkbox" name="subjects[]" value="html" <?php echo ($subjects_array[0]==1 ? 'checked': '');?>> HTML <br>
			<input type="checkbox" name="subjects[]" value="css" <?php echo ($subjects_array[1]==1 ? 'checked': '');?>> CSS <br>
			<input type="checkbox" name="subjects[]" value="php" <?php echo ($subjects_array[2]==1 ? 'checked': '');?>> PHP <br>
			<input type="checkbox" name="subjects[]" value="sql" <?php echo ($subjects_array[3]==1 ? 'checked': '');?>> SQL <br>
			<input type="checkbox" name="subjects[]" value="java" <?php echo ($subjects_array[4]==1 ? 'checked': '');?>> Java <br>
			<input type="checkbox" name="subjects[]" value="python" <?php echo ($subjects_array[5]==1 ? 'checked': '');?>> Python <br>
			
			<label><b>Available Days:</b></label><br>
			<input type="checkbox" name="days[]" value="saturday" <?php echo ($subjects_array1[0]==1 ? 'checked': '');?>>Saturday<br>
			<input type="checkbox" name="days[]" value="sunday" <?php echo ($subjects_array1[1]==1 ? 'checked': '');?>>Sunday<br>
			
			<label><b>Available Hours:</b></label><br>
			<input type="checkbox" name="hours[]" value="morning" <?php echo ($subjects_array2[0]==1 ? 'checked': '');?>>Morning (8:00 - 11:00 AM)<br>
			<input type="checkbox" name="hours[]" value="noon" <?php echo ($subjects_array2[1]==1 ? 'checked': '');?>>Noon (11:00 AM - 2:00 PM)<br>
			<input type="checkbox" name="hours[]" value="afternoon" <?php echo ($subjects_array2[2]==1 ? 'checked': '');?>>Afternoon (2:00 - 5:00 PM)<br>

			<div class="buttons">
				<button type="submit" name="sumbit" class="submitbtn">Update</button>
				<button type="reset" class="resetbtn">Reset</button>
			</div>
		</div>
	</form>


</body>
</html>
