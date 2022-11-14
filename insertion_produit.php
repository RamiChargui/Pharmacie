
<!DOCTYPE html>
<html>
<head>
<style>
    form{
    margin-left:auto;
    margin-right:auto;
    width:500px;
    }
</style>
<title>insert job</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<form name="f1" method="post" action="insertion_produit_action.php">
<h1>Ajout d'une medicament</h1>
  <div class="form-group">
    <label for="nom">nom</label>
    <input type="text" class="form-control" id="nom"  placeholder="" name="nom">  
  </div>
  <div class="form-group">
    <label for="company">prix</label>
    <input type="number" class="form-control" id="prix" name="prix" placeholder="">
  </div>
  <div class="form-group">
    <label for="company">quantite</label>
    <input type="number" class="form-control" id="quantite" name="quantite" placeholder="">
  </div>
  <div class="form-group">
    <label for="nom">categorie</label>
    <select name=categorie class="form-control">
    <option value="" >--choisie un categorie--</option>
      <option value="c1" >medicament</option>
      <option value="c2">maman et bebe</option>
      <option value="c3">beaute</option>
    </select>
  </div>
  <div class="form-group">
    <label for="image">image</label>
   <input type="file"  name="image" >
  </div>
 
  
  <button type="submit" class="btn btn-primary" name="save">Submit</button>
</form>

<?php
if(isset($_REQUEST['retour']))
{
  $res=$_REQUEST['retour'];
  if($res)
  echo "<center><b><span style='color:green'>ajout avec succés</span></b></center>";
  else
  echo "<center><b><span style='color:red'>erreur d'insertion</span></b></center>";
}
?>

</body>
</html>