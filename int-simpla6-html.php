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
	<h2>Clienti care au comandat produsul cu numele: </h2>
	<form action="" method="post">

	<div style="display: flex;">
		<input type="text" name="numeProd" placeholder="Nume Produse">
		<input style="margin-left: 20px; cursor: pointer;" class="basic-button" type="submit" value="Get" name="button1">
	</div>
</form>
	<?php
			session_start();
			
			 if (isset($_POST['numeProd'])) {
			    someFunction();
			  }
			  function someFunction() {
			    $search_product=$_POST['numeProd'];
			    include "db_conn.php";
			    $sql = "SELECT NumeClient, PrenumeClient FROM client cl 
						join comanda co on cl.ClientID=co.ClientID
						join comenziproduse cp on co.ComandaID=cp.ComandaID
						JOIN produs p on cp.ProdusID=p.ProdusID
						and p.Denumire='$search_product'
						GROUP BY cl.NumeClient, cl.PrenumeClient";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1' style='margin-top:40px'>
				<tr>
				<th>Nume Client</th>
				<th>Prenume Client</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . "</td>";
				  echo "<td>" . $rowClient['PrenumeClient'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['NumeClient'] . "</td>";
				  echo "<td>" . $rowClient['PrenumeClient'] . "</td>";
				  echo "</tr>";
				  }
				echo "</table>";
				}	else {
					echo "<div> Nu exista clienti. </div>";
				}


			}
		}
			

?>

</body>
</html>
