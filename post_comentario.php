<?php
include_once 'acoes/verifica_sessao.php';
include_once 'conexao.php';

$sql = "SELECT * FROM publish WHERE id_post ='{$id}'";

$retorno = $conexao->query($sql);

if($resultado = $retorno->fetch_array()){

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

    //CRIAÇÃO DE CADA POSTAGEM
    echo "
    <div class=\"w3-container w3-card w3-white w3-round w3-margin mt-0\"><br>
        <img src=\"$foto\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
        <span class=\"w3-right w3-opacity\">$data</span>
        <h4><a href='painel_exclu.php?id=$postou' style='text-decoration:none'>$nome</a></h4><br>
        <hr class=\"w3-clear\">
        <p>$post</p>
        $html
        
    </div>";

    //LIMPANDO A VARIAVEL QUE GERA A IMAGEM E BOTÃO DE EXCLUIR
    unset($html);

}
?>