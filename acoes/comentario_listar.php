<?php
    include_once 'verifica_sessao.php';
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    include_once 'conexao.php';

    $userAtual = $_SESSION['id_user'];

    $sql = "SELECT u.id_user, u.name, u.photo, c.id_comment, c.date_comment, c.comment FROM comment as c
    JOIN user as u ON c.cod_user = u.id_user WHERE c.cod_post = '{$id}' ORDER BY c.date_comment DESC";

    $retorno = $conexao->query($sql);

    echo "<div class='mb-5'>";
        while($registro = $retorno->fetch_array()){
            //VARIAVEL QUE RECEBE O NOME DO SOLICITANTE PARA EXIBIR NA TELA
            $id_cmt = $registro['id_comment'];
            $id_user = $registro['id_user'];
            $nome = $registro['name'];
            $foto = $registro['photo'];
            $data = $registro['date_comment'];
            $comentario = $registro['comment'];

            if($id_user == $userAtual){
                $excluir = "<a href='acoes/excluir_comentario.php?id_cmt=$id_cmt' class='w3-rigth btn btn-danger btn-sm w3-right w3-margin-left ml-1'>x</a>";
            }
            
            // DESIGN DO COMENTARIO
            echo "
            <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
                <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
                $excluir
                <span class=\"w3-right w3-opacity\">$data</span>
                <h4>$nome</h4><br>
                <hr class=\"w3-clear\">
                <p>$comentario</p>
            </div>";
        }
    echo "</div>";
?>