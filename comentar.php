<?php
    include_once './acoes/verifica_sessao.php';
    session_start();
    include_once 'conexao.php';

    $id_ses = $_SESSION['id_user'];
    $id = $_POST['id'];
    $comentario = $_POST['coment'];
    $data = date("Y/m/d h:i:s");
    
    $sql = "INSERT INTO comment (cod_user, cod_post,comment,date_comment)
    VALUES ('$id_ses','$id','$comentario','$data')";

    $retorno = $conexao->query($sql);

    if($retorno->fetch_array()){
        echo "<script>
                alert('Comentário publicado');
                document.location.href='tela_comentario.php';
        </script>";
    } else {
        echo "<script>
                alert('Erroooooooooou');
                document.location.href='tela_comentario.php';
        </script>";
    }

?>