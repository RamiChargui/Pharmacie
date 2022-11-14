<?php
// Connexion à la bdd
require_once("Produit.php");
// Vérifier si le formulaire a été envoyé
?>
<!DOCTYPE html>
<html>
<head>
<title>consultation des Produit</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<hr/>
<h1>Les produits dans le stock </h1>
Ci-dessous la liste des produit: <br/>
<?php
 // Récupérer les notes depuis la BdD :
 $produit=new Produit();
 $les_produits=$produit->editAll();
 $nbr=count($les_produits);
 if( $nbr==0){
 // Afficher un message si la liste est vide
 echo "<b>Aucune produit pour le moment !</b>";}
 else{
 echo "<table class='table table-striped'>";
 echo "<thead><tr><th>id</th><th>nom</th><th>prix</th><th>quantite</th><th>categorie</th></tr></thead><tbody>";
foreach ($les_produits as $item) {
echo "<tr style='fontsize:2'><td>". $item[0] . "</td><td>" . $item[1]."</td><td>" .$item[2]."</td><td>".$item[3]."</td><td>".$item[4]."</td>" ;
echo "<td>
          <a class='btn btn-primary' href='details_prod.php?dd=$item[0]'>voir</a>
          <a class='btn btn-info' href='modification_prod.php?dd=$item[0]'>Modifier</a>
          <a class='btn btn-danger' onclick='if(confirm('voulez vous ?'))' href='supp_prod.php?dd=$item[0]'>Supprimer</a>
        </td></tr>";
}

echo "</tbody></table>";
}

?>
</body>
</html>