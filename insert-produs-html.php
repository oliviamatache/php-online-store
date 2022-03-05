<!DOCTYPE html>
<html>
<head>
	<title>Adaugare Produs</title>
	<link rel="stylesheet" type="text/css" href="style.css"
</head>
<body style="height: 100%">
<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-admin-html.php">Home</a>
	</div>
		<div style="height: 60px"></div>
		<h2>Adaugare Produs</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
<form action="insert-produs.php" method="post">
		<div style="height: 50px"></div>
		<?php 
		include "db_conn.php";
		$sql = "SELECT *
				FROM Categorie";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				echo "<div>";
				echo "<label for='categorie'>Alege categorie:</label>";
				echo "<select name='categorie' style='margin-bottom:20px;'>";
			while($rowCategorii = mysqli_fetch_assoc($result)){
				$idCategorie=$rowCategorii['CategorieID'];
		echo "<option value='$idCategorie'>".$rowCategorii['Denumire']."</option>";
			}
			echo "</select>";
			echo "</div>";
		}

		?>
		<label>Denumire</label>
		<input type="text" name="denumire" placeholder="Denumire"><br><br>

		<label>Cantitate</label>
		<input type="number" name="cantitate" placeholder="Cantitate"><br><br>

		<label>Brand</label>
		<input type="text" name="brand" placeholder="Brand"><br><br>

		<label>Termen de valabilitate</label>
		<input type="date" name="termen" placeholder="Termen de valabilitate"><br><br>

		<label>Pret</label>
		<input type="number" name="pret" placeholder="Pret"><br><br>

		<label>Nuanta</label>
		<input type="text" name="nuanta" placeholder="Nuanta"><br><br>

		<button type="submit">Adaugare Produs</button>
		<!-- <a href="login-html.php" class="ca">Ai deja cont?</a> -->
</form>
	<div style="height: 50px"></div>
</body>
</html>