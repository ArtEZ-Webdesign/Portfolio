	<?php
$id = $_GET["id"];

$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, images.filename, tags.name AS tag

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id

	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id

	LEFT JOIN projects_x_images ON projects_x_images.project_id = projects.id
	LEFT JOIN images ON projects_x_images.image_id = images.id

	WHERE projects.id = $id"
);

$projectsFromDatabase = $query->fetch_all(MYSQLI_ASSOC);
$projectFromDatabase = $projectsFromDatabase[0];

$projects = array();

foreach($projectsFromDatabase as $project) {
	$id = $project["id"];
	$filename = $project["filename"];

	if (isset($projects[$id])) {
		array_push($projects[$id]["filename"], $filename);
	} else {
		$project["filename"] = array($filename);
		$projects[$id] = $project;
	}
}

$project = $projects[$id];
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
		<?php foreach ($project["filename"] as $image) { ?>
			<img src="img/<?= $image ?>.jpg" width="100%">
		<?php } ?>
	</div>
</body>
</html>
