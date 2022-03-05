<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="height: auto">
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-admin-html.php">Home</a>
	</div>
	<h2>Categorii produse</h2>
	<div style="height: 20px"></div>
<?php
			session_start();
			include "db_conn.php";
			include "sterge-categorii-produse-admin.php";
			$sql = "SELECT *
				FROM Categorie";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
			while($rowCategorii = mysqli_fetch_assoc($result))
			  {
			  echo "<div class='middle-text' style='margin-bottom: 30px; font-size: 20px'>" . $rowCategorii['Denumire'] . "</div>";
			  $idCategorie =$rowCategorii['CategorieID'];
			  $sqlProduse = "SELECT * FROM Produs where CategorieID='$idCategorie'";		
 			  $resultProduse = mysqli_query($conn, $sqlProduse);

				if ($resultProduse != TRUE) {
					echo 'Tabelul nu exista';
				} else {
				if (mysqli_num_rows($resultProduse) > 0){
				echo "<table border='1'>
				<tr>
				<th>Denumire</th>
				<th>Cantitate</th>
				<th>Brand</th>
				<th>Pret</th>
				<th>Actiune Stergere</th>
				<th>Actiune Editare</th>
				</tr>";
				// $rowProduse = mysqli_fetch_assoc($resultProduse);
				while($rowProduse = mysqli_fetch_assoc($resultProduse))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowProduse['Denumire'] . "</td>";
				  echo "<td>" . $rowProduse['Cantitate'] . "</td>";
				  echo "<td>" . $rowProduse['Brand'] . "</td>";
				  echo "<td>" . $rowProduse['Pret'] . "</td>";
				  echo "<td><a class='a-buttons' href='sterge-categorii-produse-admin.php?id=".$rowProduse['ProdusID']."'>Sterge</a></td>";
				  echo "<td><a class='a-buttons' href='update-categorii-produse.php?id=".$rowProduse['ProdusID']."'>Editare</a></td>";
				  echo "</tr>";
				   
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista produse in aceasta categorie. </div>";
				}

			  
			 
			}

		}
	}

?>
<a href='insert-produs-html.php'>
<div>
	<input class="basic-button" type="submit" name="adaugaProdus" value="Adauga Produs" style="margin-top;">

</div>
</a>
</body>
</html>
