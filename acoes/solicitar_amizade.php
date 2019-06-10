<?php
    include_once 'verifica_sessao.php';
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
        $verificacao1 = "SELECT * FROM friendship WHERE (cod_ask ='$id' or cod_answer='$id') 
        and (cod_answer='$atual' or cod_ask='$atual') and status='1'";
        
        $amigos = $conexao->query($verificacao1);
        
        if($amigos->fetch_array()){
            echo "<script> 
                alert('Vocês já são amigos!');
                document.location.href='./../painel.php';
            </script>";
        } else {
            $verificacao2 = "SELECT * FROM friendship WHERE (cod_ask ='$id' or cod_answer='$id') 
            and (cod_answer='$atual' or cod_ask='$atual') and status='2'";
            
            $solicitado = $conexao->query($verificacao2);

            if($solicitado->fetch_array()){

                $delSoli = "DELETE FROM friendship WHERE (cod_ask ='$id' or cod_answer='$id') 
                and (cod_answer='$atual' or cod_ask='$atual') and status='2'"; 
                $cancelar = $conexao->query($delSoli);  
                
                if($cancelar){
                    echo "<script> 
                        alert('Solicitação de amizade cancelada!');
                        document.location.href='./../painel.php';
                    </script>";
                }

            } else {

                $sql = "INSERT INTO friendship (cod_ask,cod_answer,status) VALUES ($atual,$id,'2')";
                $pedido = $conexao->query($sql);

                if($pedido){
                    echo "<script> 
                        alert('Solicitação enviada com sucesso!');
                        document.location.href='./../painel.php';
                    </script>";
                }
            }
        }
    }
?>