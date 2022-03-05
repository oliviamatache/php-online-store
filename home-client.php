<?php
    if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }else if(array_key_exists('button3', $_POST)) {
            button3();
        }else if(array_key_exists('button4', $_POST)) {
            button4();
        }else if(array_key_exists('button5', $_POST)) {
            button5();
        }
        function button1() {
        	header("Location: categorii-produse-html.php?");
            echo "This is Button1 that is selected";
        }
        function button2() {
            header("Location: card-fidelitate-client.php?");//de modif
            echo "This is Button2 that is selected";
        }
        function button3() {
            header("Location: client-comenzi.php?");
            echo "This is Button3 that is selected";
        }
        function button4() {
            header("Location: client-produse-comandate.php?");
            echo "This is Button4 that is selected";
        }
        function button5() {
            header("Location: update-client-html.php?");
            echo "This is Button5 that is selected";
        }
?>