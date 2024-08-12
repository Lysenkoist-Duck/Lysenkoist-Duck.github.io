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

	require_once 'classFilme.php';

	$form_codigo_original = $_POST['codigo'];
	$form_codigo = $_POST['cod'];
	$form_nome = $_POST['nome'];
	$form_ano = $_POST['ano'];
	$form_cat = $_POST['cat'];
	$form_dir = $_POST['dir'];

	$sql = "UPDATE tbfilme SET codigo_filme = $form_codigo, nome_filme = '$form_nome', ano_filme = $form_ano, categoria_filme = '$form_cat', codigo_diretor = $form_dir WHERE codigo_filme = 6;";
	# echo $sql;
	$msg = $connecticut->query($sql) ? "Dados alterados com sucesso" : 'erro';

	# TODO: Print a 2x2 table here to display the inserted data, da blin;
?>

<table>
	<tr>
		<td colspan=5><?php echo $msg ?></td>
	</tr>
	<tr>
		<td>Código</td>
		<td>Nome</td>
		<td>Ano</td>
		<td>Categoria</td>
		<td>Diretor</td>
	</tr>
	<tr>
		<td><?php echo "$form_codigo" ?></td>
		<td><?php echo "$form_nome" ?></td>
		<td><?php echo "$form_ano" ?></td>
		<td><?php echo "$form_cat" ?></td>
		<td><?php echo "$form_dir" ?></td>
	</tr>
</table>

