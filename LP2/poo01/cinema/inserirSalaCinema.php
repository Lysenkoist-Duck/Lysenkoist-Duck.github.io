<?php
require_once 'classConexao.php';
require_once 'classSalaCinema.php';

// pega  dados de formulário
$num = $_POST['num'];
$desc = $_POST['desc'];
$capacidade = $_POST['cap'];

// Exemplo de criação de um objeto sala de cinema -- pegar estes dados de formulário
$sala1 = new SalaDeCinema($num, $desc, $capacidade);

// Inserção do objeto sala no banco de dados
$numero = $sala1->getNumero();
$descricao = $sala1->getDescricao();
$capacidade = $sala1->getCapacidade();

$sql = "INSERT INTO tbsala (numero_sala, descricao_sala, capacidade_sala) VALUES ($numero, '$descricao', $capacidade)";
$query = $conexao->query($sql);
$msg = $query ? "Sala $descricao inserida com sucesso" : "erro inserção";

# echo gettype($conexao->query($sql));

echo "Query: " . $query . "<br>";
echo "Mensagem: " . $msg;

$conexao->fecharConexao();
