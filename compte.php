<?php

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
    public function get_libelle()
    {
        return $this->_libelle;
    }

    public function set_libelle($_libelle)
    {
        $this->_libelle = $_libelle;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER SOLDE INITIAL-----------------------------------------------------------------
    public function get_soldeinit()
    {
        return $this->_soldeinit;
    }

    public function set_soldeinit($_soldeinit)
    {
        $this->_soldeinit = $_soldeinit;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER DEVISE-----------------------------------------------------------------
    public function get_devise()
    {
        return $this->_devise;
    }

    public function set_devise($_devise)
    {
        $this->_devise = $_devise;

        return $this;
    }

//-----------------------------------------------------------------GETTER/SETTER TITULAIRE-----------------------------------------------------------------
    public function get_titulaire()
    {
        return $this->_titulaire;
    }

    public function set_titulaire($_titulaire)
    {
        $this->_titulaire = $_titulaire;

        return $this;
    }

//-----------------------------------------------------------------AFFICHAGE-----------------------------------------------------------------
    public function __toString(): string{
        return "$this->_libelle solde: $this->_soldeinit $this->_devise.";
    }
}