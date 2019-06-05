<?php
    session_start();
    include_once'./../conexao.php';

    $id_post = $_GET['id_post'];

    if($id_post == null || $id_post == ""){
        echo    "<script>
                        alert('ID do post inválido!');
                        documento.location.href='./../painel.php';
                    </script>";
    } else {

        $sql= "DELETE FROM publish WHERE id_post='$id_post'";

        $retorno = $conexao->query($sql);

        if($retorno){
            echo    "<script>
                        alert('Post apagado com sucesso!');
                        document.location.href='./../painel.php';
            </script>";
        }
    }
?>