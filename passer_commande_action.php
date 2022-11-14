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
require_once("client.php");
$client = new Client();
$montant = $_POST['montant'];
$vnom = $_POST['nom'];
$vpwd = $_POST['pwd'];
// Vérifier que les codes d’accès sont corrects
$clt = $client->editBy($vnom, $vpwd);

if ($clt){ // Les codes sont corrects
    
    
    //ajouter la commande au tableau commandes
    require_once("Commande.php");
    $commande = new Commande();
    //$date=$commande->connexion()->query(" SELECT SYSDATE FROM DUAL ");
    $commande->setNomClient($vnom);
    $commande->setDate('11-11-2022');
    $commande->setMontant($montant);
    $stmt = $commande->ajouter();

   if($stmt){
       echo "<div style='margin: 20px 10px;'><span class='alert alert-success'  >le commande est passé avec succé, Vous le recevrez dans 24 heures. retour a la page <a href='index.php'>home</a> !!</span></div>";
     
    }
    else{
        echo"echec";
    }
    
    session_start();
      //ajouter les detail au tableau detail_com
      //$sql1=$client->connexion()->query("SELECT num_com FROM commandes WHERE nom_client='$vnom' AND date='$date' AND montant='$montant'");
      $row_com = $commande->getNum_com();
      $produits=$_SESSION['panier'];
   

   if(empty($produits))
   echo "<b>Aucune produit pour le moment !</b>";
   else{
       foreach ($produits as $key => $value) {
        $sql2 =$client->connexion()->query("SELECT id, nom FROM produit WHERE nom='$key' ");
        $row_prod = $sql2->fetch();
        $stmt2 = $client->connexion()->exec("INSERT INTO detail_com ( num_com,num_prod ,quantite) 
        VALUES($row_com,  $row_prod[0], '1')");
       
       }
    }
   
 
 //$_SESSION['code'] = $clt['nom_compte']; 
 // Redirection vers le tableau de bord "dashboard.php"
 
}
else{ // Les codes sont faux
    $r=0;
   
    header("location:passer_commande.php?dd=$r;");
}
//session_destroy();

?>
</body>
</html>