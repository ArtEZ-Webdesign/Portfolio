<?php
// Regular
$groceries = [
	"apples",
	"milk",
	"bread"
];

// Associative
$cars = [
	[
		"make" => "Fiat",
		"model" => "500",
		"kilometers_driven" => 160000,
		"owners" => [
			[
				"first" => "Jan",
				"last" => "Jansen"
			],
			[
				"first" => "Martijn",
				"last" => "Jansen"
			]
		]
	],
	[
		"make" => "Subaru",
		"model" => "Impreza",
		"kilometers_driven" => 132400,
		"owners" => [
			[
				"first" => "Bram",
				"last" => "Bogaerts"
			]
		]
	]
];

// Loop over the array
for (
	$i = 0;

	// The sizeof function will return the lenth of the array
	$i < sizeof($cars);
	$i ++
) {
	// Echo the information contained in the car
	echo ($i + 1) . ". " . $cars[$i]["make"] . " " . $cars[$i]["model"] . ":<br/>";

	// Loop over the owners of the car. The foreach loop is just a shorthand for the loop we used before. Feel free to use the foreach loop if you prefer less typing, and the for loop if you prefer everything to be spelled out a bit more clearly
	foreach ($cars[$i]["owners"] as $owner) {
		// Echo (print) the first and last name of each owner
		echo $owner["first"] . " " . $owner["last"] . "<br/>";
	}

	// Echo a line break
	echo "<br/>";
}

?>

























<?php

// echo "Hello world!";

























// $mysql = new mysqli("localhost:8889", "root", "root", "portfolio");
// $query = $mysql->query("SELECT * FROM projects");
// $result = $query->fetch_all();
//
// print_r($result);


?>
