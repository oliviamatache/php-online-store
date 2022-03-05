<?php
include "db_conn.php";

if(isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM Comanda WHERE ComandaID = '".$delete_id."'");
    if($sql) {
        header("Location: client-comenzi.php");
        echo "<br/><br/><span>deleted successfully...!!</span>";
    } else {
        echo "ERROR";
    }
}

?>