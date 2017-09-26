<pre><?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, images.filename, tags.name AS tags

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id
	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id
	LEFT JOIN projects_x_images ON projects_x_images.project_id = projects.id
	LEFT JOIN images ON projects_x_images.image_id = images.id
"
);

$projects = array();
$projectsFromDatabase = $query->fetch_all(MYSQLI_ASSOC);

foreach($projectsFromDatabase as $project) {
	$id = $project["id"];
	$tag = $project["tags"];

	if (isset($projects[$id])) {
		array_push($projects[$id]["tags"], $tag);
	} else {
		$project["tags"] = array($tag);
		$projects[$id] = $project;
	}
}
?>
</pre>

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
				<div class="column image">
					<?php if (strlen($project["filename"]) > 0) { ?>
						<img src="img/<?= $project["filename"] ?>.jpg" width="100px">
					<?php } ?>
				</div>
				<div class="column title">
					<a href="project.php?id=<?=$project["id"]?>">
						<?= $project["title"] ?>
					</a>
				</div>
				<div class="column description">
					<?= $project["description"] ?>
				</div>
				<div class="column tag">
					<?= join(", ", $project["tags"]) ?>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>
