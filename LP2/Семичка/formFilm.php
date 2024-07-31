<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Qinema</title>
	<link rel="stylesheet" href="styles.css">
</head>

<?php
	$connecticut = new mysqli ("localhost","root","","bdcinema2024");

	if ($connecticut->connect_errno){
		echo "Falhou ao conectar Mysql:" .$connecticut->connect_error;  # TODO: Make a cool "oh shit, it broke" page, perhaps the good & ol' random meme dumpster
		exit();
	}

	$sql = "select * from tbfilme";  # SQL code that will be sent to be parsed & interpreted by the DBMS (SGBD)
	$result = $connecticut->query($sql);
	echo "<script>const db = {cod:[], nome:[], ano:[], cat:[], dir:[]};</script>";
?>

<body>
	<h1><a href="index.html">Qinema</a></h1>

	<form id='remFilm' action='remFilm.php' method='POST'>
	<table id='bela'>  <!-- TODO: Give this type of table with content some css to make the lines visible and perhaps a lil less wide -->
	<tr>
		<!-- <th></th> -->
		<th>Código</th>
		<th>Nome</th>
		<th>Ano</th>
		<th>Categoria</th>
		<th>Diretor</th>
	</tr>

	<?php
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["codigo_filme"] . "</td><td>" . $row["nome_filme"] . "</td><td>" . $row["ano_filme"] . "</td><td>" . $row["categoria_filme"] . "</td><td>" . $row["codigo_diretor"] . "</td></tr>";  # TODO: Colocar o diretor ao invés do código
			
			$r1 = $row["codigo_filme"];
			$r2 = $row["nome_filme"];
			$r3 = $row["ano_filme"];
			$r4 = $row["categoria_filme"];
			$r5 = $row["codigo_diretor"];

			echo "<script>db.cod.push('$r1');</script>";
			echo "<script>db.nome.push('$r2');</script>";
			echo "<script>db.ano.push('$r3');</script>";
			echo "<script>db.cat.push('$r4');</script>";
			echo "<script>db.dir.push('$r5');</script>";
		}
		
		echo "<tr id='checkboxButt'><td colspan=4><button type='button' onclick='addCheckboxAndButt()'>Deletar Filmes</button></td></tr>";
		echo "<tr><td id='delButt' colspan=4><button id='actualDelButt' type='submit' hidden>Deletar Filmes Selecionados</button></tr>";
	} else {
		echo "Nenhum dado encontrado.";  # TODO: Add meme here too
	}
	?>
	</table>
	</form>

	<form action="insFilm.php" method="POST">
	<table>
		<tr>
			<td colspan=5>
				<h2>Inserir Filme</h2>
			</td>
		</tr>
		<tr>
		<tr>
			<td><label for="cod">Código:</label></td>
			<td><input type="text" id="cod" name="cod" required></td>  <!-- Add some preview text shit -->
		</tr>
		<tr>
			<td><label for="nome">Nome:</label></td>
			<td><input type="text" id="nome" name="nome" required></td>
		</tr>
		<tr>
			<td><label for="ano">Ano:</label></td>
			<td><input type="text" id="ano" name="ano" required></td>
		</tr>
		<tr>
			<td><label for="cat">Categoria:</label></td>
			<td><input type="text" id="cat" name="cat" required></td>
		</tr>
		<tr>
			<td><label for="dir">Diretor:</label></td>
			<td><input type="text" id="dir" name="dir" required></td>
		</tr>
		<tr>
			<td colspan=5><button type="submit">Enviar</button></td>
			<!-- <td><button type="reset">Limpar</button></td> -->
		</tr>

	</table>
	</form>
	<script>
		function addCheckboxAndButt() {
			var table = document.getElementById("bela");

			var headerRow = table.rows[0];
			var newHeaderCell = document.createElement("th");
			newHeaderCell.innerHTML = "";
			headerRow.insertBefore(newHeaderCell, headerRow.firstChild);

			var totalRows = table.rows.length;

			for (var i = 1; i < totalRows - 2; i++) {
				var newCell = document.createElement("td");
				var codFilm = db.cod[i - 1];				
				newCell.innerHTML = "<td><input type='checkbox' name='selecionados[]' value='" + codFilm + "'></td>";

				row = table.rows[i];
				row.insertBefore(newCell, row.firstChild);

			}
			document.getElementById("checkboxButt").setAttribute("hidden", "hidden");
			document.getElementById("actualDelButt").removeAttribute("hidden");
		}
	</script>
</body>
</html>