<?php
    include_once 'verifica_sessao.php';
    session_start();
    include_once './../conexao.php';

    $id = $_POST['id'];
    $userAtual = $_SESSION['id_user'];
    
    $sqlVeri = "SELECT * FROM lik WHERE cod_user='{$userAtual}' and cod_post='{$id}'";  
    
    $verifica = $conexao->query($sqlVeri);

    if($verifica->fetch_array()){

        $sqlAtualiza = "DELETE FROM lik WHERE cod_user='{$userAtual}' and cod_post='{$id}'";
        $deleta = $conexao->query($sqlAtualiza);
        
        if($deleta){
            echo " <script>
                        document.location.href ='./../painel.php';
                    </script>";
        } else {
            echo " <script>
                        alert('Erro ao executar ação!');
                        
                    </script>";
        }

    } else {

        $sqlInsere = "INSERT INTO lik (`cod_user`,`cod_post`) VALUES ('{$userAtual}','{$id}')";
        $insere = $conexao->query($sqlInsere);

        if($insere){
            echo " <script>
                        document.location.href ='./../painel.php';
                    </script>";
        } else {
            echo " <script>
                        alert('Erro ao executar ação!');
                        
                    </script>";
        }

    }
?>