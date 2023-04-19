<?php

/** 
 * 
 * 
 * 
 * 
 */
class rendezVous extends AppRDVTherapeute{
    private $id;
    private $date;
    private $heure;
    private $utilisateur_id;
    private $etat;
    
    public function __construct($id='')
    {
        global $db;
        if($id)
        {
            $req = $db->prepare('SELECT * FROM `rendez_vous` WHERE ID = :id');
            $req->bindParam(':id',$id,PDO::PARAM_INT);
            $req->execute();
            if($req->rowCount() == 1)
            {
                $obj = $req->fetch(PDO::FETCH_OBJ);
                $this->id = $obj->ID;
                $this->date = $obj->date;
                $this->heure = $obj->heure;
                $this->utilisateur_id = $obj->utilisateur_id;
                $this->etat = $obj->etat;
            }
        }
    }
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
    // methode pour enregistrer l'objet rendez_vous dans la bdd
    public function register() 
    {
        global $db;
        $req = $db->prepare('INSERT INTO `rendez_vous` SET 
                            date = :date,
                            heure = :heure,
                            utilisateur_id = :utilisateur_id,
                            etat = :etat
        ');
        $req->bindValue(':date',$this->date,PDO::PARAM_STR);
        $req->bindValue(':heure',$this->heure,PDO::PARAM_STR);
        $req->bindValue('utilisateur_id',$this->utilisateur_id,PDO::PARAM_INT);
        $req->bindValue(':etat',$this->etat,PDO::PARAM_STR);
        if($req->execute())
        {
            $id = $db->lastInsertId();
            return $id;
        }
        else
        {
            return false;
        }
    }
    // methode pour modifier le rendez_vous 
    public function update() {
      global $db;
      $req = $db->prepare('UPDATE `rendez_vous` SET 
                           heure = :heure,
                            utilisateur_id = :utilisateur_id,
                            etat = :etat      
      ');
       $req->bindValue(':date',$this->date,PDO::PARAM_STR);
       $req->bindValue(':heure',$this->heure,PDO::PARAM_STR);
       $req->bindValue('utilisateur_id',$this->utilisateur_id,PDO::PARAM_INT);
       $req->bindValue(':etat',$this->etat,PDO::PARAM_STR);
       if($req->execute())
       {
        return true;
       }
       else
       {
        return false;
       }
    }
    
    public function delete()
    {
        global $db;
        $req = $db->prepare('DELETE FROM `rendez_vous` WHERE ID = :id');
        $req->bindValue(':id',$this->id,PDO::PARAM_INT);
        if($req->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // méthode pour afficher tous les rendez-vous par date
    public static function liste()
    {
        global $db;
        $req = $db->prepare('SELECT * FROM `rendez_vous` ORDER BY date');
        $req->execute();
        // si on a une ligne ou plus
        if($req->rowCount() >=1)
        {
            // on retourne l'esemble des lignes
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }
}


