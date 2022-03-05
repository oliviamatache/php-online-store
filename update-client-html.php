<!DOCTYPE html>
<html>
<head>
	<title>Modificare Date Client</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="height: 100%">
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-client-html.php">Home</a>
	</div>
	<form action="update-client.php" method="post">
		<div style="height: 60px"></div>
		<h2>Modificare Date  &#128525;</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<div style="height: 50px"></div>
<?php 
		session_start(); 
		include "db_conn.php";
		$clientId=$_SESSION['ClientID'];
		$sql = "SELECT * FROM Client where ClientID='$clientId'";
		$result = mysqli_query($conn, $sql);
		if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
		else{
			while($rowClient = mysqli_fetch_assoc($result))
			{
				$numeClient=$rowClient['NumeClient'];
				$prenumeClient=$rowClient['PrenumeClient'];
				$email=$rowClient['Email'];
				$adresa=$rowClient['Adresa'];
				$localitate=$rowClient['Localitate'];
				$numarTelefon=$rowClient['NumarTelefon'];
				$dataNasterii=$rowClient['DataNasterii'];


				echo "<label>Nume Client</label>
				<input type='text' name='nume' placeholder='Nume Client' value='$numeClient'><br><br>";
				echo "<label>Prenume Client</label>
				<input type='text' name='prenume' placeholder='Prenume Client' value='$prenumeClient'><br><br>";
				echo "<label>Email</label>
				<input type='text' name='email' placeholder='Email' value='$email'><br><br>";
				echo "<label>Adresa</label>
				<input type='text' name='adresa' placeholder='Adresa' value='$adresa'><br><br>";
				echo "<label>Localitate</label>
				<input type='text' name='localitate' placeholder='Localitate' value='$localitate'><br><br>";
				echo "<label>Data Nasterii</label>
				<input type='date' name='data' placeholder='Data Nasterii' value='$dataNasterii'><br><br>";
				echo "<label>Numar de telefon</label>
				<input type='phone' name='numarTelefon' placeholder='Numar de telefon' value='$numarTelefon'><br><br>";

			}

	    }

?>

	<button type="submit">Salvare modificari</button>
	</form>
	<div style="height: 50px"></div>
</body>
</html>