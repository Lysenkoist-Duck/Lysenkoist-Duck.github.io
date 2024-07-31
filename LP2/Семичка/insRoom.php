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


/*Realizar a inserção de dados no banco de dados de 3 jeitos:
	1º -> Sem criar objeto;       ✔️
	2º -> Criando objeto PHP;     ❌
	3º -> Criando objeto Python.  ❌

	▄︻デ══━一

*/

$form_numero = $_POST['número'];
$form_desc = $_POST['descricao'];
$form_cap = $_POST['capacidade'];

$objeto_sala = new SalaDeCinema($form_numero, $form_desc, $form_cap);

$obj_numero = $objeto_sala->getNumero();
$obj_descricao = $objeto_sala->getDescricao();
$obj_capacidade = $objeto_sala->getCapacidade();

$sql = "INSERT INTO tbsala (numero_sala, descricao_sala, capacidade_sala) VALUES ($obj_numero, '$obj_descricao', $obj_capacidade)";
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
		<td><?php echo "$obj_numero" ?></td>
		<td><?php echo "$obj_descricao" ?></td>
		<td><?php echo "$obj_capacidade" ?></td>
	</tr>
</table>

