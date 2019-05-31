<?php
    session_start();
    include_once './../conexao.php';

    $_SESSION['noti'] = false;

    // $sql = "SELECT * FROM publish  WHERE cod_user='$cod_user' UNION SELECT * FROM publish WHERE cod_user IN (SELECT cod_answer FROM 
    // friendship WHERE cod_ask='$cod_user' and status='1') UNION SELECT * FROM publish WHERE cod_user IN (SELECT cod_ask FROM 
    // friendship WHERE cod_answer='$cod_user' and status='1') order by data_post desc";

    // $retorno = $conexao->query($sql);

    // while($resultado = $retorno->fetch_array()){


    }

?>