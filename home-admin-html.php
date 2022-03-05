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
	<h1 style="margin-top: -30px">Buna, <?php echo $_SESSION['PrenumeClient']; echo ' '; echo $_SESSION['NumeClient']; echo '!';?></h1>
	<form action="home-admin.php" method="post" style="margin-top: 100px">
	<div style="display: flex;">
		<input class="menu-blocks" type="submit" value="Categorii Produse" name="button1">
		</input>
		<input class="menu-blocks" type="submit" value="Clienti" name="button2">
		</input>
		<input class="menu-blocks" type="submit" value="Card de fidelitate" name="button3">
		</input>
		<input class="menu-blocks" type="submit" value="Comenzi" name="button4">
		</input>
		<input class="menu-blocks" type="submit" value="Produse Comandate" name="button5">
		</input>
	</div>
	<div style="display: inline;">
		<input class="menu-blocks" type="submit" value="Interogare simpla1" name="button6">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare simpla2" name="button7">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare simpla3" name="button8">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare simpla4" name="button9">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare simpla5" name="button10">
		</input>
	</div>
	<div>
		<input class="menu-blocks" type="submit" value="Interogare complexa1" name="button11">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare complexa2" name="button12">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare complexa3" name="button13">
		</input>
		<input class="menu-blocks" type="submit" value="Interogare complexa4" name="button14">
		</input>

	</div>

</form>
	
</body>
</html>
<?php
}else{
	header("Location: login-html.php");
	exit();
}
?>