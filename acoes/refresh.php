<?php 
    include_once 'verifica_sessao.php';
    session_start();
    include_once '../conexao.php';
    $id = $_SESSION['id_user'];
        

        $sql = "SELECT * FROM user WHERE id_user='$id'";
        
        //EXECUTA O COMANDO NA CONEXÃO
        $retorno = $conexao->query($sql);
    
        //SE EXISTIR O USUÁRIO NO BANCO DADOS, CRIA SESSÕES COM AS INFO
        //E ATIVA A FLAG 'SESSAO' PRA INFORMAR QUE O USER ESTÁ LOGADO
        if($resultado = $retorno->fetch_array()){
            $_SESSION['sessao'] = true;
            $_SESSION['id_user'] = $resultado['id_user'];
            $_SESSION['nome'] = $resultado['name'];
            $_SESSION['foto'] = $resultado['photo'];
            $_SESSION['dia'] = $resultado['dia_nasc'];
            $_SESSION['mes'] = $resultado['mes_nasc'];
            $_SESSION['ano'] = $resultado['ano_nasc'];
            $_SESSION['local_nasc'] = $resultado['local_nasc'];
            $_SESSION['especialidade'] = $resultado['especi_hum'];
    
            if($_SESSION['foto'] == ""){
                $_SESSION['foto'] = "img/profile.png";
            }
            //USUARIO EXISTENTE, REDIRECIONA PARA O PAINEL
            header("Location:./../painel.php");
    
        } 
?>