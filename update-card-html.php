<!DOCTYPE html>
<html>
<head>
	<title>Modificare Puncte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="height: 100%">
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="home-admin-html.php">Home</a>
	</div>
	<form action="update-card-form.php" method="post">
		<div style="height: 60px"></div>
		<h2>Modificare Puncte  &#128525;</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<div style="height: 50px"></div>
<?php 
		session_start(); 
		include "db_conn.php";
		$carddId = $_GET['id'];
		$sql = "SELECT * FROM CardFidelitate where CardID='$carddId'";
		$result = mysqli_query($conn, $sql);
		if ($result != TRUE) {
				echo 'Tabelul nu exista';
			}
		else{
			while($rowCard = mysqli_fetch_assoc($result))
			{
				$nrpuncte=$rowCard['NumarPuncte'];

				echo "<label>NumarPuncte</label>
				<input type='number' name='nrpuncte' placeholder='NumarPuncte' value='$nrpuncte'><br><br>";

			}

	    }

?>

	<button type="submit">Salvare modificari</button>
	</form>
	<div style="height: 50px"></div>
</body>
</html>