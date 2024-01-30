<h1>Exercice Banque</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires et leurs comptes bancaires respectifs.<br>
    <br>
    <br>
    Un compte bancaire est composé des éléments suivants :<br>
    <br>
    -Un libellé (compte courant, livret A, ...)<br>
    -Un solde initial<br>
    -Une devise monétaire<br>
    -Un titulaire unique<br>
    <br>
    -Un titulaire comporte :<br>
    -Un nom<br>
    -Un prénom<br>
    -Une date de naissance<br>
    -Une ville<br>
    -L'ensemble de ses comptes bancaires.<br>
    <br>
    <br>
    Sur un compte bancaire, on doit pouvoir :<br>
    <br>
    -Créditer le compte de X euros<br>
    -Débiter le compte de X euros<br>
    -Effectuer un virement d'un compte à l'autre.<br>
    <br>
    <br>
    On doit pouvoir :<br>
    <br>
    -Afficher toutes les informations d'un(e) titulaire (dont l'âge) et l'ensemble des comptes appartenant à celui(celle)-ci.<br>
    -Afficher toutes les informations d'un compte bancaire, notamment le nom / prénom du titulaire du compte.<br>
</p>

<h2>Résultat</h2>

<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$titulaire1= new Titulaire("Maurice", "Ortolan", "1993-04-17", "Metz");
$compte1= new Compte("livret A", 75.98, "€", $titulaire1);
$compte2= new Compte("LEP", 300, "€", $titulaire1);
echo $titulaire1->afficherTitulaire();

echo "<br>";

echo $compte1->afficherCompte();
$compte1->crediter(10.02);
echo $compte1->afficherCompte();
$compte1->debiter(12);
echo $compte1->afficherCompte();

echo"<br>";

$compte1->virer($compte2, 15.50);
echo $compte1->afficherCompte();
echo $compte2->afficherCompte();

?>