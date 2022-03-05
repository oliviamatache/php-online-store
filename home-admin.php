<?php
         if(array_key_exists('button1', $_POST)) {
            button1();
        }else if(array_key_exists('button2', $_POST)) {
            button2();
        }else if(array_key_exists('button3', $_POST)) {
            button3();
        }else if(array_key_exists('button4', $_POST)) {
            button4();
        }else if(array_key_exists('button5', $_POST)) {
            button5();
        }else if(array_key_exists('button6', $_POST)) {
            button6();
        }else if(array_key_exists('button7', $_POST)) {
            button7();
        }else if(array_key_exists('button8', $_POST)) {
            button8();
        }else if(array_key_exists('button9', $_POST)) {
            button9();
        }else if(array_key_exists('button10', $_POST)) {
            button10();
        }else if(array_key_exists('button11', $_POST)) {
            button11();
        }else if(array_key_exists('button12', $_POST)) {
            button12();
        }else if(array_key_exists('button13', $_POST)) {
            button13();
        }else if(array_key_exists('button14', $_POST)) {
            button14();
        }
        function button1() {
            header("Location: categorii-produse-admin-html.php?");
            echo "This is Button1 that is selected";
        }
        function button2() {
            header("Location: admin-clienti.php?");
            echo "This is Button2 that is selected";
        }
        function button3() {
            header("Location: card-fidelitate-admin.php?");
            echo "This is Button3 that is selected";
        }
        function button4() {
            header("Location: admin-comenzi.php?");
            echo "This is Button4 that is selected";
        }
        function button5() {
            header("Location: admin-produse-comandate.php?");
            echo "This is Button5 that is selected";
        }
        function button6() {
            header("Location: int-simpla2.php?");
            echo "This is Button6 that is selected";
        }
        function button7() {
            header("Location: int-simpla3-html.php?");
            echo "This is Button7 that is selected";
        }
         function button8() {
            header("Location: int-simpla4-html.php?");
            echo "This is Button8 that is selected";
        }
         function button9() {
            header("Location: int-simpla5-html.php?");
            echo "This is Button8 that is selected";
        }
         function button10() {
            header("Location: int-simpla6-html.php?");
            echo "This is Button8 that is selected";
        }
         function button11() {
            header("Location: int-compl1-html.php?");
            echo "This is Button8 that is selected";
        }
         function button12() {
            header("Location: int-compl2-html.php?");
            echo "This is Button8 that is selected";
        }
         function button13() {
            header("Location: int-compl3-html.php?");
            echo "This is Button8 that is selected";
        }
         function button14() {
            header("Location: int-compl4-html.php?");
            echo "This is Button8 that is selected";
        }

?>