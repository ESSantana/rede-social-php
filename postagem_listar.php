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

        //CRIAÇÃO DE CADA POSTAGEM
        echo "
        <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
            <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
            <span class=\"w3-right w3-opacity\">$data</span>
            <h4>$nome</h4><br>
            <hr class=\"w3-clear\">
            <p>$post</p>
            $html
            <button type=\"button\" class=\"w3-button w3-theme-d1 w3-margin-bottom\"><i class=\"fa fa-thumbs-up\"></i>  Like</button> 
            <button type=\"button\" class=\"w3-button w3-theme-d2 w3-margin-bottom\"><i class=\"fa fa-comment\"></i>  Comment</button> 
        </div>";

        //LIMPANDO A VARIAVEL QUE GERA A IMAGEM
        unset($html);
    }

    

?>