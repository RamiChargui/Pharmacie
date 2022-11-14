<?php
// Récupérer le nom à supprimer
$nom = $_REQUEST['dd'];
// Ouvrir une session
session_start();
// Récupérer les produit depuis la session
$produits = $_SESSION['panier'];
// Supprimer le nom
unset($produits[$nom]);
// Remettre les produit dans la session
$_SESSION['panier']=$produits;
header("location:panier.php");
?>