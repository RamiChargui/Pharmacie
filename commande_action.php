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
<?php
// Récupérer les données de connexion 
include("connexion2.php");
session_start();
if(isset($_POST['save']))
{
    $montant = $_POST['montant'];
}
$vnom = $_POST['nom'];
$vpwd = $_POST['pwd'];
// Vérifier que les codes d’accès sont corrects
$result = mysqli_query($mysqli, "SELECT * FROM clients WHERE nom_compte='$vnom' AND pwd='$vpwd'");
$clt = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($clt){ // Les codes sont corrects
    
    $date=$mysqli->query(" SELECT SYSDATE FROM DUAL ");

    $stmt = $mysqli->query("INSERT INTO commandes ( nom_client,date_commande ,montant) 
   VALUES('$vnom',  '$date', '$montant')");

   if($stmt){
       echo "<div style='margin: 20px 10px;'><span class='alert alert-success'  >le commande est passé avec succé, Vous le recevrez dans 24 heures. retour a la page <a href='index.php'>home</a> !!</span></div>";
   }
   //ajouter les detail au tableau detail_com
   $sql1=mysqli_query($mysqli, "SELECT num_com, nom_client FROM commandes WHERE nom_client='$vnom' AND date='$date' AND montant='$montant'");
   $row_com = mysqli_fetch_all($sql1, MYSQLI_ASSOC);
   echo"jj : $row_com[0]";
   $produits=$_SESSION['panier'];

   if(empty($produits))
   echo "<b>Aucune produit pour le moment !</b>";
   else{
       foreach ($produits as $key => $value) {
        $sql2 = mysqli_query($mysqli, "SELECT id FROM produit WHERE nom='$key' ");
        $row_prod = mysqli_fetch_all($sql2, MYSQLI_ASSOC);
        $stmt2 = $mysqli->query("INSERT INTO detail_com ( num_com,num_prod ,quantite) 
        VALUES('$row_com[0]',  '$row_prod[0]', '1')");
       
       }
    }
 
 
 //$_SESSION['code'] = $clt['nom_compte']; 
 // Redirection vers le tableau de bord "dashboard.php"
 
}
else{ // Les codes sont faux
    $r=0;
   
    //header("location:commande.php?dd=$r;");
}
//session_destroy();
?>
</body>
</html>