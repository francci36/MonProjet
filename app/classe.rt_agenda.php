<?php






class RT_Agenda extends RT_AppRDVTherapeute_Mother {
    public function __construct() {
        
    }
    

    /**
     * Methode qui retourne les rendez-vous d'une date donnée
     * @param string $date  Date au format YYYY-MM-DD
     */
    public function getRDV($date) {
        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE date = :date ORDER BY date, heure_debut ASC');
        $oStmt->bindValue(':date', $date, PDO::PARAM_STR);
        $oStmt->execute();
        $aResult = $oStmt->fetchAll(PDO::FETCH_ASSOC);
        $aRDV = array();
        foreach($aResult as $aRDVData) {
            $oRDV = new RT_Rdv($aRDVData['id']);
            $aRDV[] = $oRDV;
        }
        return $aRDV;
    }
    /**
     * Methode qui retourne tous les rendez-vous à partir d'une date donnée classés par date.
     * si la date n'est pas renseignée, on prend la date du jour
     * si un $oUser est renseigné, on ne prend que les rendez-vous de cet utilisateur
     * 
     * @param string $date  Date au format YYYY-MM-DD
     * @param RT_User $oUser
     */
    public function getAllRDV($date = '', $oUser = null) {
        $oPdo = $this->get_pdo();
        if( !$date ) {
            $date = date('Y-m-d');
        }
        
        // Si un utilisateur est renseigné, on ne prend que ses rendez-vous
        if($oUser != null) {
            $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE date >= :date AND utilisateur_id = :user_id ORDER BY date ASC');
            $oStmt->bindValue(':user_id', $oUser->getId(), PDO::PARAM_INT);

        } else {
            $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE date >= :date ORDER BY date ASC');
        }


        $oStmt->bindValue(':date', $date, PDO::PARAM_STR);
        $oStmt->execute();
        $aResult = $oStmt->fetchAll(PDO::FETCH_ASSOC);

        $aRDV = array();
        foreach($aResult as $aRDVData) {
            $oRDV = new RT_Rdv($aRDVData['id']);
            $aRDV[] = $oRDV;
        }
        
        return $aRDV;
    }

    public function getTotalRdv() {
        // compter le nombre de rdv à partir de ;la date du jour
        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('SELECT COUNT(*) FROM rendez_vous WHERE date >= :date');
        $oStmt->bindValue(':date', date('Y-m-d'), PDO::PARAM_STR);
        $oStmt->execute();
        $aResult = $oStmt->fetch(PDO::FETCH_ASSOC);
        return $aResult['COUNT(*)'];
        
    }


    // methode pour recuprér tous les rdv par patient
    public function getAllRDVByPatient($oPatient) {
        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE patient_id = :patient_id ORDER BY date ASC');
        $oStmt->bindValue(':patient_id', $oPatient->getId(), PDO::PARAM_INT);
        $oStmt->execute();
        $aResult = $oStmt->fetchAll(PDO::FETCH_ASSOC);
        $aRDV = array();
        foreach($aResult as $aRDVData) {
            $oRDV = new RT_Rdv($aRDVData['id']);
            $aRDV[] = $oRDV;
        }
        return $aRDV;
    }
        
        // get rdv by id
        public function getRDVById($id) {
            $oPdo = $this->get_pdo();
            $oStmt = $oPdo->prepare('SELECT * FROM rendez_vous WHERE id = :id');
            $oStmt->bindValue(':id', $id, PDO::PARAM_INT);
            $oStmt->execute();
            $aResult = $oStmt->fetch(PDO::FETCH_ASSOC);
            if($aResult) {
                $oRDV = new RT_Rdv($aResult['id']);
                return $oRDV;
            }
        }
        //créer un rdv
        public function createRdv($date, $heure_debut, $heure_fin, ?RT_User $oUser) {
            $oPdo = $this->get_pdo();
            $oStmt = $oPdo->prepare('INSERT INTO rendez_vous (date, heure_debut, heure_fin, utilisateur_id) VALUES (:date, :heure_debut, :heure_fin, :utilisateur_id)');
            $oStmt->bindValue(':date', $date, PDO::PARAM_STR);
            $oStmt->bindValue(':heure_debut', $heure_debut, PDO::PARAM_STR);
            $oStmt->bindValue(':heure_fin', $heure_fin, PDO::PARAM_STR);
            $oStmt->bindValue(':utilisateur_id', $oUser->getId(), PDO::PARAM_INT);
            $oStmt->execute();
        }
}