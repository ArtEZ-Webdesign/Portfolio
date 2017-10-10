<?php
// Create a database connection
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

// Create a query. Test these queries out in Sequel Pro to check if they work!
$query = $db->query(
	"SELECT projects.id, projects.title, projects.description, images.filename AS image, tags.name AS tag

	FROM projects

	LEFT JOIN projects_x_tags ON projects.id = projects_x_tags.project_id
	LEFT JOIN tags ON projects_x_tags.tag_id = tags.id
	LEFT JOIN projects_x_images ON projects_x_images.project_id = projects.id
	LEFT JOIN images ON projects_x_images.image_id = images.id"
);

// Execute the query.
$projectsFromDatabase = $query->fetch_all(MYSQLI_ASSOC);

// Now, the $projectsFromDatabase array is a bit messy with all those duplicates. So create a new variable
// called $projects, and then transform the $projectsFromDatabase array items to clean them up and store
// them in the new $projects array.
$projects = array();

// Loop over all the projects
foreach($projectsFromDatabase as $project) {
	// Save the id, tag and image of the current project
	$id = $project["id"];
	$tag = $project["tag"];
	$image = $project["image"];

	// If the current id is already in our $projects array, we know that we're dealing with a duplicate
	if (isset($projects[$id])) {
		// In that case, if the tag is not yet in the tag array, add it there.
		if (!in_array($tag, $projects[$id]["tags"])) {
			array_push($projects[$id]["tags"], $tag);
		}

		// Same goes for the image
		if (!in_array($image, $projects[$id]["images"])) {
			array_push($projects[$id]["images"], $image);
		}
	} else {
		// Else, we haven't come across the current id in the $projects array, and so we create a new project
		// variable that will hold all our information.
		$projects[$id] = array(
			"id" => $project["id"],
			"title" => $project["title"],
			"description" => $project["description"],
			// Tags and images should be arrays.
			"tags" => array(),
			"images" => array()
		);

		// If the current projects has a tag, add it to the array.
		if (isset($tag)) {
			array_push($projects[$id]["tags"], $tag);
		}

		// If the current projects has an image, add it to the array.
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
						<a href="project.php?id=<?=$project["id"]?>">
							<img class="thumbnail" src="img/<?= $project["images"][0] ?>.jpg">
						</a>
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
