<?php
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    include_once 'conexao.php';

    //CRIA VARIAVEL COM O CÓDIGO DO USUÁRIO DA SESSÃO PARA PERSONALIZAR AS INFORMAÇÕES DO FEED
    $cod_user = $_SESSION['id_user'];
    
    //CRIA O COMANDO SQL PRA PEGAR O QUE SERÁ POSTADO NA TIME LINE EM ORDEM CRONOLÓGICA
    $sql = "SELECT * FROM publish  WHERE cod_user='$cod_user' UNION SELECT * FROM publish WHERE cod_user IN (SELECT cod_answer FROM 
    friendship WHERE cod_ask='$cod_user' and status='1') UNION SELECT * FROM publish WHERE cod_user IN (SELECT cod_ask FROM 
    friendship WHERE cod_answer='$cod_user' and status='1') order by data_post desc";

    //EXECUTA O COMANDO SQL NA CONEXÃO INICIADA
    $retorno = $conexao->query($sql);

    //EXECUTA UM LOOP ATÉ QUE TODAS AS POSTAGENS SEJAM MOSTRADAS
    while($resultado = $retorno->fetch_array()){

        //RECEBE OS VALORES QUE SERAM EXIBIDOS NA POSTAGEM
        $id_post = $resultado['id_post'];
        $postou = $resultado['cod_user'];
        $post = $resultado['post'];
        $img = $resultado['img'];
        $data = $resultado['data_post'];

        //SQL PRA RECEBER INFORMAÇÕES DE QUEM POSTOU
        $sqlNome = "SELECT name,photo FROM user WHERE id_user='$postou'";

        //EXECUTA O COMANDO SQL NA CONEXÃO INICIADA
        $queryNome = $conexao->query($sqlNome);

        //RECEBE A FOTO E NOME DE QUEM POSTOU O REGISTRO ATUAL DO LOOP
        $resultNome = $queryNome->fetch_array();
        $nome = $resultNome['name'];
        $foto = $resultNome['photo'];

        //CRIA VARIAVEL PARA MOSTRAR IMAGEM CASO TENHA NO REGISTRO
        //CASO CONTRÁRIO É IGNORADO ESSA PARTE
        if($img != null){
            $html = "<div class=\"w3-row-padding\" style=\"margin:0 -16px\">
                <div class=\"w3-full\">
                    <img src=\"$img\" style=\"width:50%; \" alt=\"postagem\" class=\"w3-margin-bottom\">
                </div>
            </div>";
        } 

        if ($postou == $cod_user){
            $excluir = "<a href='acoes/excluir_post.php?id_post=$id_post' class='w3-rigth btn btn-danger btn-sm w3-right w3-margin-left'>x</a>";
        }

        //CRIAÇÃO DE CADA POSTAGEM
        echo "
        <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
            <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
            $excluir
            <span class=\"w3-right w3-opacity\">$data</span>
            <h4><a href='painel_exclu.php?id=$postou' style='text-decoration:none'>$nome</a></h4><br>
            <hr class=\"w3-clear\">
            <p>$post</p>
            $html
            <div class='form-row'>
                <form method='POST' action='acoes/curtir.php' class='mr-2'>
                    <button type=\"submit\" class=\"w3-button w3-theme-d1 w3-margin-bottom w3-hover-red\"><i class=\"fa fa-thumbs-up\"></i>  Like</button> 
                    <input class='sr-only' style='width: 0px; height:0px; border-color:white;' value='$id_post' name='id'>
                </form>
                <form method='POST' action='tela_comentario.php'>
                    <button type=\"submit\" class=\"w3-button w3-theme-d1 w3-margin-bottom w3-hover-red\"><i class=\"fa fa-comment\"></i>  Comment</button> 
                    <input class='sr-only' style='width: 0px; height:0px; border-color:white;' value='$id_post' name='id'>
                </form>
            </div>
        </div>";

        //LIMPANDO A VARIAVEL QUE GERA A IMAGEM E BOTÃO DE EXCLUIR
        unset($html,$excluir);
    }

    

?>