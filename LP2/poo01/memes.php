<?php
// Array of image names
$images = ['meme1.jpeg', 'meme10.jpg', 'meme11.png', 'meme12.jpg', 'meme13.png', 'meme14.png', 'meme15.png', 'meme16.png', 'meme17.jpg', 'meme18.png', 'meme19.png', 'meme2.jpg', 'meme20.jpg', 'meme21.jpg', 'meme22.png', 'meme3.jpg', 'meme4.jpg', 'meme5.png', 'meme6.png', 'meme7.jpg', 'meme8.png', 'meme9.png'];

// Randomly choose an image from the array
$selectedImage = $images[array_rand($images)];
?>

<!-- This file is a recycled mess of another recycled mess put together at the last second, please, do not judge it, but please do enjoy the memes! -->
<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Memes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Memes</h2>
	<div class="container">
		<img src="<?php echo $selectedImage; ?>" alt="Random Image">
	</div>
</body>
</html>
