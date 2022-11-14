<?php
     require_once("Produit.php");
    $produit= new Produit();
    $cat='c2';
    $prods= $produit->getProduits($cat);

        

?>
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
</div><br><br>

<div style=" width: 100%; height: 400px; background-image:url(arrboute.jpg)">

</div><br>

<div  class="ligne ligne-cols-1 ligne-cols-sm-2 ligne-cols-md-3 g-3 " >
 
    <table>
      <tr>
        <?php foreach($prods as $prod ): ?> 
          
            <td style="width: 34rem;">
              <div class="card" style="width: 32rem;">
                <img src="<?=  $prod["image"]  ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=  $prod["nom"]  ?></h5>
                    <p class="card-text"><?=  $prod["prix"] ?>DT</p>
                    <form action="panier.php" method="post">
                      <input type="hidden" name="nom" value="<?=  $prod['nom']  ?>">
                      <input type="hidden" name="prix" value="<?=  $prod['prix']  ?>">
                      <input type="submit" value="ajouter panier" class="btn btn-primary" style=" background-color: rgb(18, 207, 18);" name="save">

                    </form>
                  </div>
              </div>
            </td>
          
        <?php  endforeach ; ?>
      </tr>
    </table>
 


</ div >

</body>
</html>