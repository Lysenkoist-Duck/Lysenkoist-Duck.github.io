<?php
	$conexao = new mysqli("localhost","root","","bdcinema2024");
	if ($conexao->connect_errno){
		echo"Falhou ao conectar mysql" . $conexão->connect_error;
	}

	// pega  dados do formulário
	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$ano = $_POST['ano'];
	$categoria = $_POST['categoria'];
	$diretor = $_POST['diretor'];

	$cod = $_POST['cod'];  # Código original
	$sql = "UPDATE tbfilme SET codigo_filme= $codigo, nome_filme = $nome, ano_filme = $ano,categoria_filme = $categoria WHERE codigo_filme = $cod";
	echo $conexao->query($sql) ? "Filme $nome editado com sucesso" : 'x';
	#echo $conexao->query($sql);
?>