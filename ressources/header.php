<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Red+Hat+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <title>Autocompletion</title>
</head>
<body>
    <nav class="top-nav top-nav-header">
        <a href="index.php"><label class="logo">
            G'wame
        </label>
        </a>
        <div class="search-wrap bg-spring">
                <form action="recherche.php" method="get" class="search-box">
                    <button id="submit" class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <input  name="search" id="search" class="form-control" type="text" placeholder="Rechercher.." autocomplete="off">
                </form> 
                <div class="search-result result-header">
                    <div id="search_result"></div>
                    <div class="separator" id="separator"></div>
                    <div class="related-search" id="related-search"></div>
                </div>
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a class="nav-hover" id="01" href="index.php">Accueil</a></li>
            <li><a class="nav-hover" id="01" href="">2022</a></li>
            <li><a class="nav-hover" id="02" href="">Catégories</a></li>
            <li><a href="recherche.php?search=">Tous les Jeux</a></li>
        </ul>
    </nav>
    
    