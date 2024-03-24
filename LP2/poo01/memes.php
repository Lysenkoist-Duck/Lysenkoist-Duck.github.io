<!-- I know doing it with JS alone would be way easier and stuff,  but we're doing PHP now so PHP it is!-->
<?php
$images = ['meme1.jpeg', 'meme10.jpg', 'meme11.png', 'meme12.jpg', 'meme13.png', 'meme14.png', 'meme15.png', 'meme16.png', 'meme17.jpg', 'meme18.png', 'meme19.png', 'meme2.jpg', 'meme20.jpg', 'meme21.jpg', 'meme22.png', 'meme3.jpg', 'meme4.jpg', 'meme5.png', 'meme6.png', 'meme7.jpg', 'meme8.png', 'meme9.png'];

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
<body style="color: #FFFFFF; background-color: #000000;">
<h2>Memes (refresh for more)</h2>
	<div class="container">
		<img src='<?php echo "https://lysenkoist-duck.github.io/LP2/poo01/memes/{$selectedImage}"; ?>' alt="Random  Programming Meme">
	</div>
</body>
</html>
