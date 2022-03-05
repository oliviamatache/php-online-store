<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="height: auto">
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-client-html.php">Home</a>
	</div>
	<h2>Categorii produse</h2>
	<div style="height: 20px"></div>
<?php
			session_start();
			include "db_conn.php";
			$sql = "SELECT *
				FROM Categorie";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
			while($rowCategorii = mysqli_fetch_assoc($result))
			  {
			  echo "<div class='middle-text' style='margin-bottom: 20px; font-size: 20px'>" . $rowCategorii['Denumire'] . "</div>";
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
				</tr>";
				// $rowProduse = mysqli_fetch_assoc($resultProduse);
				while($rowProduse = mysqli_fetch_assoc($resultProduse))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowProduse['Denumire'] . "</td>";
				  echo "<td>" . $rowProduse['Cantitate'] . "</td>";
				  echo "<td>" . $rowProduse['Brand'] . "</td>";
				  echo "<td>" . $rowProduse['Pret'] . "</td>";
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

</body>
</html>
