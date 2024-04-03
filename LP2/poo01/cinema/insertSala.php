<?php
require_once "classConexao.php";
require_once 'sala.php';

$desc = $_POST['descricao'];
$capacidade = $_POST['capacidade'];

# $salas = []
# $salas[] = new Sala($desc, $capacidade);
$sala1 = new Sala($desc, $capacidade);

$descricao = $sala1->getDescricao();
$capacidade = $sala1->getCapacidade();

$sql = "INSERT INTO sala (descricao, capacidade) VALUES ('$descricao', '$capacidade')";
echo $conexao->query($sql) ? "Sala $descricao inserida com sucesso" : 'erro';
$conexao->fecharConexao();
?>