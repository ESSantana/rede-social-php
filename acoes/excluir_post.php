<?php
include_once 'verifica_sessao.php';
session_start();
    include_once'./../conexao.php';

    $id_post = $_GET['id_post'];

    if($id_post == null || $id_post == ""){
        echo    "<script>
                        alert('ID do post inválido!');
                        documento.location.href='./../painel.php';
                    </script>";
    } else {

        $sql = "DELETE FROM publish WHERE id_post='{$id_post}'";
        $apagaLike = "DELETE FROM lik WHERE cod_post='{$id_post}'";
        $apagaComent = "DELETE FROM comment WHERE cod_post='{$id_post}'";

        $delPost = $conexao->query($sql);
        $delLike = $conexao->query($apagaLike);
        $delCmt =  $conexao->query($apagaComent);
        
        if($delPost && $delLike && $delCmt){
            echo    "<script>
                        alert('Post apagado com sucesso!');
                        document.location.href='./../painel.php';
            </script>";
        }
    }
?>