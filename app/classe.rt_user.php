<?php


class RT_User extends RT_AppRDVTherapeute_Mother {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $telephone;
    private $type_compte;
    //public $valeur_test ="personne m'a dit";

    public $b_is_connected = false;


    public function __construct($id = '') {

        $this->load( $id );
        $this->type_compte = 'client'. 'admin';
        $this->email = '';
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTelephone() {
        return $this->telephone;
    }
     /**
     * Obtenir le type de compte de l'utilisateur
     *
     * @return string|null Le type de compte de l'utilisateur ou null s'il n'est pas défini
     */
    public function getTypeCompte(): ?string {
        return $this->type_compte;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setTypeCompte($type_compte) {
        $this->type_compte = $type_compte;
    }

    public function load($id)
    {
        // Requête SQL pour récupérer les informations de la ligne correspondant à l'ID
        $sql = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = $this->get_pdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    
        // Si la requête n'a retourné aucun résultat, on retourne FALSE
        if ($stmt->rowCount() == 1) {
             // Sinon, on charge les informations dans l'objet
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // ... continuez à remplir l'objet avec les données de la ligne récupérée ...
            $this->id = $id;
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->telephone = $row['telephone'];
            $this->type_compte = $row['type_compte'];
            $this->b_is_connected = false;
            // On retourne TRUE pour indiquer que la méthode a réussi à charger les informations
            return true;
        }
       

        return false;
    }
    


    // je crée un utilisateur
    public function createUser($nom, $prenom, $email, $password, $telephone, $type_compte) {
        // Vérification des données (vous pouvez ajouter autant de vérifications que nécessaire)
        if(empty($nom) || empty($prenom) || empty($email) 
        || empty($password) || empty($telephone) || empty($type_compte)){
            return false; // Si une des données est manquante, on retourne FALSE
        }
    
        // Vérification que l'email n'est pas déjà utilisé
        if(!$this->check_email_not_used($email)){
            return false;
        }
        
         // Hachage du mot de passe
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Création de la requête SQL pour insérer les données dans la table
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, password, telephone, type_compte) VALUES (:nom, :prenom, :email, :password, :telephone, :type_compte)";
        $stmt = $this->get_pdo()->prepare($sql);
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":prenom", $prenom);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashed_password);
        $stmt->bindValue(":telephone", $telephone);
        $stmt->bindValue(":type_compte", $type_compte);
    
        // Exécution de la requête
        $result = $stmt->execute();
    
        // Si la requête a réussi, on met $this->b_is_connected à true et on retourne true
        if($result){
            // Récupération de l'ID de l'utilisateur créé
            $this->id = $this->get_pdo()->lastInsertId();
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->password = $password;
            $this->telephone = $telephone;
            $this->type_compte = $type_compte;
            

            $this->b_is_connected = true;
            return true;
        } else {
            return false;
        }
    }
    
    

    public function login($email, $password) {
        // Vérification des données ( ajouter autant de vérifications que nécessaire)
        if(empty($email) || empty($password)){
            return false;
        }
    
        // Vérification que l'email existe
        if(!$this->getUserByEmail($email)){
            return false;
        }
    
        
        if (password_verify($password, $this->password)) {
            // Mot de passe valide
            // On met $this->b_is_connected à true et on retourne true

            // chargeons les données de cet user
            $this->load( $this->id );

            //
            $this->b_is_connected = true;

            return true;
            
        } else {
            // Mot de passe invalide

        }
    
        // Si le mot de passe n'est pas correct, on retourne false
        return false;
    }
    
    
    
    

    public function getUserByEmail($email)
    {
        // Requête SQL pour récupérer l'utilisateur correspondant à l'email
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->get_pdo()->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
    
        // Si la requête ne retourne aucun résultat, on retourne FALSE
        if ($stmt->rowCount() == 0) {
            return false;
        }
    
        // Sinon, on charge les informations de l'utilisateur dans l'instance courante de la classe
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->telephone = $row['telephone'];
        $this->type_compte = $row['type_compte'];
        $this->b_is_connected = false;
    
        // On retourne TRUE pour indiquer que la méthode a réussi à charger les informations
        return true;
    }
    

    public function check_email_not_used($email) {
        // Préparation de la requête SQL pour vérifier si l'e-mail existe déjà dans la table
        $sql = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->get_pdo()->prepare($sql);
        $stmt->bindValue(":email", $email);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Récupération du résultat
        $result = $stmt->fetchColumn();
        
        // Si le résultat est 0, cela signifie que l'e-mail n'est pas utilisé
        if($result == 0){
            return true;
        } else {
            return false;
        }
    }
    


    
    
    public function logout()
    {
        // Réinitialisation des informations de l'utilisateur dans l'objet
        $this->id = null;
        $this->nom = null;
        $this->prenom = null;
        $this->email = null;
        $this->password = null;
        $this->telephone = null;
        $this->type_compte = null;
        $this->b_is_connected = false;
    }
    

    public function isAdmin()
    {
        // Vérification si le type de compte de l'utilisateur est "admin"
        if ($this->type_compte == 'admin') {
            return true;
        } 
        // récupère le rôle de l'utilisateur
        $role = $this->getTypeCompte();
        // Vérification si le rôle de l'utilisateur est "admin"
        if ($role == 'admin') {
            return true;
        }

        
        return false;
    }
    
    
    
    //methode is_connected
    public function is_connected()
    {
        //verifier si l'id est null
        // empyt >> null 0 (zero) "" false
        if( empty($this->id) ) {
            return false;
        }

        return $this->b_is_connected;
    }
}
