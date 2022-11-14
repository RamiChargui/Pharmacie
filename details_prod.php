<?php
// Connexion à la bdd
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
<h1>details sur le job</h1>

<hr/>

<?php
//creer nouveau produit
 $produit=new Produit();
//Récupérer l'id du voir 
$id=$_REQUEST['dd'];
$res=$produit->editBy($id);
echo "<ul calss='list-group list-group-flush'>
        <li class='list-group-item'>l'id du produit : $res[0]</li>
        <li class='list-group-item'>le nom  : $res[1]</li>
        <li class='list-group-item'>le prix : $res[2]</li>
        <li class='list-group-item'>la quantite au stock : $res[3]</li>
        <li class='list-group-item'>quategorie : $res[4]</li>
        <li class='list-group-item'>image : <img src=' $res[5]' width='100px'></li>

    </ul>";

?>
</body>
</html>