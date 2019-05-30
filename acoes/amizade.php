<?php 
    session_start();
    include_once './../conexao.php';

    $selec = $_GET['selec'];
    $id_friend = $_SESSION['ami'];

    if($selec == 1){
        $sql = "UPDATE friendship SET status='1' WHERE id_friend = '$id_friend'";
    } else if ($selec == 0){
        $sql = "UPDATE friendship SET status='0' WHERE id_friend = '$id_friend'";
    }

?>