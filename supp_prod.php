<?php
    require_once("Produit.php");
    $produit=new Produit();
    $id=$_REQUEST['dd'];
    $r=$produit->supprimer($id);
    if($r)
    header("location:voir_produit.php");
    else echo "erreur de suppresion";
?>