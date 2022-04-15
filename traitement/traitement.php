<?php


class search extends Database
{
    protected $bdd;

    public function __construct(){
        $this->bdd = parent::__construct();
    }

    /**
     * Function de recherche "précise" avec ce que tape exactement l'user;
     *
     * @param [type] $term
     * @return void
     */
    public function searchTerm($term){
        if($_GET['search'] != ''){
            $search = htmlspecialchars($_GET['search']);
            $searchTerm = "$search%";
            $select = "SELECT * FROM jeux WHERE nom LIKE :term ORDER BY avis DESC";
            $find = $this->bdd->prepare($select);
            $find->bindParam(':term' , $searchTerm, PDO::PARAM_STR);
            $find->execute();
            $data = $find->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            
        } else {
            header('location: index.php');
        }
    }

    /**
     * Function de recherche "relative" qui 'contient' ce qu'a rentré l'user;
     *
     * @param [type] $term
     * @return void
     */
    public function searchRelativeTerm($term){
        if($_GET['search'] != ''){
            if (strlen($_GET['search']) >= 3){
                $search = $_GET['search'];
                $searchTerm = "%$search%";
                $select = "SELECT DISTINCT id,nom,description FROM jeux WHERE nom LIKE :term";
                $find = $this->bdd->prepare($select);
                $find->bindParam(':term' , $searchTerm, PDO::PARAM_STR);
                $find->execute();
                $data = $find->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        } else {
            header('location: index.php');
        }
    }

    public function countResult($term){
        if($_GET['search'] != ''){
            $search = $_GET['search'];
            $searchTerm = "$search%";
            $select = "SELECT DISTINCT id,nom,description FROM jeux WHERE nom LIKE :term";
            $find = $this->bdd->prepare($select);
            $find->bindParam(':term' , $searchTerm, PDO::PARAM_STR);
            $find->execute();
            $data = $find->fetchAll(PDO::FETCH_ASSOC);
            return count($data);
        } else {
            header('location: index.php');
        }
    }
}