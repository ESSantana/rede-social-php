<?php
    session_start();
    include_once './../conexao.php';
    $id_friend = $_SESSION['id_friend'];

    if(isset($_GET['selec'])){
        $selec = $_GET['selec'];
        if($selec == 1){
        $confirma = "UPDATE friendship SET status='1' WHERE id_friend = '$id_friend'";
        $confirm1 = $conexao->query($confirma); 
        if($confirma){
            header("Location:./../painel.php");
        }

        unset($selec,$confirma,$confirm1);

        } else if($selec == 0){
        $nega = "UPDATE friendship SET status='0' WHERE id_friend = '$id_friend'";
            $confirm2 = $conexao->query($nega); 
        if($nega){
            header("Location:./../painel.php");
        }

        unset($selec,$nega,$confirm2);

        }
    }
    

?>