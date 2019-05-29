<?php
    include_once './../conexao.php';

    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    //Convertendo a senha pra md5
    $pass = md5($pass);
    $dia = $_POST['dia_nasc'];
    $mes = $_POST['mes_nasc'];
    $ano =  $_POST['ano_nasc'];
    $especialidade = $_POST['especialidade'];

    if($name == "" || $user == "" || $pass == "" || $dia == "" || $mes == "" || $ano == "" || $especialidade == ""){
        echo "<script>
                alert('Preencha todos os campos');
                document.location.href = './../index.php';
            </script>";
    } else {
        $sql = "SELECT * FROM user WHERE login='$user'";
        $verificacao = $conexao->query($sql);

        if($verificacao->fetch_array() != null){
            echo "<script>
                    alert('Usuário existente, tente outro');
                    document.location.href = './../index.php';
                </script>";
        } else {
            $sql = "INSERT INTO user (`name`,`login`,`pass`,`dia_nasc`,`mes_nasc`,`ano_nasc`,`especi_hum`) VALUES ('$name','$user','$pass','$dia','$mes','$ano','$especialidade')";
    
            $resultado = $conexao->query($sql);
    
            if($resultado){
                echo "<script>
                    alert('Cadastrado com sucesso');
                    document.location.href = './../index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Erro ao cadastrar');
                    document.location.href = './../index.php';
                </script>";
            }

        }

    }

    

?>