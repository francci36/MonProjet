<?php
require_once 'classe.utilisateur.php'; 
require_once 'db-inc.php'; 
class rendezVous {
    private $id;
    private $date;
    private $heure;
    private $utilisateur_id;
    private $etat;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function getHeure() {
        return $this->heure;
    }
    
    public function setHeure($heure) {
        $this->heure = $heure;
    }
    public function getUtilisateurId() {
        return $this->utilisateur_id;
    }
    
    public function setUtilisateurId($utilisateur_id) {
        $this->utilisateur_id = $utilisateur_id;
    }
    public function getEtat() {
        return $this->etat;
    }
    
    public function setEtat($etat) {
        $this->etat = $etat;
    }
}
