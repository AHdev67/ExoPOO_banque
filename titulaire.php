<?php

class Titulaire{
    private string $_nom;
    private string $_prenom;
    private DateTime $_datenaissance;
    private string $_ville;
    private array $_comptes;


    public function __construct(string $nom, string $prenom, string $datenaissance, string $ville){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_datenaissance = new DateTime($datenaissance);
        $this->_ville = $ville;
    }

    //-----------------------------------------------------------------GETTER/SETTER NOM-----------------------------------------------------------------
    public function get_nom()
    {
        return $this->_nom;
    }

    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER PRENOM-----------------------------------------------------------------
    public function get_prenom()
    {
        return $this->_prenom;
    }

    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER DATE NAISSANCE-----------------------------------------------------------------
    public function get_datenaissance()
    {
        return $this->_datenaissance;
    }

    public function set_datenaissance($_datenaissance)
    {
        $this->_datenaissance = $_datenaissance;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER VILLE-----------------------------------------------------------------
    public function get_ville()
    {
        return $this->_ville;
    }

    public function set_ville($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }

//-----------------------------------------------------------------METHODES PERSO-----------------------------------------------------------------
    public function addCompte(Compte $compte){
        $this->_comptes[] = $compte;
    }

//-----------------------------------------------------------------AFFICHAGE-----------------------------------------------------------------
    public function __toString(){
        return "$this->_nom $this->_prenom, né(e) le :";
    }
}