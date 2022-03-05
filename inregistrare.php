<?php
session_start();
include "db_conn.php";
$randomNumber=0;
if(isset($_POST['nume']) && isset($_POST['prenume'])  && isset($_POST['numar'])
	 && isset($_POST['adresa'])  && isset($_POST['email'])  && isset($_POST['localitate'])
	  && isset($_POST['data'])) {
	function validate($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$nume=validate($_POST['nume']);
	$prenume=validate($_POST['prenume']);
	$numar=validate($_POST['numar']);
	$adresa=validate($_POST['adresa']);
	$email=validate($_POST['email']);
	$localitate=validate($_POST['localitate']);
	$data=validate($_POST['data']);

	if (empty($nume)) {
		header("Location: inregistrare-html.php?error=Numele clientului lipseste!");
		exit();
	}else if(empty($prenume)){
		header("Location:inregistrare-html.php?error=Prenumele lipseste!");
		exit();
	}else if(empty($numar)){
		header("Location: inregistrare-html.php?error=Numarul de Telefon lipseste!");
		exit();
	}else if(empty($adresa)){
		header("Location: inregistrare-html.php?error=Adresa lipseste!");
		exit();
	}else if(empty($email)){
		header("Location: inregistrare-html.php?error=Email-ul lipseste!");
		exit();
	}else if(empty($localitate)){
		header("Location: inregistrare-html.php?error=Localitatea lipseste!");
		exit();
	}else if(empty($data)){
		header("Location: inregistrare-html.php?error=Data lipseste!");
		exit();
	}else{

 	  $randomNumber = rand(200,123508);

		$sql="INSERT INTO Client VALUES ($randomNumber,'$nume', '$prenume','$email', '$adresa', '$localitate', '$numar', '$data')";
		$result=mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: login-html.php?success=Your account has been created successfully. Your login code is: $randomNumber");
	         exit();
           }else {
	           	header("Location: login-html.php?error=unknown error occurred&$user_data");
		        exit();
           }
		// if (mysqli_num_rows($result) === 1) {
		// 	$row=mysqli_fetch_assoc($result);

		// 	if($row['PrenumeClient']===$uname && $row['ClientID']===$pass){
		// 		$_SESSION['PrenumeClient']=$row['PrenumeClient'];
		// 		$_SESSION['NumeClient']=$row['NumeClient'];
		// 		$_SESSION['E-mail']=$row['E-mail'];
		// 		$_SESSION['Adresa']=$row['Adresa'];
		// 		$_SESSION['Localitate']=$row['Localitate'];
		// 		$_SESSION['NumarTelefon']=$row['NumarTelefon'];
		// 		$_SESSION['DataNasterii']=$row['DataNasterii'];
		// 		header("Location: home.php");
		// 		exit();
		// 	}else{
		// 		header("Location: index.php?error=Prenumele si/sau ClientID-ul incorecte!");
		// 		exit();
		// 	}
		// }else {
		// 	header("Location: index.php?error=Prenumele si/sau ClientID-ul incorecte!");
		// 	exit();
		// }
	}
}else {
	header("Location: inregistrare-html.php");
	exit();
	}