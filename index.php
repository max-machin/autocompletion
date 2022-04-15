<?php


if (isset($_GET['submit'])){
    if(!empty($_GET['search'])){
        unset($_GET['submit']);
    }
}

require_once 'ressources/header.php';
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
                        <input  name="search" id="search" class="form-control" type="text" placeholder="Rechercher.." autocomplete="off"><br>
                    </form>
                    <span id="search_result"></span>
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
</html>