<?php
require 'ressources/database.php';

function valid_data($données)
{
    //trim permet de supprimer les espaces inutiles
    $données = trim($données);
    //stripslashes supprimes les antishlashs
    $données = stripslashes($données);
    //htmlspecialchars permet d'échapper certains caractéres spéciaux et les transforment en entité HTML
    $données = htmlspecialchars($données);
    return $données;
}


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
            $term = $_GET['search'];
            $search = valid_data($term);
            $select = "SELECT * FROM jeux WHERE nom LIKE :term ORDER BY avis DESC";
            $find = $this->bdd->prepare($select);
            $find->execute([
                'term' => $search . '%'
            ]);

            return $find->fetchAll(PDO::FETCH_ASSOC);     
    }

    /**
     * Function de recherche "relative" qui 'contient' ce qu'a rentré l'user;
     *
     * @param [type] $term
     * @return void
     */
    public function searchRelativeTerm($term){
            if (strlen($_GET['search']) >= 3){
                $search = valid_data($_GET['search']);
                $searchTerm = "%$search%";
                $select = "SELECT DISTINCT id,nom,description FROM jeux WHERE nom LIKE :term";
                $find = $this->bdd->prepare($select);
                $find->bindParam(':term' , $searchTerm, PDO::PARAM_STR);
                $find->execute();
                $data = $find->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
    }

    public function countResult($term){
            $search = valid_data($_GET['search']);
            $select = "SELECT DISTINCT id,nom,description FROM jeux WHERE nom LIKE :term";
            $find = $this->bdd->prepare($select);
            $find->execute([
                'term' => $search . '%'
            ]);

            return count($find->fetchAll(PDO::FETCH_ASSOC));
    }

    public function elementById($id)
    {
        if (isset($_GET['id'])) 
        {
            $id = valid_data($_GET['id']);
            
            $select = "SELECT * FROM jeux WHERE id = :id";
            $find = $this->bdd->prepare($select);
            $find->bindParam(':id', $id, PDO::PARAM_INT);
            $find->execute();
            $data = $find->fetch();
            return $data;
        }
    }
}

?>
