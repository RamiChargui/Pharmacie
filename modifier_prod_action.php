<?php
    require_once("Produit.php");
    $produit=new Produit();
    $id=$_REQUEST['dd'];
    $res = $produit->connexion()->query("SELECT * from produit where id=$id");
    $le_produit=$res->fetch();
    $le_produit[1]= $_POST['nom'];
    $le_produit[2]= $_POST['prix'];
    $le_produit[3]= $_POST['quantite'];
    $le_produit[4]= $_POST['categorie'];
    $le_produit[5]= $_POST['image'];
    $produit->setNom($le_produit[1]);
    $produit->setPrix($le_produit[2]);
    $produit->setQuantite($le_produit[3]);
    $produit->setCategorie($le_produit[4]);
    $produit->setImage($le_produit[5]);
    $r=$produit->modifier($id);
    if($r)
    header("location:voir_produit.php");
    else echo "echec de modificationn";
   
?>