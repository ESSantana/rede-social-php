<?php 
    session_start();
    include_once '../conexao.php';

    $user = addslashes($_POST['user']);
    $pass = addslashes($_POST['pass']);
    
    if($pass == "" || $user == ""){
        echo "<script>
                    alert('Preencha todos os campos');
                    document.location.href = './../index.php';
                </script>";
    } else {
        $pass = md5($pass);
        
        $sql = "SELECT * FROM user WHERE login='$user' and pass='$pass'";
        
        $retorno = $conexao->query($sql);
    
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
            header("Location:./../painel.php");
    
        } else {
            echo "<script>
                    alert('Usuário não encontrado');
                    document.location.href = './../index.php';
                </script>";
        }

    }

?>