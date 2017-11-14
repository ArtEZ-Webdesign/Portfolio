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
	<script type="text/javascript">
		let element = document.getElementById("project");
		let element = document.getElementByTagName("project");
		let element = document.getElementsByClassName("project");

		document.querySelectorAll("#project");
		document.querySelectorAll("project");
		document.querySelectorAll(".project");

		// OR:
		let element = document.querySelectorAll("#project");
		let element = document.querySelector(".project");
		let element = document.querySelector(".project>.project");
		let element = document.querySelector(".project::nth-child(1)");

	</script>
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
			</div>
		<?php } ?>
	</div>
</body>
</html>
