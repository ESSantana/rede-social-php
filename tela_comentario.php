<?php
    include_once './acoes/verifica_sessao.php';
    include_once 'topo.php'; 
?>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
    <?php
      
      include_once 'perfil_resumo.php';
      include_once 'menu_lateral.php' ;
    ?>
    <!-- End Left Column -->
    </div>
    <div class="w3-col m7">
        <!-- INSERIR AQUI O POST A SER COMENTADO -->
        <div class="w3-row-padding publisharea">
            <div class="w3-col m12">
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding coment-container">
                        <!-- PRECISA DE UMA AÇÃO PRA PUBLICAR O COMENTÁRIO -->
                        <form method="POST" action="#">
                            <!-- AREA DO COMENTARIO -->
                            <textarea class="w3-border w3-padding" type="text" placeholder="Comente neste post" name="publish" rows="2" required></textarea>
                            <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Publicar</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'comentario_listar.php' ?>
    </div>
</div>


<?php
    include_once 'rodape.php'; 
?>