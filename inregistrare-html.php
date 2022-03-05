<!DOCTYPE html>
<html>
<head>
	<title>Inregistrare</title>
	<link rel="stylesheet" type="text/css" href="style.css"
</head>
<body style="height: 100%">
	<form action="inregistrare.php" method="post">
		<div style="height: 60px"></div>
		<h2>Inregistrare &#128525;</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<div style="height: 50px"></div>
		<label>Nume Client</label>
		<input type="text" name="nume" placeholder="Nume Client"><br><br>

		<label>Prenume Client</label>
		<input type="text" name="prenume" placeholder="Prenume Client"><br><br>

		<label>E-mail</label>
		<input type="email" name="email" placeholder="Email"><br><br>

		<label>Adresa</label>
		<input type="text" name="adresa" placeholder="Adresa"><br><br>

		<label>Localitate</label>
		<input type="text" name="localitate" placeholder="Localitate"><br><br>

		<label>Data Nasterii</label>
		<input type="date" name="data" placeholder="Data"><br><br>

		<label>Numar de telefon</label>
		<input type="number" name="numar" placeholder="Numar de telefon"><br><br>

		<button type="submit">Inregistrare</button>
		<a href="login-html.php" class="ca">Ai deja cont?</a>
	</form>
	<div style="height: 50px"></div>
</body>
</html>