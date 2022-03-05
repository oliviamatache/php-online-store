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
	<h2>Carduri de fidelitate ale clientilor</h2>
<?php
			session_start();
			include "db_conn.php";
			include "sterge-card-admin.php";
			$sql = "SELECT *
				FROM CardFidelitate";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1'>
				<tr>
				<th>CardID</th>
				<th>Puncte acumulate</th>
				<th>Actiune Stergere</th>
				<th>Actiune Editare</th>
				</tr>";
				$rowCard = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowCard['CardID'] . "</td>";
				  echo "<td>" . $rowCard['NumarPuncte'] . "</td>";
				  echo "<td><a href='sterge-card-admin.php?id=".$rowCard['CardID']."'>Sterge</a></td>
				  ";
				  echo "<td><a href='update-card.php?id=".$rowCard['CardID']."'>Modificare puncte</a></td>";
				  echo "</tr>";
				while($rowCard = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowCard['CardID'] . "</td>";
				  echo "<td>" . $rowCard['NumarPuncte'] . "</td>";
				  echo "<td><a href='sterge-card-admin.php?id=".$rowCard['CardID']."'>Sterge</a></td>
				  ";
				  echo "<td><a href='update-card.php?id=".$rowCard['CardID']."'>Modificare puncte</a></td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista carduri de fidelitate ale clientilor. </div>";
				}

		}

?>

</body>
</html>
