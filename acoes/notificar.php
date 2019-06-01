<?php
    session_start();
    error_reporting(1);
    $conexao = include('../conexao.php');

    //CRIA VARIAVEL COM O CÓDIGO DO USUÁRIO DA SESSÃO PARA PERSONALIZAR AS INFORMAÇÕES DO FEED
    $sess = $_SESSION['id_user'];

    $_SESSION['noti'] = false;
    $contador = 0;

    $sql = "SELECT * FROM user JOIN friendship
    on user.id_user = friendship.cod_ask WHERE friendship.status='2' and friendship.cod_answer=$sess";
    
    $retorno = $conexao->query($sql);
   

    // while($resultado = $retorno->fetch_array()){
    //     $contador +=1;
    //     if($contador=>2){
    //         $_SESSION['noti'] = true;
    //         break;
    //     } else {
    //         $_SESSION['noti'] = false;
    //     }
    // }

?>