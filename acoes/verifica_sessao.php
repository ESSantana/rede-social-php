<?php
    error_reporting(1);
    session_start();

    if($_SESSION['sessao'] != true){
        header("Location:./index.php");
    }
?>