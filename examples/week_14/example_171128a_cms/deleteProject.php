<?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$id = $_POST["id"];

$db->query("DELETE FROM projects WHERE id = $id");

header("Location: index.php");
?>
