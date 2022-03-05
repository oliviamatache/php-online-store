<?php
session_start();
include "db_conn.php";

if(isset($_POST['denumire']) && isset($_POST['cantitate'])  && isset($_POST['brand'])
	 && isset($_POST['termen'])  && isset($_POST['pret'])){
	function validate($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$denumire=validate($_POST['denumire']);
	$cantitate=validate($_POST['cantitate']);
	$brand=validate($_POST['brand']);
	$termen=validate($_POST['termen']);
	$pret=validate($_POST['pret']);
	if (empty($denumire)) {
		header("Location: update-client-html.php?error=denumirea lipseste!");
		exit();
	}else if(empty($cantitate)){
		header("Location:update-client-html.php?error=cantitatea lipseste!");
		exit();
	}else if(empty($brand)){
		header("Location: update-client-html.php?error=brandul lipseste!");
		exit();
	}else if(empty($termen)){
		header("Location:update-client-html.php?error=termenul lipseste!");
		exit();
	}else if(empty($pret)){
		header("Location: update-client-html.php?error=pretul lipseste!");
		exit();
	}else{
		$produsID= $_SESSION['ProdusID'];
		$sql="UPDATE Produs SET Denumire='$denumire', Cantitate='$cantitate', Brand='$brand', TermenValabilitate='$termen', Pret='$pret' WHERE ProdusID='$produsID'";
		$result=mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: categorii-produse-admin-html.php?success=Produs modificat cu succes!");
	         exit();
           }else {
	           	header("Location: update-produse-html.php?error=unknown error occurred&$user_data");
		        exit();
           }
	}
}else {
	header("Location: admin-home-html.php");
	exit();
	}