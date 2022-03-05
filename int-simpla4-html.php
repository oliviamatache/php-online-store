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
	<h2>Produse care au fost comandate in data de: </h2>
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
			    $sql = "SELECT p.Denumire, p.Brand  FROM produs p 
				INNER JOIN comenziproduse cp on cp.ProdusID=p.ProdusID
				INNER JOIN comanda c on c.ComandaID=cp.ComandaID and c.DataComenzii = '$search_date'
				GROUP BY p.Denumire, p.Brand
				ORDER BY p.Denumire ASC";
			$result = mysqli_query($conn, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
			else{
				if (mysqli_num_rows($result) > 0){
				echo "<table border='1' style='margin-top:40px'>
				<tr>
				<th>Denumire</th>
				<th>Brand</th>
				</tr>";
				$rowClient = mysqli_fetch_assoc($result);
				echo "<tr>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
				  echo "<td>" . $rowClient['Brand'] . "</td>";
				  echo "</tr>";

				while($rowClient = mysqli_fetch_assoc($result))
				  {
				  echo "<tr>";
				  echo "<td>" . $rowClient['Denumire'] . "</td>";
				  echo "<td>" . $rowClient['Brand'] . "</td>";
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
