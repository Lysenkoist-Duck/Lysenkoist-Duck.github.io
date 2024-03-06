<title></title>
<link rel="stylesheet" href="styles.css">

<h1><a href="index.html">Sammy's Evaluation</a></h1>

<?php

$mega_sammy = array(
	rand(1, 69),
	rand(1, 69),
	rand(1, 69),
	rand(1, 69),
	rand(1, 69),
	rand(1, 69),
);

$score = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bets = $_POST["ap"];
	# echo $bets[0];

	for ($i = 0; $i <= 9; $i++) {
		if (in_array($bets[$i], $mega_sammy))
			$score += 1;
	}

	echo "<br>";
	echo "<br>";

	echo "score: $score";
	
	echo "<br>";
	echo "<br>";

	# print_r($mega_sammy);

	if ($score == 6)
		echo "<h2>Parabéns, você ganhou R$ 1.000.000!!!</h2>";
	elseif ($score == 5) 
		echo "<h2>Muito legal, você ganhou R$ 500.000!!!</h2>";
	elseif ($score == 4) 
		echo "<h2>Legal, você ganhou R$ 250.000!!!</h2>";
	else
		echo "<h2>Ah, que pena, você não ganhou porra nenhuma!!!</h2>";
	
	
}


?>

