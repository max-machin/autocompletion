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


$search = htmlspecialchars(trim($_POST['search'])); 
   


$query = $bdd -> prepare('SELECT nom,id FROM jeux WHERE nom LIKE :term ORDER BY avis DESC LIMIT 3');
    $query->execute([
        "term" => '%'.$search.'%'
    ]);

    $i = 0;
    $gameJSON = array();
    $result = $query->fetchAll();
    // while ($result = $query->fetch(PDO::FETCH_ASSOC))
    // {
    //     $tab[$i][] = $result;
    //     $i++;
    // }

    echo json_encode($result);
?>