<?php
    include_once './acoes/verifica_sessao.php';
    include_once 'topo.php'; 
?>

<!-- Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
    <!-- Grid -->
    <div class="w3-row">
        <!-- Coluna da Foto -->
        <div class="w3-col m3">
            <!-- foto -->
            <div class="w3-row">
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-margin-bottom">
                        <p><h4 class="w3-center">Perfil</h4></p>
                        <p class="w3-center"><img src="<?php echo $_SESSION['foto'];?>" class="w3-circle" style="height:100%; width:100%; max-height: 204px; max-width: 204px" alt="Avatar"></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Coluna da Direita -->
        <div class="w3-col m9" style="padding-left: 10px; padding-right: 10px">
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <p><h4 class="w3-center">Editar perfil</h4></p>
                    <form method="POST" action='acoes/editar_user.php' class="form-perfil">
                        <!-- Informações do usuario -->
                        <div class="form-group">
                            <i class="fa fa-address-card fa-fw w3-margin-top w3-margin-right w3-text-theme"></i>
                            <label>Nome</label>
                            <input type="text" name="nome" id="name_profile" class="form-control" value="<?php echo $_SESSION['nome']; ?> "required>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-address-card fa-fw w3-margin-top w3-margin-right w3-text-theme"></i>
                            <label>Foto</label>
                            <input type="text" name="foto" id="foto_profile" class="form-control" value="<?php echo $_SESSION['foto']; ?> "required>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>
                            <label>Especialidade</label>
                            <input type="text" name="especialidade" id="especialidade_profile" class="form-control" value="<?php echo $_SESSION['especialidade'];?> " required>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>
                            <label>Endereço</label>
                            <input type="text" name="local" id="endereco_profile" class="form-control" value="<?php echo $_SESSION['local_nasc'];?> " required>
                        </div>
                        <label><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>Data de nascimento</label>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <select class="form-control" name="dia" required>
                                    <?php
                                        for($x=1;$x<=31;$x++){
                                            echo "<option value='$x'>$x</option>";
                                        }
                                    
                                    ?>
                                </select>       
                            </div>  
                            <div class="form-group col-md-4">
                                <select class="form-control" name="mes" required>
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outubro">Outubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" name="ano" required>
                                    <?php
                                        for($x=2019;$x>=1900;$x--){
                                            echo "<option value='$x'>$x</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm w3-theme w3-margin-top w3-margin-bottom mb-5" style="font-size:20px">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    <!-- End Grid -->
    </div>
<!-- End Page Container -->
</div>

<?php
    include_once 'rodape.php'; 
?>