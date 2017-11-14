<?php
// Create a database connection
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$id = $_POST["id"];
$title = $_POST["title"];
$description = $_POST["description"];

// Create a query. Test these queries out in Sequel Pro to check if they work!
$query = $db->query(
	"UPDATE projects SET title=\"$title\", description=\"$description\" WHERE id=$id"
);

header('Location: index.php');
?>
