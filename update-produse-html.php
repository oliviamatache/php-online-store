<!DOCTYPE html>
<html>
<head>
	<title>Modificare Date Client</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="height: 100%">
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-admin-html.php">Home</a>
	</div>
	<form action="update-produse.php" method="post">
		<div style="height: 60px"></div>
		<h2>Modificare Produs  &#128525;</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<div style="height: 50px"></div>
<?php 
		session_start(); 
		include "db_conn.php";
		$productId = $_GET['id'];
		$sql = "SELECT * FROM Produs where ProdusID='$productId'";
		$result = mysqli_query($conn, $sql);
		if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
		else{
			while($rowProd = mysqli_fetch_assoc($result))
			{
				$denumire=$rowProd['Denumire'];
				$cantitate=$rowProd['Cantitate'];
				$brand=$rowProd['Brand'];
				$termen=$rowProd['TermenValabilitate'];
				$pret=$rowProd['Pret'];

				echo "<label>Denumire</label>
				<input type='text' name='denumire' placeholder='Denumire' value='$denumire'><br><br>";
				echo "<label>Cantitate</label>
				<input type='number' name='cantitate' placeholder='Cantitate' value='$cantitate'><br><br>";
				echo "<label>Brand</label>
				<input type='text' name='brand' placeholder='Brand' value='$brand'><br><br>";
				echo "<label>Termen Valabilitate</label>
				<input type='date' name='termen' placeholder='Termen' value='$termen'><br><br>";
				echo "<label>Pret</label>
				<input type='number' name='pret' placeholder='Pret' value='$pret'><br><br>";

			}

	    }

?>

	<button type="submit">Salvare modificari</button>
	</form>
	<div style="height: 50px"></div>
</body>
</html>