<?php
 require_once("Produit.php");
 

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Modifier un job</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
    .look-form{
        width: 50%;
        margin-left: 25%;
    }
</style>

</head>
<body>
 <h1 style="text-align: center;">Modifier une un produit</h1>
 <?php
     $produit=new Produit();
     // Récupérer l'id à modifier (depuis la page précédente)
    
     $id=$_REQUEST['dd'];
     // Récupérer toutes les données de produit relatif à l'ID récupéré
     $res = $produit->connexion()->query("SELECT * from produit where id=$id");
     $le_produit=$res->fetch();

   echo" <form class='look-form' action='modifier_prod_action.php?dd=$id' method='post'>

    <div class='form-group'>
    <label for='nom'>Nom</label>
    <input type='text' class='form-control' id='nom'  value='$le_produit[1]' name='nom'>  
    </div>
    <div class='form-group'>
    <label for='prix'>Prix</label>
    <input type='text' class='form-control' id='prix' name='prix' value='$le_produit[2]' >
    </div>
    <div class='form-group'>
    <label for='quantite'>quantite</label>
    <input type='number' class='form-control' id='quantite' name='quantite' value='$le_produit[3]' >
    </div>
    <div class='form-group'>
    <label for=' categorie'>Categorie</label>
    <input type='text' class='form-control' id='categorie' name='categorie' value='$le_produit[4]'>
    </div>
    <div class='form-group'>
    <label for='exampleInputEmail1'>lien image</label>
    <input type='text' class='form-control' id='image' name='image' value='$le_produit[5]'>
    </div>

    <button type='submit' class='btn btn-primary'>Submit</button>
    </form>";
 ?>

</body>
</html>