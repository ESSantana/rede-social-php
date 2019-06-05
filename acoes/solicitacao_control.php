<?php
    // INICIA O USO DE SESSÕES DO NO ARQUIVO
    session_start();
    include_once './../conexao.php';

    //CRIA VARIAVEL QUE RECEBE O VALOR DA SESSÃO COM O ID DA AMIZADE PARA CONFIRMAR OU NEGAR O PEDIDO
    $id_friend = $_SESSION['id_friend'];

    //SE O BOTÃO FOR CLICADO, TANTO NEGAR OU ACEITAR ELE EXECUTA O QUE VEM DEPOIS
    if(isset($_GET['selec'])){

        //RECEBE O VALOR DA OPÇÃO PELA URL
        $selec = $_GET['selec'];

        //SE FOR 1, EXECUTA A THREAD DE ACEITAR A AMIZADE E MUDA O VALOR NO BANCO DE DADOS
        if($selec == 1){
            //CRIA SQL E EXECUTA NA CONEXÃO PARA ALTERAR A AMIZADE PARA 'AMIGOS'
            $confirma = "UPDATE friendship SET status='1' WHERE id_friend = '$id_friend'";
            $confirm1 = $conexao->query($confirma); 
            if($confirma){
                //INFORMA QUE A AMIZADE FOI INICIADA E REDIRECIONA PRO PAINEL
                echo "  <script>
                            document.location.href ='./../painel.php';
                            alert('Agora vocês são amigos e podem as postagens um do outro!');
                        </script>";
            }
            //LIMPA AS VARIAVEIS USADAS
            unset($selec,$confirma,$confirm1);

        //SE FOR 2, EXECUTA A THREAD DE NEGAR A AMIZADE E MUDA O VALOR NO BANCO DE DADOS
        } else if($selec == 0){
            //CRIA SQL E EXECUTA NA CONEXÃO PARA ALTERAR A AMIZADE PARA 'AMIZADE NEGADA'
            $nega = "DELETE FROM friendship WHERE id_friend = '$id_friend'";
            $confirm2 = $conexao->query($nega); 
            if($nega){
                //REDIRECIONA PRO PAINEL
                header("Location:./../painel.php");
            }
            //LIMPA AS VARIAVEIS USADAS
            unset($selec,$nega,$confirm2);

        }
    }
    

?>