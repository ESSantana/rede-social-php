<?php
    session_start();
    include_once './../conexao.php';
    error_reporting(1);

    $id = $_GET['id'];
    $atual = $_SESSION['id_user'];

    if($id == null || $id =="" ){
        echo "<script> 
                alert('ID de usuário inválido!');
                document.location.href='./../painel.php';
        </script>";
    } else { 
        $sql = "DELETE FROM friendship WHERE (cod_ask='$id' or cod_answer='$id')
        and (cod_ask='$atual' or cod_answer='$atual')";

        $retorno = $conexao->query($sql);
        if($retorno){
            echo "<script> 
                alert('Amizade desfeita!');
                document.location.href='./../painel.php';
            </script>";
        }
    }
?>