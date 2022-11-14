<?php
    require_once("connexion.php");
    class Commande extends mysql {
        private $nom_client;
        private $num_com;
        private $date_commande;
        private $montant;
       
        public function getNum_com(){
            return $this->num_com;
            
        }

        public function getNomClient(){
            return $this->nom_client;

        }
        public function setNomClient($n){
            $this->nom_client=$n;    
        }
        
        public function getDate(){
            return $this->date_commande;
            
        }
        public function setDate($p){
            $this->date_commande=$p;
            
        }

        public function getMontant(){
            return $this->montant;
            
        }
        public function setMontant($a){
            $this->montant=$a;
            
       }

       
       public function ajouter(){
            if(!isset($this->nom_client) || !isset($this->date_commande) || !isset($this->montant) )
            return false;
            $q = "INSERT INTO commandes (nom_client, date_commande, montant )
            VALUES
            ('$this->nom_client', '$this->date_commande', '$this->montant')";
            $stmt = $this->connexion()->exec($q);
            if($stmt>0)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }

    public function editAll(){
        $res=$this->connexion()->query("SELECT * from commandes");
        //Extraire (fech) toutes les lignes 
        $les_commandes= $res->fetchAll();
        return $les_commandes;

    }
  
    public function editBy($id){
        $res = $this->connexion()->query("SELECT * from detail_com where num_com=$id");
        $les_commandes=$res->fetchAll();
        return $les_commandes;
    }

       
    }
?>