<?php
require 'traitement/traitement.php';
require 'ressources/header.php';



if (isset($_GET['id'])){

    $id = valid_data($_GET['id']);
    $element = new Search();
    $jeux = $element->ElementById($id);
    ?>

    <section class="jeuxSection">
        <img src="images/<?= $jeux['image'] ?>" alt="">
        <article class="selfGame">
            <h2><?= $jeux['nom'] ?></h2>
            <div class="flex plateforme">
            <?php
                $plateforme = explode(',', $jeux['plateforme']);
                foreach($plateforme as $console)
                {
                    echo "<p class='desc'>$console</p>";
                }
            ?>
            </div>
            <article>
                <p><?= substr($jeux['description'], 0, 400).'...' ?></p>
            </article>
            <p class='desc'><span>Date de sortie</span> : <?= $jeux['date']?></p>
            <div class="avis-prix">
                <p class='desc'>Prix : <span><?= $jeux['prix'] ?> €</span></p>
                <p class='desc'>Avis : <span><?= $jeux['avis'] ?> / 10</span></p>
            </div>
        </article>
    </section>
    <?php
    require 'ressources/footer.php';


} else {
    header('location: index.php');
}
?>

</body>

<script src="js/script.js" type="text/javascript"></script>

</html>