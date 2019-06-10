<?php
    session_start();
    include_once 'conexao.php';
    
    $id = $_GET['id'];

    if($id != null && $id != ""){

        $sql = "SELECT * FROM publish WHERE cod_user='$id'";

        $retorno = $conexao->query($sql);

        while($resultado = $retorno->fetch_array()){

            //RECEBE OS VALORES QUE SERAM EXIBIDOS NA POSTAGEM
            $postou = $resultado['cod_user'];
            $id_post = $resultado['id_post'];
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

            $qtdLike = "SELECT * FROM lik WHERE cod_post='{$id_post}'";

            $likeResult = $conexao->query($qtdLike);

            $num = 0;
            while($qtd = $likeResult->fetch_array()){
                $num +=1;
            }

            //CRIA VARIAVEL PARA MOSTRAR IMAGEM CASO TENHA NO REGISTRO
            //CASO CONTRÁRIO É IGNORADO ESSA PARTE
            if($img != null){
                $html = "<div class=\"w3-row-padding\" style=\"margin:0 -16px\">
                    <div class=\"w3-full\">
                        <img src=\"$img\" style=\"width:50%; \" alt=\"postagem\" class=\"w3-margin-bottom\">
                    </div>
                </div>";
            } 

            if ($postou == $id){
                $excluir = "<a href='acoes/excluir_post.php?id_post=$id_post' class='w3-rigth btn btn-danger btn-sm w3-right w3-margin-left'>x</a>";
            }

            //CRIAÇÃO DE CADA POSTAGEM
            echo "
            <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
                <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
                $excluir
                <span class=\"w3-right w3-opacity\">$data</span>
                <h4><a href='painel.php?id=$postou' style='text-decoration:none'>$nome</a></h4><br>
                <hr class=\"w3-clear\">
                <p>$post</p>
                $html
                <div class='form-row'>
                    <form method='POST' action='acoes/curtir.php' class='mr-2'>
                        <button type=\"submit\" class=\"w3-button w3-theme-d1 w3-hover-red w3-margin-bottom\"><i class=\"fa fa-thumbs-up\"></i>  $num  Like</button> 
                        <input class='sr-only' style='width: 0px; height:0px; border-color:white;' value='$id_post' name='id'>
                    </form>
                    <form method='POST' action='./../tela_comentario.php'>
                        <button type=\"submit\" class=\"w3-button w3-theme-d1 w3-hover-red w3-margin-bottom\"><i class=\"fa fa-comment\"></i>  Comment</button> 
                        <input class='sr-only' style='width: 0px; height:0px; border-color:white;' value='$id_post' name='id'>
                    </form>
                </div>
            </div>";

            //LIMPANDO A VARIAVEL QUE GERA A IMAGEM
            unset($html,$excluir);
            }
    }

?>