<?php
    require 'CompteBancaire.php'; 
    require 'CompteEpargne.php';
    $compteJean = new CompteBancaire("euros", 150, "Jean"); //Cée un compte
    echo $compteJean . '<br />'; //Ecrit le solde
    $compteJean->crediter(100); //Ajoute 100€
    echo $compteJean . '<br />'; //Ecrit le solde
    $comptePaul = new CompteEpargne("dollars", 200, "Paul", 0.05); //Crée un compte épargne
    echo $comptePaul . '<br />'; //Affiche le solde
    echo 'Interets pour ce compte : ' . $comptePaul->calculerInterets() . ' ' . $comptePaul->getDevise() . '<br />'; //Calcule les interets et affiche
    $comptePaul->calculerInterets(true); //Ajoute les intérets au solde
    echo $comptePaul . '<br />'; //Affiche le solde
?>