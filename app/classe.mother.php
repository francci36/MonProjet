<?php
class RT_AppRDVTherapeute_Mother {


    protected static $oPdo;

    
    public function get_pdo() : PDO
    {
        if(static::$oPdo == null ) 
            static::$oPdo = $this->pdo_connect(  );
       
        return static::$oPdo;
    }



    public function pdo_connect() {
        // on récupère les variables de connexion globales
        global $DB_HOST;
        global $DB_USER;
        global $DB_PASSWORD;
        global $DB_NAME;

        try {
            // on crée une nouvelle instance de PDO en passant les paramètres de connexion en argument
            $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASSWORD);
            // on configure PDO pour qu'il renvoie des exceptions en cas d'erreur SQL
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $exception) {
        // En cas d'erreur, on affiche un message d'erreur et on quitte le script
            exit('impossible de se connecter a la BDD');
        }
    }


    
    public function getAdminEmailFromDatabase() {
        $oPdo = $this->get_pdo();
        $oStmt = $oPdo->query("SELECT email FROM utilisateurs WHERE type_compte = 'admin' LIMIT 1");
        $result = $oStmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['email'])) {
            return $result['email'];
        }

        return null;
    }

    public function send_email($from, $to, $subject, $content) {


        if( !$from || !$to || !$subject || !$content ) {
            return false;
        }

        // En-têtes de l'e-mail
        $headers = "From: $from" . "\r\n" .
                   "Reply-To: $from" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
    
    
        // Envoi de l'e-mail
        $success = mail($to, $subject, $content, $headers);
    
        // Vérifier si l'e-mail a été envoyé avec succès
        if ($success) {
            echo "E-mail envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
        }
    }
    
}
