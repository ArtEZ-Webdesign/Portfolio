<?php
$id = $_GET["id"];

$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, tags.name AS tag

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id

	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id

	WHERE projects.id = $id

	LIMIT 1"
);

$projects = $query->fetch_all(MYSQLI_ASSOC);
$project = $projects[0];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/typography.css">
	<script src="js/app.js" charset="utf-8"></script>
</head>
<body>
	<a href="index.php">Go back!</a>
	<div class="projects">
		<div class="project">
			<div class="column title">
				<?= $project["title"] ?>
			</div>
			<div class="column description">
				<?= $project["description"] ?>
			</div>
			<div class="column tag">
				<?= $project["tag"] ?>
			</div>
		</div>
	</div>
</body>
</html>
