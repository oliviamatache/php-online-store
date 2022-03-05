<?php 
session_start();

if (isset($_SESSION['PrenumeClient']) && isset($_SESSION['NumeClient'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
		<a style=" position:absolute;top:0;right:0;margin-top: 20px; margin-right: 20px" href="logout.php">Logout</a>
	</div>
	<h1>Bună, <?php echo $_SESSION['PrenumeClient']; echo ' '; echo $_SESSION['NumeClient']; echo '!';?></h1>
	<form action="home-client.php" method="post">
	<div style="display: flex;">
		<input class="menu-blocks" type="submit" value="Categorii Produs" name="button1">
		</input>
		<input class="menu-blocks" type="submit" value="Card de fidelitate" name="button2">
		</input>
		<input class="menu-blocks" type="submit" value="Comenzi" name="button3">
		</input>
		<input class="menu-blocks" type="submit" value="Produse Comandate" name="button4">
		</input>
		<input class="menu-blocks" type="submit" style="width: 200px" value="Modificare Date Personale" name="button5">
		</input>


	</div>
</form>
	
</body>
</html>
<?php
}else{
	header("Location: index.php");
	exit();
}
?>