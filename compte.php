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
    
//méthode crediter qui va prendre en paramètre un montant et va l'additionner à l'attribut solde du compte
    public function crediter(float $credit){
        $this->_soldeinit = $this->_soldeinit + $credit;
        echo "compte crédité de $credit €.<br>"; 
    }

//pareil mais pour débiter
    public function debiter(float $debit){
        if ($debit <= $this->_soldeinit){
            $this->_soldeinit = $this->_soldeinit - $debit;
            echo "compte débité de $debit €.<br>";
        }
        else {
            echo "somme à débiter trop élevée.";
        }
    }

/*méthode virement qui va prendre en paramètre un autre objet Compte (à crediter) et un montant.
On soustrait le montant au compte qui effectue le virement, et on l'aditionne au compte à créditer*/
    public function virer(Compte $compte, float $virement){
        if ($virement <= $this->_soldeinit){
            $this->_soldeinit = $this->_soldeinit - $virement;
            $compte->_soldeinit = $compte->_soldeinit + $virement;
            echo "virement de $virement € du $this au $compte->_libelle de $compte->_titulaire.<br>";
        }
        else {
            echo "somme à virer trop élevée";
        }
    }

//-----------------------------------------------------------------AFFICHAGE-----------------------------------------------------------------
    public function __toString(): string{
        return "$this->_libelle de $this->_titulaire";
    }

    public function afficherCompte(){
        $result= "$this, au solde de : $this->_soldeinit $this->_devise<br>";
        return $result;
    }
}