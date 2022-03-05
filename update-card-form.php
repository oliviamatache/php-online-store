<?php
session_start();
include "db_conn.php";

if(isset($_POST['nrpuncte'])){
	function validate($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$nrpuncte=validate($_POST['nrpuncte']);

	if (empty($nrpuncte)) {
		header("Location: update-card-html.php?error=nrpuncte lipseste!");
		exit();
	}else{
		$CardID= $_SESSION['CardID'];
		$sql="UPDATE CardFidelitate SET NumarPuncte='$nrpuncte' WHERE CardID='$CardID'";
		$result=mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: card-fidelitate-admin.php?success=Puncte modificate cu succes!");
	         exit();
           }else {
	           	header("Location: update-card-html.php?error=unknown error occurred&$user_data");
		        exit();
           }
	}
}else {
	header("Location: admin-home-html.php");
	exit();
	}