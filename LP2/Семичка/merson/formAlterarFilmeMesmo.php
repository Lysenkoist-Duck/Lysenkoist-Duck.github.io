<?php
    $conexao = new mysqli("localhost","root","","bdcinema2024");
    if ($conexao->connect_errno){
    echo"Falhou ao conectar mysql" . $conexão->connect_error;
}
?>
<link rel="stylesheet" href="css/style.css">
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Filme</title>
</head>

<body>
    <?php
        $cod = $_POST['codigo'];
    ?>
    <h2>Cadastro de Filme:</h2>
    <form action="alterarFilme.php" method="POST">

        <label for="codigo">Código do Filme:</label><br>
        <input type="text" id="codigo" name="codigo" required><br>

        <label for="nome">Nome do Filme:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="ano">Ano do Filme:</label><br>
        <input type="number" id="ano" name="ano" required><br>

        <label for="categoria">Categoria do  Filme:</label><br>
        <input type="text" id="categoria" name="categoria" required><br>
        <?php
            echo"<input name='cod' value='$cod' hidden>";
        ?>
        <select name="diretor">
            <?php
                $sql = "select * from tbdiretor";

                $result = $conexao->query($sql);

                // Verifica se houve resultados
                if ($result->num_rows > 0) {
                    // Exibe os dados de cada sala de cinema
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=" . $row["codigo_diretor"] . "> " . $row["nome_diretor"] . "</option>";
                    }
                }
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>