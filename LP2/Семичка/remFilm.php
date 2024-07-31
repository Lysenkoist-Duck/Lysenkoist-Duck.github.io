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
    if (!isset($_POST['selecionados'])){
		echo "Nenhum dado foi selecionado para deletar.";  # These sorts of msg should be properly shown, perhaps in a "msgPage.php" even...
	}
    if (isset($_POST['selecionados'])) {
        // echo "B";
        foreach ($_POST['selecionados'] as $codigo_filme) {
            // echo "$codigo_filme";
            $sql = "DELETE FROM tbfilme WHERE codigo_filme = $codigo_filme";
            $faqin_query = $conexao->query($sql);
            // echo "$faqin_query";
            if (!$faqin_query) {
                echo "Falha ao deletar o filme: código $codigo_filme";  # Instead show a table with the data, ffs
            }
            else {
                echo "Sucesso ao deletar o filme: código $codigo_filme";
            }
        }
	}
    } else {
        echo "Nenhum dado selecionada para deletar.";  # These sorts of msg should be properly shown, perhaps in a "msgPage.php" even...
    }

?>
