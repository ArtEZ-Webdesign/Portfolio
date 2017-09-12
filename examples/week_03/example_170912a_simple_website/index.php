<?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, tags.name AS tag

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id

	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id"
);

$projects = $query->fetch_all(MYSQLI_ASSOC);
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
	<div class="projects">
		<?php foreach($projects as $project) { ?>
			<div class="project">
				<div class="column title">
					<a href="project.php?id=<?=$project["id"]?>">
						<?= $project["title"] ?>
					</a>
				</div>
				<div class="column description">
					<?= $project["description"] ?>
				</div>
				<div class="column tag">
					<?= $project["tag"] ?>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>
