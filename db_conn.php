<?php

$sname="localhost";
$uname="root";
$password="";
$db_name = "test1";

$conn=mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
	echo "Conexiune nereusita!";
}