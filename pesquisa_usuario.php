<?php
    session_start();
    error_reporting(1);
    include_once 'conexao.php';
    $nome = $_POST['amigo'];

    $sql = "SELECT * FROM user WHERE name LIKE '$nome%'";

    $retorno = $conexao->query($sql);

    while($resultado = $retorno->fetch_array()){
        if($resultado['id_user'] != $_SESSION['id_user']){

            $id = $resultado['id_user'];
            $nome = $resultado['name'];
            $foto = $resultado['photo'];
            $especialidade = $resultado['especi_hum'];
            $local = $resultado['local_nasc'];
            $dia = $resultado['dia_nasc'];
            $mes = $resultado['mes_nasc'];
            $ano = $resultado['ano_nasc'];
    
            echo "
            <div class='w3-row-padding mb-3'>
                <div class='w3-col m12'>
                    <div class='w3-card w3-round w3-white'>
                        <div class='w3-container w3-padding'>
                            <!-- Informações do perfil pesquisado -->
                                <div class='w3-col m3'>
                                    <p class='w3-center w3-margin-top'><img src='$foto' class='w3-circle' style='height: 90%; width: 90% ;max-height:106px; max-width:106px' alt='Avatar'></p>
                                </div>
                                <div class='w3-col m9'>
                                    <h5 class='w3-margin-left'>$nome</h5>
                                    <!-- COLOQUEI AS INFORMÇÕES DO PRÓPRIO PERFIL PRA DAR UMA OLHADA EM COMO VAI FICAR QUANDO TERMINAR -->
                                    <!-- AINDA FALTA ARRANJAR UM JEITO DO TEXTO NÃO QUEBRAR NO MODO RESPONSIVO -->
                                    <i class='fa fa-pencil fa-fw w3-margin-left w3-text-theme'></i>$especialidade
                                    <i class='fa fa-home fa-fw w3-margin-left w3-text-theme'></i>$local
                                    <i class='fa fa-birthday-cake fa-fw w3-margin-left w3-text-theme'></i>$dia de $mes de $ano
                                </div>
                                <div>
                                    <a href='acoes/solicitar_amizade.php?id=$id' class='w3-button w3-theme w3-section w3-margin-left w3-hover-red' title='Pedido de Amizade'><i class='fa fa-send'></i> Enviar Solicitação</a>
                                </div>
                    </div>
                    </div>
                </div>
            </div>";
        }
    }


?>

