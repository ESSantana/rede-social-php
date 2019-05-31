<?php
    include_once './../conexao.php';

    //RECEBE OS VALORES DIGITADOS NO CADASTRO
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    //TRANSFORMA A SENHA DIGITADA EM MD5
    $pass = md5($pass);
    $dia = $_POST['dia_nasc'];
    $mes = $_POST['mes_nasc'];
    $ano =  $_POST['ano_nasc'];
    $especialidade = $_POST['especialidade'];

    //VERIFICA SE TODOS OS DADOS FORAM DIGITADOS
    if($name == "" || $user == "" || $pass == "" || $dia == "" || $mes == "" || $ano == "" || $especialidade == ""){
        //NÃO CADASTRA CASO FALTE ALGUM DADO
        echo "<script>
                alert('Preencha todos os campos');
                document.location.href = './../index.php';
            </script>";
    } else {
        //VERIFICA SE EXISTE ALGUM USER COM O MESMO LOGIN
        $sql = "SELECT * FROM user WHERE login='$user'";
        $verificacao = $conexao->query($sql);
        
        //SE EXISTIR, O USER É INFORMADO E NÃO CADASTRA
        if($verificacao->fetch_array() != null){
            echo "<script>
                    alert('Usuário existente, tente outro');
                    document.location.href = './../index.php';
                </script>";
        } else {
            //CASO NÃO EXISTA, O SQL DE CRIAÇÃO DE USER É GERADO
            $sql = "INSERT INTO user (`name`,`login`,`pass`,`photo`,`dia_nasc`,`mes_nasc`,`ano_nasc`,`especi_hum`) 
            VALUES ('$name','$user','$pass','img/profile.png','$dia','$mes','$ano','$especialidade')";
    
            //O SQL É EXECUTADO NA CONEXÃO INICIADA
            $resultado = $conexao->query($sql);
    
            //SE TUDO ESTIVER CERTO, INFORMA QUE FOI CADASTRADO E MANTEM NA HOME
            if($resultado){
                echo "<script>
                    alert('Cadastrado com sucesso');
                    document.location.href = './../index.php';
                </script>";
            } else {
                //CASO ALGO ESTEJA ERRADO, É INFORMADO QUE O CADASTRO NÃO FOI FEITO
                echo "<script>
                    alert('Erro ao cadastrar');
                    document.location.href = './../index.php';
                </script>";
            }

        }

    }

    

?>