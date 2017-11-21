<?php
session_start();

$error = "";

if (isset($_SESSION["username"])) {
	header("Location: index.php");
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	if ($_POST["username"] === "admin") {
		if ($_POST["password"] === "admin") {
			$_SESSION["username"] = $_POST["username"];
			header("Location: index.php");
		} else {
			$error = "Wrong password!";
		}
	} else {
		$error = "Wrong username!";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style media="screen">
			.error {
				color: red;
			}
		</style>
	</head>
	<body>
		<form class="login" method="post" action="login.php">
			<input type="text" name="username">
			<input type="password" name="password">
			<input type="submit" name="submit" value="Log in!">
		</form>

		<div class="error"><?= $error ?></div>
	</body>
</html>
