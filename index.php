<?php

require_once 'ressources/headerIndex.php';
?>
    <main>
        <section class="headAccueil">
            <div>
               <img src="images/GF'R.png" alt="">
                <h1>'wame</h1> 
            </div>
            <p>Votre moteur de recherche spécialiste en jeux vidéos.</p>
        </section>
        <section class="card-holder">
            <div class="card bg-spring">
                <div class="search-wrap wrap-index">
                    <form action="recherche.php" method="get" class="search-box bg-spring">
                        <button id="submit" class="btn" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <input  name="search" id="search" class="form-control" type="text" placeholder="Rechercher.." autocomplete="off">
                    </form>
                    <div class="search-result">
                        <div id="search_result"></div>
                        <div class="separator" id="separator"></div>
                        <div class="related-search" id="related-search"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require 'ressources/footer.php';
    ?>
</body>
<script src="js/script.js"></script>

</html>