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
    <title>Mostrar Filme</title>
</head>
<body>
<form name="ms" action="formAlterarFilmeMesmo.php" method="post">
        Selecionar Sala <br> 
    
      
     <select name="codigo">
            <?php
            $sql = "select * from tbfilme";
            $result = $conexao->query($sql);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<option  value=" .$row["codigo_filme"] . ">". $row["nome_filme"]."</option>";
                    
                }
            }
            ?>
        </select> <br> 
        <button type="submit">Editar</button>    
</form>
</body>
</html>