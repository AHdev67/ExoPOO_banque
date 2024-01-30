<?php

class Titulaire{
    private string $_nom;
    private string $_prenom;
    private DateTime $_datenaissance;
    private string $_ville;
    private array $_comptes;


    public function __construct(string $prenom, string $nom, string $datenaissance, string $ville){
        $this->_prenom = $prenom;
        $this->_nom = $nom;
        $this->_datenaissance = new DateTime($datenaissance);
        $this->_ville = $ville;
    }

    //-----------------------------------------------------------------GETTER/SETTER NOM-----------------------------------------------------------------
    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER PRENOM-----------------------------------------------------------------
    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER DATE NAISSANCE-----------------------------------------------------------------
    public function getDatenaissance()
    {
        return $this->_datenaissance->format("Y-m-d");
    }

    public function setDatenaissance($_datenaissance)
    {
        $this->_datenaissance = $_datenaissance;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER VILLE-----------------------------------------------------------------
    public function getVille()
    {
        return $this->_ville;
    }

    public function setVille($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }

//-----------------------------------------------------------------METHODES PERSO-----------------------------------------------------------------
    public function getAge(): string{
        $age = date_diff(($this->_datenaissance), new DateTime()); 
        return $age->format("%Y ans");
    }

    public function addCompte(Compte $compte){
            $this->_comptes[] = $compte;
    }

//-----------------------------------------------------------------AFFICHAGE-----------------------------------------------------------------
    public function __toString(){
        return "$this->_prenom $this->_nom";
    }

    public function afficherTitulaire(){
        $result="$this, né(e) le : ".$this->getDatenaissance()." (".$this->getAge()."), habitant à $this->_ville, est titulaire des comptes suivants :<br>";
        foreach($this->_comptes as $compte){
            $result.=$compte."<br>";
        }
        return $result;
    }
}