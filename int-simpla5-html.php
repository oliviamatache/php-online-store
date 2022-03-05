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
	<h2>Comenzile care contin mai mult de un numar de produse: </h2>
	<form action="" method="post">

	<div style="display: flex;">
		<input style="width: 140px" type="number" max=20 min=1 name="nrProd" placeholder="Numar produse">
		<input style="margin-left: 20px; cursor: pointer;" class="basic-button" type="submit" value="Get" name="button1">
	</div>
</form>
	<?php
			session_start();
			
			 if (isset($_POST['nrProd'])) {
			    functionProd();
			  }
			  function functionProd() {
			    $nrProd=$_POST['nrProd'];
			    include "db_conn.php";
			    $sql = "SELECT c.ComandaID,c.DataComenzii, c.PretTotal FROM comanda c 
				INNER JOIN comenziproduse cp on cp.ComandaID=c.ComandaID
				INNER JOIN produs p ON p.ProdusID=cp.ProdusID
				GROUP by c.ComandaID, c.PretTotal
				HAVING SUM(cp.NrProduseComandate >'$nrProd')";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1' style='margin-top:40px'>
				<tr>
				<th>ID Comanda</th>
				<th>Data</th>
				<th>Pret Total</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['ComandaID'] . "</td>";
				  echo "<td>" . $rowClient['DataComenzii'] . "</td>";
				  echo "<td>" . $rowClient['PretTotal'] ." lei</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['ComandaID'] . "</td>";
				  echo "<td>" . $rowClient['DataComenzii'] . "</td>";
				  echo "<td>" . $rowClient['PretTotal'] . " lei</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista comenzi. </div>";
				}


			}
		}
			

?>

</body>
</html>
