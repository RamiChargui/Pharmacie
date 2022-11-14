<?php
if(isset($_POST['save']))
{
    $montant = $_POST['montant'];
}

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
    </div><br>

    <form style=" width: 40%;margin-left: 30%;margin-top: 10px;border: solid 1px rgb(172, 175, 172); padding: 5px;" action="passer_commande_action.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label >Nom d'utilisateur</label>
      <input type="text" class="form-control" name="nom" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="pwd" placeholder="Password">
    </div>
  </div>
  <input type="hidden" name="montant" value="<?=  $montant ?>">
  <button type="submit" class="btn btn-primary" name="save">connecter et continuer</button>
</form>
<?php
   $r=$_REQUEST['dd'];
   if($r==0){
       echo "le nom ou le mot de passe est incorrect !!";
   }
?>
</body>
</html>