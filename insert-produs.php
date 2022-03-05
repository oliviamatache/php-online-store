<?php
session_start();
include "db_conn.php";
$randomNumber=0;
if(isset($_POST['denumire']) && isset($_POST['cantitate'])  && isset($_POST['brand'])
	 && isset($_POST['termen'])  && isset($_POST['pret'])  && isset($_POST['nuanta'])){
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
	$nuanta=validate($_POST['nuanta']);

	if (empty($denumire)) {
		header("Location: insert-produs-html.php?error=Denumirea produsului lipseste!");
		exit();
	}else if(empty($cantitate)){
		header("Location:insert-produs-html.php?error=Cantitatea lipseste!");
		exit();
	}else if(empty($brand)){
		header("Location: insert-produs-html.php?error=Brand-ul lipseste!");
		exit();
	}else if(empty($termen)){
		header("Location: insert-produs-html.php?error=Termenul de valabilitate lipseste!");
		exit();
	}else if(empty($pret)){
		header("Location: insert-produs-html.php?error=Pretul lipseste!");
		exit();
	}else if(empty($nuanta)){
		header("Location: insert-produs-html.php?error=Nuanta lipseste!");
		exit();
	}else{
		if(!empty($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
        echo 'You have chosen: ' . $categorie;
    	} 
    	$categorie = $_POST['categorie'];
 		$randomNumber = rand(200,123508);
		$sql="INSERT INTO Produs(ProdusID, CategorieID, Denumire, Cantitate, Brand, TermenValabilitate, Pret, Nuanta) VALUES ($randomNumber, $categorie, '$denumire', '$cantitate', '$brand', '$termen', '$pret', '$nuanta')";
		$result=mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: categorii-produse-admin-html.php?success=Produs adaugat cu succes!");
	         exit();
           }else {
	           	header("Location: categorii-produse-admin-html.php?error=unknown error occurred");
		        exit();
           }
	}
}else {
	header("Location: inregistrare-html.php");
	exit();
	}