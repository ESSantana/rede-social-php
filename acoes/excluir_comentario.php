<?php
    include 'verifica_sessao.php';
    session_start();
    include_once './../conexao.php';

    $id_cmt = $_GET['id_cmt'];
    
    if($id_cmt == null || $id_cmt == ""){

    } else {
        $delComent = "DELETE FROM comment WHERE id_comment = '{$id_cmt}'";

        $deleta = $conexao->query($delComent);

        if($deleta){
            echo "<script>
                        document.location.href='./../painel.php';
                </script>";
        } else {
            echo "<script>
                        alert('Something went wrong!');
                        document.location.href='./../painel.php';
                </script>";
        }
    }


?>