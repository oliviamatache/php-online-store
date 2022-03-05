<!DOCTYPE html>
<html>
<head>
	<title>Autentificare</title>
	<link rel="stylesheet" type="text/css" href="style.css"
</head>
<body>
	<form action="login.php" method="post">
		<h2>Autentificare &#128525;</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error'];?></p>
		<?php } ?>
		<?php if(isset($_GET['success'])){ ?>
			<p class="success"><?php echo $_GET['success'];?></p>
		<?php } ?>
		<label>Email</label>
		<input type="text" name="uname" placeholder="Email"><br><br>

		<label>ID-ul clientului</label>
		<input type="password" name="password" placeholder="ClientID"><br><br>

		<button class="auth-button" type="submit" >Autentificare</button>
		<a href="inregistrare.php" class="ca">Cont nou</a>
	</form>
</body>
</html>