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
	<h2>Clienti</h2>
<?php
			session_start();
			include "db_conn.php";
			$sql = "SELECT *
				FROM Client";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
			
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1'>
				<tr>
				<th>Nume</th>
				<th>Prenume</th>
				<th>E-mail</th>
				<th>Adresa</th>
				<th>Numar de telefon</th>
				<th>Localitate</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . "</td>";
				  echo "<td>" . $rowClient['PrenumeClient'] . "</td>";
				  echo "<td>" . $rowClient['Email'] . "</td>";
				  echo "<td>" . $rowClient['Adresa'] . "</td>";
				  echo "<td>" . $rowClient['NumarTelefon'] . "</td>";
				  echo "<td>" . $rowClient['Localitate'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . "</td>";
				  echo "<td>" . $rowClient['PrenumeClient'] . "</td>";
				  echo "<td>" . $rowClient['Email'] . "</td>";
				  echo "<td>" . $rowClient['Adresa'] . "</td>";
				  echo "<td>" . $rowClient['NumarTelefon'] . "</td>";
				  echo "<td>" . $rowClient['Localitate'] . "</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista clienti. </div>";
				}


		}

?>

</body>
</html>
