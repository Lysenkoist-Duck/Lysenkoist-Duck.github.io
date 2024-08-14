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

	$sql = "select * from tbsala";  # SQL code that will be sent to be parsed & interpreted by the DBMS (SGBD)
	$result = $connecticut->query($sql);
	echo "<script>const db = {num:[], desc:[], cap:[]};</script>";
?>

<body>
	<h1><a href="index.html">Qinema</a></h1>

	<form id='remRoom' action='remRoom.php' method='POST'>
	<table id='bela'>  <!-- TODO: Give this type of table with content some css to make the lines visible and perhaps a lil less wide -->
	<tr>
		<!-- <th></th>  This one was for the checkboxes -->
		<th>Número</th>
		<th>Descrição</th>
		<th>Capacidade</th>
	</tr>

	<?php
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["numero_sala"] . "</td><td>" . $row["descricao_sala"] . "</td><td>" . $row["capacidade_sala"] . "</td></tr>";
		
			$r1 = $row["numero_sala"];
			$r2 = $row["descricao_sala"];
			$r3 = $row["capacidade_sala"];

			echo "<script>db.num.push('$r1');</script>";
			echo "<script>db.desc.push('$r2');</script>";
			echo "<script>db.cap.push('$r3');</script>";
		}

		echo "<tr id='checkboxButt'><td colspan=4><button type='button' onclick='addCheckboxAndButt()'>Deletar Salas</button></td></tr>";
		echo "<tr><td id='delButt' colspan=4><button id='actualDelButt' type='submit' hidden>Deletar Salas Selecionadas</button>";
	} else {
		echo "Nenhum dado encontrado.";  # TODO: Add meme here too
	}
	?>
	</table>
	</form>

	<form action="insRoom.php" method="POST">
	<table>
		<tr>
			<td colspan=3>
				<h2>Inserir Sala</h2>
			</td>
		</tr>
		<tr>
			<td><label for="número">Número:</label></td>
			<td><input type="text" id="número" name="número" required></td>  <!-- Add some preview text shit -->
		</tr>
		<tr>
			<td><label for="descricao">Descrição:</label></td>
			<td><input type="text" id="descricao" name="descricao" required></td>
		</tr>
		<tr>
			<td><label for="capacidade">Capacidade:</label></td>
			<td><input type="text" id="capacidade" name="capacidade" required></td>
		</tr>
		<tr>
			<td colspan=3><button type="submit">Enviar</button></td>
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
				var codRoom = db.num[i - 1];				
				newCell.innerHTML = "<td><input type='checkbox' name='selecionados[]' value='" + codRoom + "'></td>";

				row = table.rows[i];
				row.insertBefore(newCell, row.firstChild);

				// console.log(i);
			}
			document.getElementById("checkboxButt").setAttribute("hidden", "hidden");
			document.getElementById("actualDelButt").removeAttribute("hidden");

			// var butt = document.getElementById("delButt");
			// butt.innerHTML = "<input type='button' id='actualDelButt' onclick='document.getElementById(\"remDir\").submit();'>Deletar Diretores Selecionados</input>";
			// butt.innerHTML = "<input type='submit' value='Deletar Diretores Selecionados' id='actualDelButt' ></input>";
		}
	</script>
</body>
</html>