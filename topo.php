<?php 
    session_start();
    error_reporting(1); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Comedians</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/script.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="w3-theme-l5">
        <!-- Navbar -->
        <div class="w3-top topnav">
            <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-yellow">3</span></button>     
                    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                    <a href="#" class="w3-bar-item w3-button">Solicitação de amizade</a>
                    <a href="#" class="w3-bar-item w3-button">Curtidas no seu post</a>
                    </div>
                </div>
                <a href="./acoes/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
                    <img src="img/profile.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
                </a>
                <!-- Search form -->
                <div class="search-container">
                    <form method="GET">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
          <a href="#" class="w3-bar-item w3-button w3-padding-large">Account Settings</a>
          <a href="#" class="w3-bar-item w3-button w3-padding-large">Messages</a>
          <a href="#" class="w3-bar-item w3-button w3-padding-large">Solicitações</a>
          <a href="#" class="w3-bar-item w3-button w3-padding-large">Curtidas</a>
          <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
        </div>
