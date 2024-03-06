<title></title>
<link rel="stylesheet" href="styles.css">

<h1><a href="index.html">Sammy's Evaluation</a></h1>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pal = $_POST["pal"];
    $pal = $pal . "-";  # sla pq mas precisa
    $pal2 = "";

    for ($i = 0; $i <= strlen($pal) - 2; $i++) {
        if ($i % 2 != 0) {
            $pal2 = $pal2 . $pal[$i];
        }
    }

    echo "<p>$pal2</p>";
	
}


?>

