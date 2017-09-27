<?php
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, images.filename AS image, tags.name AS tag

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id
	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id
	LEFT JOIN projects_x_images ON projects_x_images.project_id = projects.id
	LEFT JOIN images ON projects_x_images.image_id = images.id
	"
);

$projectsFromDatabase = $query->fetch_all(MYSQLI_ASSOC);

$projects = array();

foreach($projectsFromDatabase as $project) {
	$id = $project["id"];

	$tag = $project["tag"];
	$image = $project["image"];

	if (isset($projects[$id])) {
		if (!in_array($tag, $projects[$id]["tags"])) {
			array_push($projects[$id]["tags"], $tag);
		}

		if (!in_array($image, $projects[$id]["images"])) {
			array_push($projects[$id]["images"], $image);
		}
	} else {
		$projects[$id] = array(
			"id" => $project["id"],
			"title" => $project["title"],
			"description" => $project["description"],
			"tags" => array(),
			"images" => array()
		);

		if (isset($tag)) {
			array_push($projects[$id]["tags"], $tag);
		}

		if (isset($image)) {
			array_push($projects[$id]["images"], $image);
		}
	}
}
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
				<div class="column image">
					<?php if (sizeof($project["images"]) > 0) { ?>
						<img src="img/<?= $project["images"][0] ?>.jpg" width="100px">
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
