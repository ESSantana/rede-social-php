<?php
    include_once './acoes/verifica_sessao.php';
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    include_once 'conexao.php';
    $id = $_POST['id'];

    $sql = "SELECT *.comment,*.user FROM comment JOIN user ON cod_user = id_user WHERE cod_post = $id";

    $retorno = $conexao->query($sql);

    while($registro =  retorno->fetch_array()){
    //VARIAVEL QUE RECEBE O NOME DO SOLICITANTE PARA EXIBIR NA TELA
    $nome = $registro['name'];
    $foto = $registro['photo'];
    $data = $registro['date_comment'];
    $comentario = $registro['comment'];

    // DESIGN DO COMENTARIO
    echo "
    <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
        <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
        <span class=\"w3-right w3-opacity\">$data</span>
        <h4>$nome</h4><br>
        <hr class=\"w3-clear\">
        <p>$comentario</p>
    </div>";
    }
?>