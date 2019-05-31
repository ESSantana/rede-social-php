<?php
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    
    error_reporting(1);


    // VERIFICA SE EXISTE UMA SESSÃO INICIA, CASO SEJA FALSO, REDIRECIONA PRA PAGE INDEX
    if($_SESSION['sessao'] != true){
        header("Location:./index.php");
    }
?>