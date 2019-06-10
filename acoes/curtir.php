<?php
    include_once 'verifica_sessao.php';
    session_start();
    include_once './../conexao.php';

    $id = addslashes($_GET['id']);
    $userAtual = $_SESSION['id_user'];
    
    $sqlVeri = "SELECT * FROM lik WHERE cod_user={$userAtual} and cod_post={$id}";  
    
    $retorno = $conexao->query($sqlVeri);
    
    var_dump($id,$userAtual,$retorno);

    if($retorno->fetch_array()){
        unset($retorno);
        $sqlAtualiza = "DELETE FROM lik WHERE cod_user={$userAtual} and cod_post={$id}";
        $retorno = $conexao->query($sqlAtualiza);
        if($retorno->fetch_array()){
            echo " <script>
                        document.location.href ='./../painel.php';
                    </script>";
        } else {
            echo " <script>
                        alert('Erro ao executar ação!');
                        
                    </script>";
        }
    } else {
        unset($retorno);
        $sqlInsere = "INSERT INTO lik (`cod_user`,`cod_post`) VALUES ({$userAtual},{$id})";

        $retorno = $conexao->query($sqlInsere);

        if($retorno->fetch_array()){
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