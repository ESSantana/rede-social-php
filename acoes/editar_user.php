<?php
    include_once './../conexao.php';

    // Obtém o ID via GET
    $id = $_GET["id_user"];
    
    // Passou o ID?
    if ($id == NULL) {
        echo "O ID não foi passado! <br><br>";
    }
?>