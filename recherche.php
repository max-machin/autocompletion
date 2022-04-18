<?php
require 'traitement/traitement.php';
require 'ressources/header.php';


if(isset($_GET['search'])){

// echo substr($chaine, 0, 45).'...';
$search = new Search();
$result = $search->searchTerm(valid_data($_GET['search']));
$count = $search->countResult(valid_data($_GET['search']));


?>
<main>
    <div>
    <section class="resultSearchSection">
        <article class="resultSearch">
            <?php
            if ($_GET['search'] !== ""){
                ?>
                    <h2><?= $count ?> Résultats pour '<?= valid_data($_GET['search']) ?>'</h2>
                <?php
            } else {
                ?>
                    <h2>Tous les jeux : <?= $count ?></h2>
                <?php
            }
            ?>
            <div class="gridSearch">
                <?php
                    foreach ($result as $jeux){
                        $plateforme = explode(',', $jeux['plateforme']);
                ?>
                <a href="element.php?id=<?= $jeux['id'] ?>">
                <article>
                    <div class="jeux">
                        <img src="images/<?= $jeux['image'] ?>" alt="">
                        <div>
                        <h3><?= $jeux['nom'] ?></h3>
                        <div class="plateforme">
                            <?php 
                                foreach($plateforme as $p){
                                    echo "<p class='desc'>$p<p>";
                                } 
                            ?>
                        </div>
                        <p class="desc"><?= substr($jeux['description'], 0, 240).'...' ?></p>
                        
                        </div>
                        
                    </div>
                    <div class="flex">
                           
                        <p><i class="fas fa-solid fa-money-bill"></i><br><?= $jeux['prix'] ?> €</p>
                        <p><i class="fas fa-solid fa-thumbs-up"></i><br><?= $jeux['avis'] ?> / 10</p>
                        <p><i class="fas fa-solid fa-calendar"></i><br><?= $jeux['date'] ?></p>  
                    </div>
                
                </article>
                </a>
                <?php
                    }
                ?>
            </div>
        </article>
    </section>
    </div>
</main>
    <?php
    require 'ressources/footer.php';
    ?>
</body>

<script src="js/script.js" type="text/javascript"></script>


</html>

<?php

} else {
    header('location: index.php');
}