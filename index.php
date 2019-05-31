<!DOCTYPE html>
<html lang="en">
	<head>

	<title>Bem vindo ao Comedians</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

	</head>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Sua rede social bem humorada</h2>
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="POST" action="./acoes/cadastrar_user.php">
						<fieldset>							
							<p class="text-uppercase pull-center">Cadastre-se</p>	
 							<div class="form-group">
								<input type="text" name="user" id="user" class="form-control input-lg" placeholder="Usuário" required>
							</div>

							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nome" required>
							</div>
							<div class="form-group">
								<input type="password" name="pass" id="pass" class="form-control input-lg" placeholder="Senha" required> 
							</div>
								<div class="form-group">
								<input type="text" name="especialidade" id="especialidade" class="form-control input-lg" placeholder="Qual sua especialidade no humor?" required>
							</div>
							<label >Data de nascimento</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="dia_nasc" required>
                                        <?php
                                            for($x=1;$x<=31;$x++){
                                                echo "<option value='$x'>$x</option>";
                                            }
                                        
                                        ?>
                                    </select>       
                                </div>  
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="mes_nasc" required>
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
                                    <select class="form-control" name="ano_nasc" required>
                                        <?php
                                            for($x=2019;$x>=1900;$x--){
                                                echo "<option value='$x'>$x</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            
                            </div>

 							<div>
 									  <input type="submit" class="btn btn-md btn-primary" value="Registrar">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form role="form" method="POST" action="./acoes/login.php">
						<fieldset>							
							<p class="text-uppercase"> Faça login usando seu usuário </p>	
 								
							<div class="form-group">
								<input type="text" name="user" id="user" class="form-control input-lg" placeholder="Usuário" required>
							</div>
							<div class="form-group">
								<input type="password" name="pass" id="pass" class="form-control input-lg" placeholder="Senha" required>
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Entrar">
							</div>
								 
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
		<p class="text-center">
			<small id="passwordHelpInline" class="text-muted"> Criado para a matéria de Desenvolvimento Web, Universidade Salvador, 2019. <a href="https://github.com/EmersonSantana299" target="_blank">Emerson Santana</a> e <a href="https://github.com/Lv255" target="_blank">Luis Vitor</a></a></small>
		</p>
	</div>
	</body>
	 

</html>