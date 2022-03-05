<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$uname=validate($_POST['uname']);
	$pass=validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login-html.php?error=Prenumele clientului lipseste!");
		exit();
	}else if(empty($pass)){
		header("Location: login-html.php?error=ClientID-ul lipseste!");
		exit();
	}else{
		$sql="SELECT * FROM Client WHERE Email='$uname' AND ClientID='$pass'";
		$result=mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) === 1) {
			$row=mysqli_fetch_assoc($result);

			if($row['Email']===$uname && $row['ClientID']===$pass){
				$_SESSION['PrenumeClient']=$row['PrenumeClient'];
				$_SESSION['NumeClient']=$row['NumeClient'];
				$_SESSION['Email']=$row['Email'];
				$_SESSION['Adresa']=$row['Adresa'];
				$_SESSION['Localitate']=$row['Localitate'];
				$_SESSION['NumarTelefon']=$row['NumarTelefon'];
				$_SESSION['DataNasterii']=$row['DataNasterii'];
				$_SESSION['ClientID']=$row['ClientID'];
				if (strpos($row['Email'], '@admin') !== false) {
				    header("Location: home-admin-html.php");
				} else {
					header("Location: home-client-html.php");
				}			
				exit();
			}else{
				header("Location: login-html.php?error=Prenumele si/sau ClientID-ul incorecte!");
				exit();
			}
		}else {
			header("Location: login-html.php?error=Prenumele si/sau ClientID-ul nu sunt gasite!");
			exit();
		}
	}
}else {
	header("Location: inregistrate-html.php");
	exit();
	}
?>