<?php
include "db_conn.php";
session_start();
if(isset($_GET['id'])) {
    $update_id = $_GET['id'];
    $_SESSION['CardID']=$update_id;
    header("Location: update-card-html.php?id=$update_id");
}
?>