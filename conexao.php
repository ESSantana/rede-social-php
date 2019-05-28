<?php 

    $conexao = new mysqli("localhost","root","","social");

    if(!$conexao->connect_errno){
        echo $conexao->error;
    }
    
?>