<?php
require_once 'classe.utilisateur.php'; 
require_once 'db-inc.php'; 
class RendezVous {
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
// $rendezVous = new RendezVous();
// $rendezVous->setDate("26/06/2023");
// $rendezVous->setHeure("14:30:00");
// $rendezVous->setUtilisateurId(1);
// $rendezVous->setEtat("en cours");
$db = pdo_connect();
// Récupérer l'ID de l'utilisateur inséré
$utilisateur_id = $conn->lastInsertId();

// Insérer un nouveau rendez-vous pour cet utilisateur
$rendezVous = new RendezVous();
$rendezVous->setDate("26-06-2023");
$rendezVous->setHeure("14:30:00");
$rendezVous->setEtat("en cours");
$rendezVous->setUtilisateurId($utilisateur_id);


$rq = $conn->prepare("INSERT INTO rendez_vous (date, heure, etat, utilisateur_id) VALUES (:date, :heure, :etat, :utilisateur_id)");
$rq->bindParam(':date', $rendezVous->getDate());
$rq->bindParam(':heure', $rendezVous->getHeure());
$rq->bindParam(':etat', $rendezVous->getEtat());
$rq->bindParam(':utilisateur_id', $rendezVous->getUtilisateurId());

$rq->execute();