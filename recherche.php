<?php
require 'ressources/database.php';
require 'traitement/traitement.php';
// echo substr($chaine, 0, 45).'...';
$search = new Search();
$result = $search->searchTerm($_GET['search']);

$count = $search->countResult($_GET['search']);



require 'ressources/header.php';

?>

<section class="resultSearchSection">
    <article class="resultSearch">
        <h2><?= $count ?> Résultats pour '<?= $_GET['search'] ?>'</h2>

        <div class="gridSearch">
            <?php
            foreach ($result as $jeux){
                $plateforme = explode(',', $jeux['plateforme']);
                ?>
            <div class="jeux">
                <h3><?= $jeux['nom'] ?></h3>
                <p><?= substr($jeux['description'], 0, 240).'...' ?></p>
                <div class="flex">
                    <p>
                    <?php foreach($plateforme as $p){
                            echo $p;
                        } ?>
                    </p>
                    <p><?= $jeux['prix'] ?>€</p>
                    <p><?= $jeux['avis'] ?> / 10</p>
                    <p><?= $jeux['date'] ?></p>  
                </div>
                
            </div>
                <?php
            }
            ?>
        </div>
    </article>
</section>