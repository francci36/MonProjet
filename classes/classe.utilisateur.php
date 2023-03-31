<?php
require_once 'db-inc.php'; 
class Utilisateur {
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
$utilisateur = new Utilisateur();
$utilisateur->setNom("Dupont");
$utilisateur->setPrenom("Jean");
$utilisateur->setEmail("jean.dupont@example.com");
$utilisateur->setPassword("monmotdepasse");
$utilisateur->setTelephone("555-1234");
$utilisateur->setType_compte("client");
$utilisateur->setInscription_date("06-05-2022");

// Ensuite, insérez l'utilisateur dans la base de données avec une requête SQL INSERT
$db = pdo_connect();
$rq = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, password telephone, type_compte, inscription_date) VALUES (:nom, :prenom, :email, :password :telephone, :type_compte, :inscription_date)");
$rq->bindParam(':nom', $utilisateur->getNom());
$rq->bindParam(':prenom', $utilisateur->getPrenom());
$rq->bindParam(':email', $utilisateur->getEmail());
$rq->bindParam(':telephone', $utilisateur->getTelephone());
$password_crypte = password_hash($utilisateur->getPassword(), PASSWORD_DEFAULT);
$rq->bindParam(':password', $password_crypte);

$rq->bindParam(':type_compte', $utilisateur->getType_compte());
$rq->bindParam(':inscription_date', $utilisateur->getInscription_date());

$rq->execute();
