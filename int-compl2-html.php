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
	<h2>Toate produsele care sunt mai scumpe decat toate comenzile mai vechi de data: </h2>
	<form action="" method="post">

	<div style="display: flex;">
		<input type="date" name="date" placeholder="Data">
		<input style="margin-left: 20px; cursor: pointer;" class="basic-button" type="submit" value="Get" name="button1">
	</div>
</form>
	<?php
			session_start();
			
			 if (isset($_POST['date'])) {
			    someFunction();
			  }
			  function someFunction() {
			    $search_date=$_POST['date'];
			    include "db_conn.php";

			    $sql = "SELECT p.ProdusID, p.Denumire, p.Pret
						from produs p 
						where p.Pret > all(select c.PretTotal from comanda c 
						              where c.DataComenzii <'$search_date' )";
						              
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1' style='margin-top:40px'>
				<tr>
				<th>ID Produs</th>
				<th>Denumire</th>
				<th>Pret</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['ProdusID'] . "</td>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
				  echo "<td>" . $rowClient['Pret'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['ProdusID'] . "</td>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
				  echo "<td>" . $rowClient['Pret'] . "</td>";
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
