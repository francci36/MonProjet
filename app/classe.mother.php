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

}
