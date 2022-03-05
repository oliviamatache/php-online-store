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
	<h2>Aflați produsele dintr-o comanda in care comanda aparține unui client din orasul: </h2>
	<form action="" method="post">

	<div style="display: flex;">
		<input type="text" name="oras" placeholder="Oras">
		<input style="margin-left: 20px; cursor: pointer;" class="basic-button" type="submit" value="Get" name="button1">
	</div>
</form>
	<?php
			session_start();
			
			 if (isset($_POST['oras'])) {
			    someFunction();
			  }
			  function someFunction() {
			    $search_oras=$_POST['oras'];
			    include "db_conn.php";

			    $sql = "select p.ProdusID, p.Denumire from produs p
						join comenziproduse cp on cp.ProdusID=p.ProdusID
						where cp.ComandaID in (select co.ComandaID from comanda co
						                       join client c on c.ClientID=co.ClientID
						                       and c.Localitate='$search_oras')
						order by p.Denumire asc";
						
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
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['ProdusID'] . "</td>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['ProdusID'] . "</td>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
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
