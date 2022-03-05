<?php
include "db_conn.php";
session_start();
if(isset($_GET['id'])) {
    $update_id = $_GET['id'];
    $_SESSION['ProdusID']=$update_id;
    header("Location: update-produse-html.php?id=$update_id");
}
?>