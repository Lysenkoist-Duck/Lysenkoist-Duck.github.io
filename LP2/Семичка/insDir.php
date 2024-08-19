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


/*Realizar a inserção de dados no banco de dados de 3 jeitos:
	1º -> Sem criar objeto;       ✔️
	2º -> Criando objeto PHP;     ✔️
	3º -> Criando objeto Python.  ❌

	▄︻デ══━一

*/

$form_codigo = $_POST['cod'];
$form_nome = $_POST['nome'];

$objeto_diretor = new Diretor($form_codigo, $form_nome);

$obj_codigo = $objeto_diretor->getCodigoDiretor();
$obj_nome = $objeto_diretor->getNome();

$sql = "INSERT INTO tbdiretor (codigo_diretor, nome_diretor) VALUES ($obj_codigo, '$obj_nome')";
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
		<td><?php echo "$obj_codigo" ?></td>
		<td><?php echo "$obj_nome" ?></td>
	</tr>
</table>

