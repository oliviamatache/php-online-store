<?php
session_start();
include "db_conn.php";

if(isset($_POST['nume']) && isset($_POST['prenume'])  && isset($_POST['email'])
	 && isset($_POST['adresa'])  && isset($_POST['localitate'])  && isset($_POST['data'])
	 	&& isset($_POST['numarTelefon'])){
	function validate($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$nume=validate($_POST['nume']);
	$prenume=validate($_POST['prenume']);
	$email=validate($_POST['email']);
	$adresa=validate($_POST['adresa']);
	$localitate=validate($_POST['localitate']);
	$data=validate($_POST['data']);
	$numarTelefon=validate($_POST['numarTelefon']);

	$_SESSION['PrenumeClient']=$prenume;
	$_SESSION['NumeClient']=$nume;
	$_SESSION['Email']=$email;
	$_SESSION['Adresa']=$adresa;
	$_SESSION['Localitate']=$localitate;
	$_SESSION['NumarTelefon']=$numarTelefon;
	$_SESSION['DataNasterii']=$dataNasterii;

	if (empty($nume)) {
		header("Location: update-client-html.php?error=Numele lipseste!");
		exit();
	}else if(empty($prenume)){
		header("Location:update-client-html.php?error=Prenumele lipseste!");
		exit();
	}else if(empty($email)){
		header("Location: update-client-html.php?error=Email-ul lipseste!");
		exit();
	}else if(empty($adresa)){
		header("Location:update-client-html.php?error=Adresa lipseste!");
		exit();
	}else if(empty($localitate)){
		header("Location: update-client-html.php?error=Localitatea lipseste!");
		exit();
	}else if(empty($data)){
		header("Location: update-client-html.php?error=Data lipseste!");
		exit();
	}else if(empty($numarTelefon)){
		header("Location: update-client-html.php?error=Numarul de telefon lipseste!");
		exit();
	}else{
		$clientId=$_SESSION['ClientID'];
		$sql="UPDATE Client SET NumeClient='$nume', PrenumeClient='$prenume', Email='$email', Adresa='$adresa', Localitate='$localitate', DataNasterii='$data', NumarTelefon='$numarTelefon'
			WHERE ClientID='$clientId'";
		$result=mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: update-client-html.php?success=Produs adaugat cu succes!");
	         exit();
           }else {
	           	header("Location: update-client-html.php?error=unknown error occurred&$user_data");
		        exit();
           }
	}
}else {
	header("Location: client-home-html.php");
	exit();
	}