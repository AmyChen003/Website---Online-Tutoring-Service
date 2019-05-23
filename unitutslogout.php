<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Logout</title>
<link href="unituts.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
</head>

<body>

<div class="menu">
		<a href="unitutslogin.php">Login</a>
		<a href="unitutsregistration.php">Register</a>
</div>
<h3>You've been successfully logged out. We hope to see you back soon!</h3>
<?php
 session_start();
  session_destroy();   // function that Destroys Session 
 
?>
</body>
</html>
