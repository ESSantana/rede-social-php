<?php   
    //INICIA O USO DE SESSÃO NO ARQUIVO
    session_start();
    //DESTROI TODAS AS SESSÕES INICIADAS 
    session_destroy();
    //REDIRECIONA PARA A HOME
    header("Location: ./../index.php");
?>