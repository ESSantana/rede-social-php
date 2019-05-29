<?php
    session_start();
    include_once 'conexao.php';
    $cod_user = $_SESSION['id_user'];

    $sql = "SELECT * FROM publish WHERE cod_user='$cod_user' UNION SELECT * FROM publish WHERE cod_user=(SELECT cod_answer FROM 
    friendship WHERE cod_ask='$cod_user' and status='1') UNION SELECT * FROM publish WHERE cod_user=(SELECT cod_ask FROM 
    friendship WHERE cod_answer='$cod_user' and status='1') order by data_post desc";

    $retorno = $conexao->query($sql);

    while($resultado = $retorno->fetch_array()){
        $postou = $resultado['cod_user'];
        $post = $resultado['post'];
        $img = $resultado['img'];

        $data = $resultado['data_post'];

        $sqlNome = "SELECT `name` FROM user WHERE id_user='$postou'";
        $queryNome = $conexao->query($sqlNome);

        $resultNome = $queryNome->fetch_array();
        $nome = $resultNome['name'];

        if($img != null){
            $html = "<div class=\"w3-row-padding\" style=\"margin:0 -16px\">
                <div class=\"w3-full\">
                    <img src=\"$img\" style=\"width:50%\" alt=\"postagem\" class=\"w3-margin-bottom\">
                </div>
            </div>";
        }  

        echo "
        <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
            <img src=\"img/profile.png\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
            <span class=\"w3-right w3-opacity\">$data</span>
            <h4>$nome</h4><br>
            <hr class=\"w3-clear\">
            <p>$post</p>
            $html
            <button type=\"button\" class=\"w3-button w3-theme-d1 w3-margin-bottom\"><i class=\"fa fa-thumbs-up\"></i>  Like</button> 
            <button type=\"button\" class=\"w3-button w3-theme-d2 w3-margin-bottom\"><i class=\"fa fa-comment\"></i>  Comment</button> 
        </div>";
        $img = null;
    }


?>