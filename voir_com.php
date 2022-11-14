<?php
// Connexion à la bdd
require_once("Commande.php");
require_once("Produit.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>les produit commander dans cette commande : </h1>

<hr/>

<?php
//creer nouveau commande
 $commande=new Commande();
 //creer nouveau produit
 $produit=new Produit();
//Récupérer l'id du voir 
$id=$_REQUEST['dd'];
$res=$commande->editBy($id);
echo "<ul calss='list-group list-group-flush'>";
echo" <li class='list-group-item'><h4>numero du commande " . $id. " : </h4> </li>";

        foreach ($res as $item) {
            $prod=$produit->editBy($item[2]);

           echo" <li class='list-group-item'>nom du produit  : " . $prod[1] . " ; quantite : "  . $item[3] . " </li>";
            
        }
        

   echo " </ul>";

?>
</body>
</html>