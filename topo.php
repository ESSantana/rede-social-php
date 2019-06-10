<?php 
    include_once 'acoes/verifica_sessao.php';
    // INICIA O USO DE SESSÕES NA PÁGINA
    session_start();
    
    error_reporting(1); 
    // VARIAVEL USADA PRA MUDAR A COR DO SINO CASO TENHA MAIS DE UMA SOLICITAÇÃO
    $not = $_SESSION['noti'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Comedians</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-deep-orange.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/script.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body class="w3-theme-l5">
        <!-- Navbar -->
        <div class="w3-top topnav">
            <div class="w3-bar w3-theme w3-left-align w3-large">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-large w3-theme w3-hover-theme" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="painel.php" style="text-decoration: none" class=" w3-bar-item w3-button w3-padding-large  w3-hover-white w3-theme-d2"><i class="fa fa-home w3-margin-right"></i>Comedians</a>
                <a href="perfil_usuario.php?id=<?php echo $_SESSION['id_user']; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Meu Perfil"><img src="<?php echo $_SESSION['foto']?>" class="w3-circle" style="height:23px;width:23px" alt="Avatar"></a>
                <!-- FAZ LOGOUT DA SESSÃO -->
                <a href="./acoes/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <!-- FORMULARIO DE PESQUISA DE USUÁRIOS -->
                <div class="search-container w3-hide-small">
                    <form method="POST" action="tela_perfil_pesquisado.php">
                        <input type="text" placeholder="Procurar amigo..." name="amigo">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- APARECE QUANDO A TELA DIMINUI, EM DISPOSITIVOS MENORES -->
        <div id="navDemo" class="w3-bar-block w3-theme-l1 w3-hide w3-hide-large w3-hide-medium w3-large w3-fixed">
            <!-- <a href="#" class="w3-bar-item w3-button w3-padding-large">Easter Egg</a> -->
            <!-- FORMULARIO DE PESQUISA DE USUÁRIOS -->
            <form method="POST" action="tela_perfil_pesquisado.php">
                <input type="text" placeholder="Procurar amigo..." name="amigo">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <a href="perfil_usuario.php" style="text-decoration: none" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Meu Perfil</a>
            <a href="./acoes/logout.php" style="text-decoration: none" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Sair</a>
        </div>
