<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Qinema</title> <!-- TODO: Add Q emoji, perhaps as icon -->
	<link rel="stylesheet" href="styles.css">
</head>

<h1><a href="index.html">Qinema</a></h1>

<?php

	# TODO: Make a page for adding it to the db and another for showing the result, aka, split this file

	$connecticut = new mysqli("localhost", "root", "", "bdcinema2024");

	if ($connecticut->connect_errno){
		echo "Falhou ao conectar Mysql:" .$connecticut->connect_error;  # TODO: Make a cool "oh shit, it broke" page, perhaps the good & ol' random meme dumpster
		exit();
	}

	require_once 'classSalaCinema.php';

	$form_numero_original = $_POST['númer0'];
	$form_numero = $_POST['número'];
	$form_desc = $_POST['descricao'];
	$form_cap = $_POST['capacidade'];

	$sql = "UPDATE tbsala SET numero_sala = $form_numero, descricao_sala = '$form_desc', capacidade_sala = $form_cap WHERE numero_sala = $form_numero_original";
	$msg = $connecticut->query($sql) ? "Dados inserido(a) com sucesso" : 'erro';

	# TODO: Print a 2x2 table here to display the inserted data, da blin;
?>

<table>
	<tr>
		<td colspan=3><?php echo $msg ?></td>
	</tr>
	<tr>
		<td>Número</td>
		<td>Descrição</td>
		<td>Capacidade</td>
	</tr>
	<tr>
		<td><?php echo "$form_numero" ?></td>
		<td><?php echo "$form_desc" ?></td>
		<td><?php echo "$form_cap" ?></td>
	</tr>
</table>

