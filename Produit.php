<?php
    require_once("connexion.php");
    class Produit extends mysql {
        private $id;
        private $nom;
        private $prix;
        private $quantite;
        private $categorie;
        private $image;

        public function getId(){
            return $this->id;

        }
        

        public function getNom(){
            return $this->nom;
            
        }
        public function setNom($n){
            $this->nom=$n;    
       }

        public function getPrix(){
            return $this->prix;
            
        }
        public function setPrix($p){
            $this->prix=$p;
            
        }

        public function getQuantite(){
            return $this->quantite;
            
        }
        public function setQuantite($a){
            $this->quantite=$a;
            
       }

        public function getCategorie(){
            return $this->categorie;
            
        }
        public function setCategorie($p){
            $this->categorie=$p;
           
       }
       public function getImage(){
            return $this->image;
        }
        public function setImage($p){
            $this->image=$p;
        
        }
       public function ajouter(){
        if(!isset($this->prix) || !isset($this->nom) || !isset($this->quantite) || !isset($this->categorie) || !isset($this->image) )
        return false;
        $q = "INSERT INTO produit (nom, prix, quantite, categorie, image)
        VALUES
        ('$this->nom', '$this->prix', '$this->quantite','$this->categorie','$this->image')";
        $stmt = $this->connexion()->exec($q);
        if(!$stmt)
            echo('echec insertion'.$this->connexion()->errorInfo());
        else{
            $r= 1;
            return $r;
        }
    }

    public function editAll(){
        $res=$this->connexion()->query("SELECT * from produit");
        //Extraire (fech) toutes les lignes 
        $les_prodiuts= $res->fetchAll();
        return $les_prodiuts;

    }
    public function supprimer($id){
        $q="DELETE FROM produit WHERE id = $id";
        $stmt= $this->connexion()->exec($q);
        if(!$stmt)
            echo('echec de suppression'.$this->connexion()->errorInfo());
        else 
        return $stmt;
    }
    public function editBy($id){
        $res = $this->connexion()->query("SELECT * from produit where id=$id");
        $le_produit=$res->fetch();
        return $le_produit;
    }
    public function modifier($id){
        $t=$this->getNom();
        $c=$this->getPrix();
        $d=$this->getQuantite();
        $ve=$this->getCategorie();
        $e=$this->getImage();
        $stmt=$this->connexion()->exec("UPDATE produit SET nom='$t', prix='$c', quantite='$d', categorie='$ve', image='$e' WHERE id=$id");
        
         return $stmt;
    }
    public function getProduits($cat){
        $res = $this->connexion()->query("SELECT * from produit where categorie='$cat'");
        //Extraire (fech) toutes les lignes 
         $les_prodiuts = $res->fetchAll();
         return $les_prodiuts;
    }

       
    }
?>