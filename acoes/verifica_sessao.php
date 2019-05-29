<?php
    session_start();

    if($_SESSION['sessao'] != true){
        header("Location:./index.php");
    }
?>