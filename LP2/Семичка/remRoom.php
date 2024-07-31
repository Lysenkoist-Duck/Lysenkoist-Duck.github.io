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
    if (isset($_POST['selecionados']) && is_array($_POST['selecionados'])) {
        // echo "B";
        foreach ($_POST['selecionados'] as $numero_sala) {
            // echo "$numero_sala";
            $sql = "DELETE FROM tbsala WHERE numero_sala = $numero_sala";
            $faqin_query = $conexao->query($sql);
            // echo "$faqin_query";
            if (!$faqin_query) {
                echo "Falha ao deletar a sala: número $numero_sala";  # Instead show a table with the data, ffs
            }
            else {
                echo "Sucesso ao deletar a sala: número $numero_sala";
            }
        }
	}
    } else {
        echo "Nenhum dado selecionada para deletar.";  # These sorts of msg should be properly shown, perhaps in a "msgPage.php" even...
    }

?>
