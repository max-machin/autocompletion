<?php
try 
{
    //@var $bdd contient la connexion à la bdd 
    $bdd = new PDO ('mysql:host=localhost; dbname=autocompletion;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
//Capture des exceptions et affichage de ses derniéres.
catch (PDOException $e)
{
    die("Erreur !: " . $e->getMessage() . "<br/>");
    
}

// Sécurisation des valeurs entré dans l'input
$search = htmlspecialchars(trim($_POST['search'])); 
   

// Requête de récupération des jeux contenant la recherche de l'utilisateur dans le nom
$query = $bdd -> prepare('SELECT nom,id FROM jeux WHERE nom LIKE :term ORDER BY RAND() LIMIT 4');
    $query->execute([
        "term" => '%'.$search.'%'
    ]);

    $result = $query->fetchAll();
   
    // encodage en JSON pour fetch
    echo json_encode($result);
?>