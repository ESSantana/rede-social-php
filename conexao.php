<?php 

    // CONECTA AO BANCO DE DADOS LOCAL
    $conexao = new mysqli("localhost","root","","social");

    if(!$conexao->connect_errno){
        echo $conexao->error;
    }
    
?>