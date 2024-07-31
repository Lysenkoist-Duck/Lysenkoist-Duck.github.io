<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Qinema</title>
	<link rel="stylesheet" href="styles.css">
</head>

<h1><a href="index.html">Qinema</a></h1>

<?php
$conexao = new mysqli ("localhost","root","","bdcinema2024");

if ($conexao->connect_errno){
echo "Falhou ao conectar Mysql:" .$conexao->connect_error;
exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// echo "A";
	/*
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	exit();
	*/
	if (!isset($_POST['selecionados'])){
		echo "Nenhum dado foi selecionado para deletar.";  # These sorts of msg should be properly shown, perhaps in a "msgPage.php" even...
	}
	if (isset($_POST['selecionados'])) {
		if (is_array($_POST['selecionados'])) {
			// echo "B";
			foreach ($_POST['selecionados'] as $codigo_diretor) {
				// echo "$codigo_diretor";
				$sql = "DELETE FROM tbdiretor WHERE codigo_diretor = $codigo_diretor";
				$faqin_query = $conexao->query($sql);
				// echo "$faqin_query";
				if (!$faqin_query) {
					echo "Falha ao deletar o diretor: código $codigo_diretor";  # Instead show a table with the data, ffs
				}
				else {
					echo "Sucesso ao deletar o diretor: código $codigo_diretor";
				}
			}
		}
	}
}
?>
