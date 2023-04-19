<?php


class utilisateurs extends AppRDVTherapeute{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $telephone;
    private $type_compte;
    

    // constructeur de ma classe

    public function __construct($id='',$args='')
    {
        global $db;
        if(!empty($id))
        {
            $req = $db->prepare('SELECT * FROM `utilisateurs` WHERE ID = :id');
            $req->bindParam(':id',$id,PDO::PARAM_INT);
            //si la requêtte s'execute correctement
            if($req->execute())
            {
                // on regarde s'il y a une ligne de retourné
                if($req->rowCount() == 1)
                {
                    // on retourne l'objet user
                    $obj = $req->fetch(PDO::FETCH_OBJ);
                    $this->id = $obj->ID;
                    $this->nom = $obj->nom;
                    $this->prenom = $obj->prenom;
                    $this->email = $obj->email;
                    $this->password = $obj->password;
                    $this->telephone = $obj->telephone;
                    $this->type_compte = $obj->type_compte;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else if(!empty($args))
        {
            $this->nom = $args['nom'];
            $this->prenom = $args['prenom'];
            $this->email = $args['email'];
            $this->password = self::generatePassword();
            $this->telephone = $args['telephone'];
            $this->type_compte = $args['type_compte'];
            $inscription = self::inscrire();
            if($inscription)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
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
        return $this->telephone;
    }
    
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    public function getType_compte() {
        return $this->type_compte;
    }
    
    public function setType_compte($type_compte) {
        $this->type_compte = $type_compte;
    }
    // methode pour créer un mot de passe
    private function generatePassword()
    {
        $str = 'azertyuiopqsdfghjklmwxcvbn1234567890AZERTYUIOPQSDFGHJKLMWXCVBN';
        // On transforme la chaine de caractère en tableau
        $tab = str_split($str);
        // On génère la longueur du mot de passe entre 12 et 16
        $long = rand(12,16);
        // On fait une boucle sur la longueur du mdp
        $mdp = '';
        for($i=0;$i<$long;$i++)
        {
            // on ajoute les caractères au hasard avec array_rand
            $str_rand = array_rand($tab);
            $mdp.= $tab[$str_rand];
        }
        return $mdp;
    }
    // methode pour s'inscrire
    public function inscrire()
    {
        global $db;
        // on vérifie si le client n'est pas déjà inscrit dans la bdd
        $req = $db->prepare('SELECT ID FROM `utilisateurs` WHERE email = :email');
        $req->bindParam(':email',$this->email,PDO::PARAM_STR);
        $req->execute();
        // s'il n'y a pas de ligne retourné
        if($req->rowCount() == 0)
        {
            // on va insérer l'utilisateur dans la base
            $req2 = $db->prepare('INSERT INTO `utilisateurs` SET 
                                    nom = :nom,
                                    prenom = :prenom,
                                    email = :email,
                                    password = :password,
                                    telephone = :telephone,
                                    type_compte = :type_compte
            ');
            $req2->bindValue(':nom',$this->nom,PDO::PARAM_STR);
            $req2->bindValue('prenom',$this->prenom,PDO::PARAM_STR);
            $req2->bindValue('email',$this->email,PDO::PARAM_STR);
            $req2->bindValue('password',$this->password,PDO::PARAM_STR);
            $req2->bindValue('telephone',$this->telephone,PDO::PARAM_STR);
            $req2->bindValue('type_compte',$this->type_compte,PDO::PARAM_STR);
            if($req2->execute())
            {
                $last_id = $db->lastInsertId();
                return $last_id;
            }
            else
            {
                return false;
            }

        }
        else
        {
            return false;
        }
    }
    // methode pour la connexion
    public static function getConnexion($email='',$password='')
    {
        global $db;
        $req = null;

        
        // on vérifie si l'email et le mot de passe sont enregistré
        if($email && $password)
        {
            $req = $db->prepare('SELECT ID password FROM `utilisateurs` WHERE email = :email AND password = :password');
            $req->bindParam(':email',$email,PDO::PARAM_STR);
            $req->bindParam(':password',$password,PDO::PARAM_STR);
        }
        // sinon on vérifie avec les cookies
        elseif(!empty($_COOKIE['id']) && !empty($_COOKIE['password']))
        {
            $req = $db->prepare('SELECT ID password FROM `utilisateurs` WHERE ID = :id AND password = :password');
            $req->bindParam(':id',$_COOKIE['id'],PDO::PARAM_STR);
            $req->bindParam(':password',$_COOKIE['password'],PDO::PARAM_STR);
        }


        if(isset($req) && $req->execute())
        {
            // si on a bien un utilisateur
            if($req->rowCount() == 1)
            {
                $obj = $req->fetch(PDO::FETCH_OBJ);
                $_SESSION['connect'] = 1;
                setcookie('id',$obj->ID,(time()+86400));
                setcookie('password',$obj->password,(time()+86400));
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    
} 

