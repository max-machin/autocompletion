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
                    <div class="search-result" id="search_result"></div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footerFlex">
            <ul>
                <li><a href="">About</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div>
                <h2>Faciliter votre recherche</h2>
                <p>Trouver un jeux vidéo n'a jamais été aussi simple.</p>
            </div>
        </div>
        <ul class="social">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-git"></i></a></li>
            <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
        </ul>

        <div class="footerEnd">
            <p>Copyright ©2022 G'wame Corporation. Designed By <span>MACHIN MAX</span></p>
        </div>
    </footer>
</body>

<!-- <script src="javascript/jquery-3.6.0.min.js"></script> -->
<script src="js/script.js"></script>

</html>