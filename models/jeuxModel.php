<?php

class JeuxModel extends Model
{
    protected $id;
    protected $nom;
    protected $prix;
    protected $description;
    protected $date;

    public function __construct(){
        $this->table = "jeux";
    }

    
}