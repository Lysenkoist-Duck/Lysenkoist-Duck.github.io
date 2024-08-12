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

	$sql = "select * from tbdiretor";  # SQL code that will be sent to be parsed & interpreted by the DBMS (SGBD)
	$result = $connecticut->query($sql);
?>

<body>
	<h1><a href="index.html">Qinema</a></h1>
	
	<form id='remDir' action='remDir.php' method='POST'>
		<table id='bela'>  <!-- TODO: Give this type of table with content(?) some css to make the lines visible and perhaps a lil less wide -->
			<tr>
				<!-- <th></th>  This one was for the checkboxes -->
				<th>Código</th>
				<th>Nome</th>
			</tr>

			<?php
				if ($result->num_rows > 0) {
					$db = [];  # for retrieving data from the db down the line

					# Possível futuro resquício evolutivo
					echo <<<HTML
						<script>
							const db = {cod:[], nome:[]};
						</script>
					HTML;

					# This returns the directors data on the top of the page
					while ($row = $result->fetch_assoc()) {
						$r1 = $row["codigo_diretor"];
						$r2 = $row["nome_diretor"];

						$db[] = [
							"cod" => $r1,
							"nome" => $r2
						];

						echo <<<HTML
							<tr data-row-id="{$row['codigo_diretor']}">
								<td>{$row['codigo_diretor']}</td>
								<td>{$row['nome_diretor']}</td>
								<td>
									<button type="button" onclick="toggleEditForm({$row['codigo_diretor']})">Editar</button>
								</td>
							</tr>
							<script>
								db.cod.push('$r1');
								db.nome.push('$r2');
							</script>
						HTML;
					}

					echo <<<HTML
						<!-- This row is for the Inserir Diretores button, which reveals the insertion form -->
						<tr id="insFormButt">
							<td colspan="5">
								<button type="button" onclick="toggleInsForm()">Inserir Diretores</button>
							</td>
						</tr>

						<!-- This row is for the Deletar Diretores button, which reveals the checkboxes and actual delete button -->
						<tr id="checkboxButt">
							<td colspan="5">
								<button type="button" onclick="addCheckboxAndButt()">Deletar Diretores</button>
							</td>
						</tr>

						<!-- This row is for the Deletar Diretores Selecionados button, which is the de facto delete button, which starts off hidden -->
						<tr>
							<td id="delButt" colspan="5">
								<button id="actualDelButt" type="submit" hidden>Deletar Diretores Selecionados</button>
							</td>
						</tr>
					HTML;

				}
				else {
					echo "Nenhum dado encontrado.";  # TODO: Add meme here too
				}
			?>
		
		</table>
	</form>

	<!-- TODO: Verify if each input is valid before submitting -->
	<form id="insForm" action="insDir.php" method="POST">
		<table>
			<tr>
				<td colspan=2>
					<h2>Inserir Diretor</h2>
				</td>
			</tr>
			<tr>
				<td><label for="cod">Código:</label></td>
				<td><input type="text" id="cod" name="cod" required></td>  <!-- Add some preview text shit -->
			</tr>
			<tr>
				<td><label for="nome">Nome:</label></td>
				<td><input type="text" id="nome" name="nome" required></td>
			</tr>
			<tr>
				<td colspan=2><button type="submit">Enviar</button></td>
				<!-- <td><button type="reset">Limpar</button></td> -->
			</tr>
		</table>
	</form>

	<?php
		for ($i = 0; $i < count($db); $i++) {
			$cod = $db[$i]["cod"];
			$name = $db[$i]["nome"];

			$id = "editForm" . ($cod);
			# echo $id;

			# Heredoc
			echo <<<HTML
				<!-- <form id="$id" action="editDir.php" method="POST" hidden> -->
				<form id="$id" action="editDir.php" method="POST">
					<table>
						<tr>
							<td colspan=2>
								<h2>Editar Diretor</h2>
							</td>
						</tr>
						<tr>
							<td><label for="cod">Código:</label></td>
							<td><input type="text" id="cod" name="cod" value="$cod" required></td>
						</tr>
						<tr>
							<td><label for="nome">Nome:</label></td>
							<td><input type="text" id="nome" name="nome" value="$name" required></td>
						</tr>
						<tr>
							<td colspan=2><button type="submit">Enviar</button></td>
							<!-- <td><button type="reset">Limpar</button></td> -->
						</tr>
					</table>
					<input type="number" name="codigo" value="$cod" hidden>
				</form>
			HTML;
		}
	?>

	<script>
		var lastForm; // Last revealed form

		function hideInsForm() {
			let insForm = document.getElementById("insForm");
			insForm.setAttribute("hidden", "hidden");
		}

		// TODO: Make a specialized function
		function hideAllEditForms() {
			for (let id of db.cod) {
				let editForm = document.getElementById("editForm" + id);
				editForm.setAttribute("hidden", "hidden");
			}
		}
		
		function toggleInsForm() {
			let insForm = document.getElementById("insForm");
			if (insForm.getAttribute("hidden")) {
				insForm.removeAttribute("hidden");
			}
			else {
				insForm.setAttribute("hidden", "hidden");
			}

			if (lastForm != "insForm") {
				hideAllEditForms();
			}

			lastForm = "insForm";
		}

		function toggleEditForm(id_num) {
			/* console.log(id);
			console.log(db.cod[id - 1]);
			console.log(db.nome[id - 1]); */

			let id = "editForm" + id_num;
			let editForm = document.getElementById(id);
			let wasHidden = editForm.getAttribute("hidden")

			hideInsForm();
			hideAllEditForms();

			// This works, wtf?!
			if (wasHidden) {
				editForm.removeAttribute("hidden");
			}
			
			/* if (editForm.getAttribute("hidden")) {
				editForm.removeAttribute("hidden");
			}
			else {
				editForm.setAttribute("hidden", "hidden");
			} */
			
			/* if (lastForm == id) {
				// In here I should add the code ensure the toggling of the selected row
			} */

			// Código parcialmente vestigial.
			lastForm = id;
		}

		function addCheckboxAndButt() {  // TODO: Polish this function so that it doesn't create and instead only reveal
			var table = document.getElementById("bela");

			var headerRow = table.rows[0];
			var newHeaderCell = document.createElement("th");
			newHeaderCell.innerHTML = "";
			headerRow.insertBefore(newHeaderCell, headerRow.firstChild);

			var totalRows = table.rows.length;

			for (var i = 1; i < totalRows - 3; i++) {
				var newCell = document.createElement("td");
				var codDir = db.cod[i - 1];				
				newCell.innerHTML = "<td><input type='checkbox' name='selecionados[]' value='" + codDir + "'></td>";

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

		hideAllEditForms();
		hideInsForm();
	</script>
</body>
</html>