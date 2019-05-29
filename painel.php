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
    
    <!-- Middle Column -->
    <div class="w3-col m7">
      <?php 
        include_once 'publicar.php';
        include_once 'postagem_listar.php'; 
      ?>
      
    <!-- End Middle Column -->
    </div>
      <?php 
        include_once 'eventos.php';
        include_once 'solicitacao.php'; 
      ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
<?php 
  include_once 'rodape.php';
?>