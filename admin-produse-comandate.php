<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-admin-html.php">Home</a>
	</div>
	<h2>Toate Produsele comandate</h2>
<?php
			session_start();
			include "db_conn.php";
			$sql = "SELECT *
				FROM ComenziProduse";
			$result = mysqli_query($conn, $sql);
			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{

				if (mysqli_num_rows($result) > 0){
				echo "<table border='1'>
				<tr>
				<th>ID-ul produsului</th>
				<th>ID-ul comenzii</th>
				<th>Numarul produselor comandate</th>
				</tr>";
				$rowComandaProd = mysqli_fetch_assoc($result);
				echo "<tr>";
				echo "<td>" . $rowComandaProd['ProdusID'] . "</td>";
				echo "<td>" . $rowComandaProd['ComandaID'] . "</td>";
				echo "<td>" . $rowComandaProd['NrProduseComandate'] . "</td>";
				echo "</tr>";
				while($rowComandaProd = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowComandaProd['ProdusID'] . "</td>";
				  echo "<td>" . $rowComandaProd['ComandaID'] . "</td>";
				  echo "<td>" . $rowComandaProd['NrProduseComandate'] . "</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista produse comandate. </div>";
				}

		}

?>

</body>
</html>
