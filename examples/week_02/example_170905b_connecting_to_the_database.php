<?php
// We're opening a PHP tag

// Creating a mysqli object, connecting to the database
$db = new mysqli("localhost", "root", "root", "portfolio", 8889);

// Creating a query for our database, but we don't execute it yet
$query = $db->query("SELECT * FROM projects");

// We execute our query, and we want to retrieve an associative array
$projects = $query->fetch_all(MYSQLI_ASSOC);

// We now have a variable called $projects that we can use throughout the rest of the page
//
// Now we close our PHP tag because we want to start writing HTML
?>

<!DOCTYPE html>
<html>
<head>
	<!-- The Charset makes sure our accents don't get !#$@$% up -->
	<meta charset="utf-8">
	<title>Portfolio</title>
	<!-- We can use regular CSS as well! -->
	<style>
	.title {
		font-weight: bold;
	}
	.project {
		margin-bottom: 40px;
	}
	</style>
</head>
<body>
	<!-- Create a wrapper for all our projects -->
	<div class="projects">
		<!-- Open our php tags again, and loop over our $projects variable -->
		<?php for ($i = 0; $i < sizeof($projects); $i++ ) { ?>
			<!-- We also closed our php tag, because we want to write HTML now. -->

			<!-- This will be repeated for every project, since it's inside a for loop -->
			<div class="project">
				<div class="title">

					<!-- Let's echo out our title, this is a shorthand notation -->
					<?= $projects[$i]["title"]; ?>
				</div>

				<div class="description">
					<!-- Echo the description  -->
					<?= $projects[$i]["description"]; ?>
				</div>

				<!-- Here's a conditional -->
				<?php if ($projects[$i]["is_interactive"]) {?>
					<div class="interactive">
						AND IT'S INTERACTIVE!
					</div>

					<!-- Closing our conditional -->
				<?php } ?>
			</div>

			<!-- Closing the for loop -->
		<?php } ?>
	</div>
</body>
</html>
