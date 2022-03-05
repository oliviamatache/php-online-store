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
	<h2>Prenumele clientilor pentru care media pretului comenzilor efectuate mai mared decat media comenzilor tuturor clientilor </h2>
<?php
			session_start();
			include "db_conn.php";

			$sql = "SELECT cl.NumeClient, cl.PrenumeClient, avg(c.PretTotal) as Medie
					from client cl, comanda c
					where c.ClientID=cl.ClientID
					GROUP by cl.NumeClient, cl.PrenumeClient
					having avg(c.PretTotal) > (SELECT avg(c2.PretTotal) from comanda c2)";
					
			$result = mysqli_query($conn, $sql);
			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
			
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1'>
				<tr>
				<th>Numele clientului</th>
				<th>Media comenzilor</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . " " . $rowClient['PrenumeClient'] ."</td>";
				  echo "<td>" .  (double)$rowClient['Medie'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  	$name=$rowClient['NumeClient'] . " " . $rowClient['PrenumeClient'];
				  echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . " " . $rowClient['PrenumeClient'] . "</td>";
				  echo "<td>" .  (double)$rowClient['Medie'] . "</td>";
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
