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

require_once 'classDiretor.php';


$form_codigo_original = $_POST['cod'];
$form_codigo = $_POST['cod'];
$form_nome = $_POST['nome'];

$sql = "UPDATE tbdiretor SET codigo_diretor = $form_codigo, nome_diretor = '$form_nome' WHERE codigo_diretor = $form_codigo_original;";  //Scheiß auf diese Zeile!
$msg = $connecticut->query($sql) ? "Dados inserido(a) com sucesso" : 'erro';

# TODO: Print a 2x2 table here to display the inserted data, da blin;
?>

<table>
	<tr>
		<td colspan=2><?php echo $msg ?></td>
	</tr>
	<tr>
		<td>Código</td>
		<td>Nome</td>
	</tr>
	<tr>
		<td><?php echo "$form_codigo" ?></td>
		<td><?php echo "$form_nome" ?></td>
	</tr>
</table>

