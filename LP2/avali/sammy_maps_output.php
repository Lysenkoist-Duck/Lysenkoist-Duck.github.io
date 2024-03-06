<title></title>
<link rel="stylesheet" href="styles.css">

<h1><a href="index.html">Sammy's Evaluation</a></h1>

<?php
$city_names = array(
	"Pelotas",
	"Rio Grande",
	"Guaiba",
	"São Lourenço",
	"PoA",
	"Camaquã"
);

$city_distances = array(
	array(),
	array(),
	array(),
	array(),
	array(),
	array()
);

for ($i = 0; $i <= 6; $i++) {
	for ($j = 0; $j <= 6; $j++) {
		if ($i == $j)
			$value = 0;
		elseif ($i == 0)
			$value = rand(50, 300);
		else
			$value = $city_distances[0][$i];
		
		$city_distances[$i][$j] = $value;
	}
}

echo "<table border=2>";
echo "<th>";
for ($i = 0; $i <= 5; $i++) {
	$cn = $city_names[$i];
	echo "<td>$cn</td>";
}
echo "</th>";

for ($i = 0; $i <= 5; $i++) {
	echo "<tr>";
	# print_r($city_distances[$i]);
	# echo "<br>";
	
	for ($j = -1; $j <= 5; $j++) {
		if ($j == -1) {
			$v = $city_names[$i];
			echo "<td>$v</td>";
		}
		else { 
			$v = $city_distances[$i][$j];
			echo "<td>$v</td>";
		}
	}
	# echo "<br>";
	echo "</tr>";
}
echo "</table>";

echo "<br>";
echo "<br>";
echo "<br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cities_to_travel = $_POST["city"];

	$total_dist = 0;

	# print_r($cities_to_travel);

	for ($i = 0; $i <= count($cities_to_travel) - 2; $i++) {
		/*
		echo "<br>";
		echo "<br>";
		echo $city_distances[$cities_to_travel[$i]][$cities_to_travel[$i + 1]];
		echo "<br>";
		echo "<br>";
		*/

		$departure = $city_names[$cities_to_travel[$i]];
		$target = $city_names[$cities_to_travel[$i + 1]];

		echo "<p>Você quer viajar de $departure para $target</p>";

		$total_dist += $city_distances[$cities_to_travel[$i]][$cities_to_travel[$i + 1]];
	}

	echo "<p>A distância total é de $total_dist km</p>";
}


?>

