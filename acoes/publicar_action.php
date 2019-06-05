<?php
    include_once 'verifica_sessao.php';
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    include_once './../conexao.php';
    //MUDA O FUSO HORARIO DEFAULT
    date_default_timezone_set("America/Bahia");

    //RECEBE OS VALORES PASSADOS PELO FORM
    $publish = $_POST['publish'];
    $image = $_POST['image'];
    $data = date("Y/m/d h:i:s");
    $owner = $_SESSION['id_user'];
    
    //VERIFICA SE ALGO ESTÁ SENDO PUBLICADO OU O FORM ESTÁ EM BRANCO
    if($publish == ""){
        echo "<script>
                    alert('Preencha o campo de texto da publicação!');
                    document.location.href = './../painel.php';
                </script>";
    } else {
        //CRIA O COMANDO SQL
        $sql = "INSERT INTO publish (post,img,data_post,cod_user) VALUES ('$publish','$image','$data','$owner')";

        //EXECUTA O COMANDO SQL NA CONEXÃO CRIADA
        $resultado = $conexao->query($sql);
        
        //INFORMA SE O POST FOI REALIZADO OU NÃO
        if($resultado){
            echo "<script>
                    alert('Post realizado com sucesso!');
                    document.location.href = './../painel.php';
                </script>";
        } else {
            echo "<script>
                    alert('Erro na postagem!');
                    document.location.href = './../painel.php';
                </script>";
        }

    }
?>