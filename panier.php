<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<link rel="icon" type="image/jpg" href="medica.jpg"></link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
</head>
<body>

<div style=" background-color: rgba(45, 250, 90, 0.911);height: 55px;">
<ul class="nav justify-content-end" >
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php"><span class="glyphicon glyphicon-home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="mon_compte.php"><span class="glyphicon glyphicon-user"></span> mon compte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span>panier</a>
  </li>
  
</ul>
</div><br>

<?php
    // Ouvrir une session
    session_start();
    // Vérifier si le formulaire a été envoyé
    if(isset($_POST['save']))
    {
        
        $nom= $_POST['nom'];
        
        $prix =$_POST['prix'] ;
       
        $produits = $_SESSION['panier'];
         
        $produits[$nom]=$prix;
      
        $_SESSION['panier']=$produits;

        $produits=$_SESSION['panier'];

        if(empty($produits))
        echo "<b>Aucune produit pour le moment !</b>";
        else{
            $total=0;
            echo "<table class='table table-striped'>";
            echo"<thead><tr><th>Non</th><th>prix</th><th>supprimer</th></tr></thead><tbody>";
            foreach ($produits as $key => $value) {
                $total+=$value;
            echo "<tr><td>$key</td><td>$value DT</td><td><a href='sup.php?dd=$key'><span class='glyphicon glyphicon-trash' style='color:red'></a></span></td></tr>";
            }
            echo "<tr><td></td><td>total : $total DT</td>
            <td>
              <form method='post' action='passer_commande.php'>
                <input type='hidden' name='montant' value='$total'>
                <input type='submit' value='passer la commande' class='btn btn-primary' style=' background-color: rgb(18, 207, 18);' name='save'>
              </form>
              </td></tr>";
            echo "</tbody></table>";
        }
        
    }
   
  
?>

</body>
</html>

