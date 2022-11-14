<?php
    require_once("connexion.php");
    class Client extends mysql {
        private $nom_compte;
        private $nom;
        private $prenom;
        private $adresse;
        private $pwd;

        public function getNomCompte(){
            return $this->nom_compte;

        }
        public function setNomCompte($n){
            $this->nom_compte=$n;    
       }

        public function getNom(){
            return $this->nom;
            
        }
        public function setNom($n){
            $this->nom=$n;    
       }

        public function getPrenom(){
            return $this->prenom;
            
        }
        public function setPrenom($p){
            $this->prenom=$p;
            
        }

        public function getAdresse(){
            return $this->adresse;
            
        }
        public function setAdresse($a){
            $this->adresse=$a;
            
       }

        public function getPwd(){
            return $this->pwd;
            
        }
        public function setPwd($p){
            $this->pwd=$p;
           
       }
       public function ajouter(){
            if(!isset($this->nom_compte) || !isset($this->nom) || !isset($this->prenom) || !isset($this->adresse) || !isset($this->pwd) )
            return false;
            $q = "INSERT INTO clients (nom_compte, nom, prenom, adresse, pwd)
            VALUES
            ('$this->nom_compte', '$this->nom', '$this->prenom','$this->adresse','$this->pwd')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editBy($nom, $pwd){
            $res = $this->connexion()->query("SELECT * FROM clients WHERE nom_compte='$nom' AND pwd='$pwd'");
            $le_client=$res->fetch();
            return $le_client;
        }

       
    }
?>