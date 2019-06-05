<?php 
 
    session_start();
    include_once '../conexao.php';

    //RECEBE VALORES DO LOGIN E EVITA O SQL INJECTION COM ADDSLASHES
    $user = addslashes($_POST['user']);
    $pass = addslashes($_POST['pass']);
    
    //VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if($pass == "" || $user == ""){
        echo "<script>
                    alert('Preencha todos os campos');
                    document.location.href = './../index.php';
                </script>";
    } else {
        //TRANSFORMA A SENHA DIGITA EM UM MD5
        $pass = md5($pass);
        
        //CRIA UM SQL PRA VER SE O USER EXISTE NO BANCO DE DADOS
        $sql = "SELECT * FROM user WHERE login='$user' and pass='$pass'";
        
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
    
        } else {

            //USUARIO INEXISTENTE, REDIRECIONA PARA A HOME
            echo "<script>
                    alert('Usuário não encontrado');
                    document.location.href = './../index.php';
                </script>";
        }

    }

?>