<?php
    require_once("Commande.php");
    $commande=new Commande();
    $id=$_REQUEST['dd'];
    $r=$commande->supprimer($id);
    if($r)
    header("location:details_com.php");
    else echo "erreur de suppresion";
?>