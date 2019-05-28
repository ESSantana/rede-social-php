<div class="w3-card w3-round w3-white">
    <div class="w3-container">
         <h4 class="w3-center"><?php echo $_SESSION['nome']; ?></h4>
         <p class="w3-center"><img src="<?php echo $_SESSION['foto'];?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['especialidade'];?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['local_nasc'];?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['dia'] ." de ". $_SESSION['mes']. " de " .$_SESSION['ano'];?></p>
    </div>
</div>
<br>