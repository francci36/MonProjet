<?php






class RT_Rdv extends RT_AppRDVTherapeute_Mother {
    public $id;
    public $date;
    public $heure_debut;
    public $heure_fin;
    public $utilisateur_id;


    public function __construct($id = '') {

        $this->loadRDV( $id );
    }
    public function getId() {
        return $this->id;
    }
    public function getDate() {
        return $this->date;
    }
    public function getHeureDebut() {
        return $this->heure_debut;
    }
    public function getHeureFin() {
        return $this->heure_fin;
    }
    public function getUserId() {
        return $this->utilisateur_id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setHeureDebut($heure_debut) {
        $this->heure_debut = $heure_debut;
    }
    public function setHeureFin($heure_fin) {
        $this->heure_fin = $heure_fin;
    }
    public function setUserId($user_id) {
        $this->utilisateur_id = $user_id;
    }
    public function loadRDV($id) {
        if($id != '') {
            $oPdo = $this->get_pdo();
            $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE id = :id');
            $oStmt->bindValue(':id', $id, PDO::PARAM_INT);
            $oStmt->execute();
            $aResult = $oStmt->fetch(PDO::FETCH_ASSOC);
            if($aResult) {
                $this->id = $aResult['id'];
                $this->date = $aResult['date'];
                $this->heure_debut = $aResult['heure_debut'];
                $this->heure_fin = $aResult['heure_fin'];
                $this->utilisateur_id = $aResult['utilisateur_id'];
            }
        }
    }

    public function getPatient() {
        if (!empty($this->getUserId())) {
            return new RT_User($this->getUserId());
        }
        return null;
    }


    //créer un rdv
    public function createRdv($date, $heure_debut, $heure_fin, ?RT_User $oUser) {

        // test empty
        if(empty($date) || empty($heure_debut) || empty($heure_fin)) {
            return false;
        }
        // test user connecté
        if( !$oUser->is_connected() ) {
            return false;
        }

        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('INSERT INTO rendez_vous (date, heure_debut, heure_fin, utilisateur_id) VALUES (:date, :heure_debut, :heure_fin, :utilisateur_id)');
        $oStmt->bindValue(':date', $date, PDO::PARAM_STR);
        $oStmt->bindValue(':heure_debut', $heure_debut, PDO::PARAM_STR);
        $oStmt->bindValue(':heure_fin', $heure_fin, PDO::PARAM_STR);
        $oStmt->bindValue(':utilisateur_id', $oUser->getId(), PDO::PARAM_INT);
        $oStmt->execute();

        // récuper l'id du dernier rdv créée
        $this->id = $this->get_pdo()->lastInsertId();
        return true;
    }
    //modifier un rdv
    public function updateRdv($date, $heure_debut, $heure_fin, ?RT_User $oUser) {
        // test empty
        if(empty($date) || empty($heure_debut) || empty($heure_fin)) {
            return false;
        }
        // test user connecté
        if( !$oUser->is_connected() ) {
            return false;
        }
        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('UPDATE rendez_vous SET date = :date, heure_debut = :heure_debut, heure_fin = :heure_fin, utilisateur_id = :utilisateur_id WHERE id = :id');
        $oStmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $oStmt->bindValue(':date', $date, PDO::PARAM_STR);
        $oStmt->bindValue(':heure_debut', $heure_debut, PDO::PARAM_STR);
        $oStmt->bindValue(':heure_fin', $heure_fin, PDO::PARAM_STR);
        $oStmt->bindValue(':utilisateur_id', $oUser->getId(), PDO::PARAM_INT);
        $oStmt->execute();
        return true;
    }
    //annuler un rdv
    public function deleteRdv() {

        // test empty
        if(empty($this->id) ) {
            return false;
        }
      

        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('DELETE FROM rendez_vous WHERE id = :id');
        $oStmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $oStmt->execute();
        return true;
    }
    // get utilisateurs by 


}