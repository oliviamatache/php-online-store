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
	<h2>Afișați comenzile a cel putin unui client care are un card de fidelitate cu minim x puncte: </h2>
	<form action="" method="post">

	<div style="display: flex;">
		<input type="number"  max=1000 min=1 name="puncte" placeholder="Puncte">
		<input style="margin-left: 20px; cursor: pointer;" class="basic-button" type="submit" value="Get" name="button1">
	</div>
</form>
	<?php
			session_start();
			
			 if (isset($_POST['puncte'])) {
			    someFunction();
			  }
			  function someFunction() {
			    $search_puncte=$_POST['puncte'];
			    include "db_conn.php";

			    $sql = "select c.ComandaID, c.PretTotal, c.DataComenzii
						from comanda c
						where EXISTS (select cf.CardID from cardfidelitate cf 
						              WHERE cf.NumarPuncte > '$search_puncte' and c.ClientID=cf.ClientID)";
						              
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1' style='margin-top:40px'>
				<tr>
				<th>ID Comanda</th>
				<th>PretTotal</th>
				<th>Data</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['ComandaID'] . "</td>";
				  echo "<td>" . $rowClient['PretTotal'] . "</td>";
				  echo "<td>" . $rowClient['DataComenzii'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['ComandaID'] . "</td>";
				  echo "<td>" . $rowClient['PretTotal'] . "</td>";
				  echo "<td>" . $rowClient['DataComenzii'] . "</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista produse. </div>";
				}


			}
		}
			

?>

</body>
</html>
