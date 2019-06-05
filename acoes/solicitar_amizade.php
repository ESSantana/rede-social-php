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
        $verificacao = "SELECT * FROM friendship WHERE (cod_ask ='$id' or cod_answer='$id') 
        and (cod_answer='$atual' or cod_ask='$atual') and status='1'";
        
        $teste = $conexao->query($verificacao);
        
        if($teste->fetch_array()){
            echo "<script> 
                alert('Vocês já são amigos!');
                document.location.href='./../painel.php';
            </script>";
        } else {
            $verificacao2 = "SELECT * FROM friendship WHERE (cod_ask ='$id' or cod_answer='$id') 
            and (cod_answer='$atual' or cod_ask='$atual') and status='2'";
            
            $teste2 = $conexao->query($verificacao2);
            if($teste2->fetch_array()){
                echo "<script> 
                    alert('Você já enviou uma solicitação!');
                    document.location.href='./../painel.php';
                    </script>";                      
            } else {
                $sql2 = "INSERT INTO friendship (cod_ask,cod_answer,status) VALUES ($atual,$id,'2')";
                $retorno = $conexao->query($sql2);
                if($retorno){
                    echo "<script> 
                        alert('Solicitação enviada com sucesso!');
                        document.location.href='./../painel.php';
                    </script>";
                }
            }
        }
    }
?>