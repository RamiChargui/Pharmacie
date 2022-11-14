<?php

    $vnom = $_POST['nom'];
    $vprix = $_POST['prix'];
    $vquantite = $_POST['quantite'];
    $vcategorie = $_POST['categorie'];
    $vimage = $_POST['image'];
    require_once("Produit.php");
    $produit = new Produit();
    $produit->setNom($vnom);
    $produit->setPrix($vprix);
    $produit->setQuantite($vquantite);
    $produit->setCategorie($vcategorie);
    $produit->setImage($vimage);
    $retour=$produit->ajouter();

    header("Location:insertion_produit.php?retour=$retour");


?>