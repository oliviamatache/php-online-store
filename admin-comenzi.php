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
	<h2>Toate Comenzile</h2>
<?php
			session_start();
			include "db_conn.php";
			$sql = "SELECT *
				FROM Comanda";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1'>
				<tr>
				<th>ID-ul comenzii</th>
				<th>Pretul total</th>
				<th>Data comenzii</th>
				</tr>";
				$rowComanda = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowComanda['ComandaID'] . "</td>";
				  echo "<td>" . $rowComanda['PretTotal'] . "</td>";
				  echo "<td>" . $rowComanda['DataComenzii'] . "</td>";
				  echo "</tr>";
				while($rowComanda = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowComanda['ComandaID'] . "</td>";
				  echo "<td>" . $rowComanda['PretTotal'] . "</td>";
				  echo "<td>" . $rowComanda['DataComenzii'] . "</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista comenzi. </div>";
				}

		}

?>

</body>
</html>
