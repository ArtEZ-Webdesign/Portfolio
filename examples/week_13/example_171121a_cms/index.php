<?php
// Create a database connection
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

// Create a query. Test these queries out in Sequel Pro to check if they work!
$query = $db->query(
	"SELECT projects.id, projects.title, projects.description FROM projects"
);

// Execute the query.
$projects = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/typography.css">
</head>
<body>
	<div class="projects">
		<?php foreach($projects as $project) { ?>
			<div class="project" id="project">
				<form class="project_form" method="post" action="updateProject.php">
					<input type="hidden" name="id" value="<?= $project["id"] ?>">
					<div class="column title">
						<input name="title" type="text" value="<?= $project["title"] ?>"/>
					</div>
					<div class="column description">
						<textarea name="description"><?= $project["description"] ?></textarea>
					</div>
					<div class="column save">
						<input type="submit" name="save"/>
					</div>
				</form>
				<form class="delete_project" method="post" action="deleteProject.php" onsubmit="return confirm('Are You Sure')">
					<input type="hidden" name="id" value="<?= $project["id"] ?>">
					<input type="submit" name="delete" value="Delete">
				</form>
			</div>
		<?php } ?>
		<form action="newProject.php" method="POST">
			<input type="submit" name="new_project" value="New Project">
		</form>
	</div>
</body>
</html>
