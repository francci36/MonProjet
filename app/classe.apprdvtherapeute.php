<?php
require_once('config.php');
class AppRDVTherapeute {
    
    protected $pdo;
    

    public function __construct()
    {
        $this->pdo = pdo_connect();
    }
    // créer un utilisateur
    public function create_user($nom, $prenom, $email, $telephone, $type_compte, $password)
    {
        $rq = $this->pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, telephone, type_compte, password) VALUES (?, ?, ?, ?, ?, ?)");
        $rq->execute([$nom, $prenom, $email, $telephone, $type_compte, $password]);
        return true;
    }
    // on recupère l'utilisateur avec son email
    public function get_user_by_email($email)
    {
        $rq = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $rq->execute([$email]);
        $user = $rq->fetch();
        return $user;
    }

}
