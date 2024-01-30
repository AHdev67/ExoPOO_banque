<?php
use LDAP\Result;

class Compte extends Titulaire{
    private string $_libelle;
    private float $_soldeinit;
    private string $_devise;
    private Titulaire $_titulaire;


    public function __construct(string $libelle, float $soldeinit, string $devise, Titulaire $titulaire){
        $this->_libelle = $libelle;
        $this->_soldeinit = $soldeinit;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $this->_titulaire->addCompte($this);
    }

//-----------------------------------------------------------------GETTER/SETTER LIBELLE-----------------------------------------------------------------
    public function getLibelle()
    {
        return $this->_libelle;
    }

    public function setLibelle($_libelle)
    {
        $this->_libelle = $_libelle;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER SOLDE INITIAL-----------------------------------------------------------------
    public function getSoldeinit()
    {
        return $this->_soldeinit;
    }

    public function setSoldeinit($_soldeinit)
    {
        $this->_soldeinit = $_soldeinit;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER DEVISE-----------------------------------------------------------------
    public function getDevise()
    {
        return $this->_devise;
    }

    public function setDevise($_devise)
    {
        $this->_devise = $_devise;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER TITULAIRE-----------------------------------------------------------------
    public function getTitulaire()
    {
        return $this->_titulaire;
    }

    public function setTitulaire($_titulaire)
    {
        $this->_titulaire = $_titulaire;

        return $this;
    }
//-----------------------------------------------------------------METHODES PERSO-----------------------------------------------------------------
    public function crediter(float $credit){
        $this->_soldeinit = $this->_soldeinit + $credit;
        echo "compte crédité de $credit €.<br>";
    }

    public function debiter(float $debit){
        $this->_soldeinit = $this->_soldeinit - $debit;
        echo "compte débité de $debit €.<br>";
    }

//-----------------------------------------------------------------AFFICHAGE-----------------------------------------------------------------
    public function __toString(): string{
        return "$this->_libelle solde: $this->_soldeinit $this->_devise";
    }

    public function afficherCompte(){
        $result= "$this->_libelle de $this->_titulaire, au solde de : $this->_soldeinit $this->_devise<br>";
        return $result;
    }
}