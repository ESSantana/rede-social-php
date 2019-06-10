<?php
    include_once 'verifica_sessao.php';
    
    session_start();
    include_once './../conexao.php';
    
    //MUDA O FUSO HORARIO DEFAULT
    date_default_timezone_set("America/Bahia");

    $id_ses = $_SESSION['id_user'];
    $id = $_POST['id'];
    $comentario = $_POST['coment'];
    $data = date("Y/m/d h:i:s");
    
    $sql = "INSERT INTO comment (cod_user, cod_post, comment,date_comment)
    VALUES ('$id_ses','$id','$comentario','$data')";

    $retorno = $conexao->query($sql);

        if($retorno){
            echo "<script>
                    alert('Comentário publicado');
                    document.location.href='./../painel.php';
            </script>";
        } else {
            echo "<script>
                    alert('$retorno->error');
                    document.location.href='./../painel.php';
            </script>";
        }


?>