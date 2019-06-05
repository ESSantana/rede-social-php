<?php
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    include_once 'conexao.php';

    // DESIGN DO COMENTARIO
    echo "
    <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
        <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
        <span class=\"w3-right w3-opacity\">$data</span>
        <h4>$nome</h4><br>
        <hr class=\"w3-clear\">
        <p>$comentario</p>
    </div>";
?>