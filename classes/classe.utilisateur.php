<?php
require_once 'db-inc.php'; 
class utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $telephone;
    private $type_compte;
    private $inscription_date;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getTelephone() {
        return $this->telelephone;
    }
    
    public function setTelelephone($telephone) {
        $this->telelephone = $telephone;
    }
    public function getType_compte() {
        return $this->type_compte;
    }
    
    public function setType_compte($type_compte) {
        $this->type_compte = $type_compte;
    }
    public function getInscription_date() {
        return $this->inscription_date;
    }
    
    public function setInscription_date($inscription_date) {
        $this->inscription_date = $inscription_date;
    }
}

