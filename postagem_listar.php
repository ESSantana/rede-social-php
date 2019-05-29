<?php
    session_start();
    include_once 'conexao.php';
    $cod_user = $_SESSION['id_user'];

    $sql = "SELECT * FROM publish WHERE `cod_user`='$cod_user'";

    $retorno = $conexao->query($sql);

    while($resultado = $retorno->fetch_array()){
        $post = $resultado['post'];
        $img = $resultado['img'];
        $data = $resultado['data_post'];
        
        if($img != null){
            $html = "<div class=\"w3-row-padding\" style=\"margin:0 -16px\">
                <div class=\"w3-full\">
                    <img src=\"$img\" style=\"width:80%\" alt=\"postagem\" class=\"w3-margin-bottom\">
                </div>
            </div>";
        }  

        echo "
        <div class=\"w3-container w3-card w3-white w3-round w3-margin\"><br>
            <img src=\"img/profile.png\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\">
            <span class=\"w3-right w3-opacity\">$data</span>
            <h4>John Doe</h4><br>
            <hr class=\"w3-clear\">
            <p>$post</p>
            $html
            <button type=\"button\" class=\"w3-button w3-theme-d1 w3-margin-bottom\"><i class=\"fa fa-thumbs-up\"></i>  Like</button> 
            <button type=\"button\" class=\"w3-button w3-theme-d2 w3-margin-bottom\"><i class=\"fa fa-comment\"></i>  Comment</button> 
        </div>";
    }


?>