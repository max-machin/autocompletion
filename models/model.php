<?php

class Model extends Database 
{
    protected $table;
    
    protected $database;
    
        /**
     * Gestion des préparations et execute des requetes en fonctions des attributs
     *
     * @param [type] $sql
     * @param array|null $attributs 
     * @return void
     */
    public function requete($sql, ?array $attributs = null){
    
        //On récupere l'instance de database
        $this->database = DataBase::getPdo();
        // var_dump($sql);
        //On vérifie si on a des attributs 
        if ($attributs !== null){
            //requête préparée
            $query = $this->database->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            //requête simple
            return $this->database->query($sql);
        }
    }
}