<?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$db->query("INSERT INTO projects (id, title, description) VALUES (null, 'Untitled Project', '')");

header("Location: index.php");
?>
