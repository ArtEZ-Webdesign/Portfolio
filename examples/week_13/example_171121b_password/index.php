<?php
session_start();

if (isset($_POST["logout"])) {
	unset($_SESSION["username"]);
}

if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	You've been logged in!
	<form action="index.php" method="post">
		<input type="submit" name="logout" value="Log out">
	</form>
</body>
</html>
