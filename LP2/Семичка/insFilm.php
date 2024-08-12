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


/*Realizar a inserção de dados no banco de dados de 3 jeitos:
	1º -> Sem criar objeto;       ✔️
	2º -> Criando objeto PHP;     ✔️
	3º -> Criando objeto Python.  ❌

	▄︻デ══━一

*/

$form_codigo = $_POST['cod'];
$form_nome = $_POST['nome'];
$form_ano = $_POST['ano'];
$form_cat = $_POST['cat'];
$form_dir = $_POST['dir'];

$objeto_filme = new Filme($form_codigo, $form_nome, $form_ano, $form_cat, $form_dir);

$obj_codigo = $objeto_filme->getCodigo();
$obj_nome = $objeto_filme->getNome();
$obj_ano = $objeto_filme->getAno();
$obj_cat = $objeto_filme->getCategoria();

$sql = "INSERT INTO tbfilme (codigo_filme, nome_filme, ano_filme, categoria_filme, codigo_diretor) VALUES ($obj_codigo, '$obj_nome', $obj_ano, '$obj_cat', $form_dir)";
$msg = $connecticut->query($sql) ? "Dados inserido(a) com sucesso" : 'erro';

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
		<td><?php echo "$obj_codigo" ?></td>
		<td><?php echo "$obj_nome" ?></td>
		<td><?php echo "$obj_ano" ?></td>
		<td><?php echo "$obj_cat" ?></td>
		<td><?php echo "$form_dir" ?></td>
	</tr>
</table>

