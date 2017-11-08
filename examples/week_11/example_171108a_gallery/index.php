<?php

$images = array(array(
	"caption" => "My first image",
	"url" => "img/image-01.jpg"
), array(
	"caption" => "My second image",
	"url" => "img/image-02.jpg"
), array(
	"caption" => "My third image",
	"url" => "img/image-03.jpg"
));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Example gallery</title>
	<link rel="stylesheet" href="css/slideshow.css">
</head>
<body>
	<div class="slide-wrapper">
		<div class="slide-fullsize">
			<div class="slide-control slide-control-left">&larr;</div>
			<div class="slide-current">
				<div class="slide-current-image" style="background-image: url('img/image-01.png')"></div>
				<div class="slide-current-caption"></div>
			</div>
			<div class="slide-control slide-control-right">&rarr;</div>
		</div>
		<div class="slide-thumbnail-wrapper">
			<div class="slide-thumbnails">
				<?php foreach ($images as $image) { ?>
					<div data-image-url="<?= $image["url"] ?>" data-image-caption="<?= $image["caption"] ?>" class="slide-thumbnail" style="background-image: url('<?= $image["url"] ?>')">
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script src="js/app.js" charset="utf-8"></script>
</body>
</html>
