<?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$project_id = $_POST["project_id"];

$db->query("DELETE FROM projects_x_tags WHERE project_id = $project_id");

foreach($_POST["tag_id"] as $tag_id) {
	$db->query("INSERT INTO projects_x_tags (id, project_id, tag_id) VALUES (null, $project_id, $tag_id)");
}

header("Location: index.php");
?>
