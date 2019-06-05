<?php 
  // INICIA O USO DE SESSÕES NA PÁGINA
  session_start();
  include_once 'conexao.php';

  //CRIA VARIAVEL QUE RECEBE O VALOR DO ID DO USUÁRIO DA SESSÃO
  $cod_sessao = $_SESSION['id_user'];

  //CRIA SQL PARA MOSTRAR QUANDO ALGUÉM MANDAR SOLICITAÇÃO
  $sql = "SELECT friendship.id_friend, user.name,user.photo FROM user JOIN friendship
  on user.id_user = friendship.cod_ask WHERE friendship.status='2' and friendship.cod_answer='$cod_sessao'";

  //EXECUTA SQL NA CONEXÃO 
  $retorno = $conexao->query($sql);

  //MOSTRAR SOLICITAÇÃO DE AMIZADE, SÓ UMA POR VEZ
  if($registro = $retorno->fetch_array()){

    //VARIAVEL QUE RECEBE O NOME DO SOLICITANTE PARA EXIBIR NA TELA
    $nome = $registro['name'];
    $foto = $registro['photo'];

    //CRIA SESSÃO COM O ID DA SOLICITAÇÃO PRA SER TRATADA QUANDO FOR RECUSADA OU ACEITA
    $_SESSION['id_friend'] = $registro['id_friend'];

      //MOSTRA A SOLICITAÇÃO
      echo "  <div class=\"w3-col m2\">
                <div class=\"w3-card w3-round w3-white w3-center\">
                  <div class=\"w3-container\">
                    <p>Solicitação de Amizade</p>
                    <img src=\"$foto\" alt=\"Avatar\" style=\"width:50%\"><br>
                    <span>$nome</span>
                    <div class=\"w3-row w3-opacity\">
                      <!-- CASO ACEITE OU RECUSE, DIFERENTES VALORES SÃO PASSADOS POR METODO GET -->
                      <div class=\"w3-half\">
                        <a href=\"acoes/solicitacao_control.php?selec=1\" class=\"w3-button w3-block w3-green w3-section wid\" title=\"Aceitar\"><i class=\"fa fa-check\"></i></a>
                      </div>
                      <div class=\"w3-half\">
                        <a href=\"acoes/solicitacao_control.php?selec=0\" class=\"w3-button w3-block w3-red w3-section wid\" title=\"Negar\"><i class=\"fa fa-remove\"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <br>";
  }
  

?>


