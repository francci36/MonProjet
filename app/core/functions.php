<?php
function verifAdmin($email='',$password='',$remember='')
{
    global $db;
    // On vérifie si $email et $password sont renseigné
    if(!empty($email) && !empty($password))
    {
        $verif = $db->prepare('SELECT * FROM `admin` WHERE Admin_Email = :email AND Admin_Password = :password');
        $verif->bindParam(':email',$email,PDO::PARAM_STR);
        $verif->bindParam(':password',sha1(md5($password)),PDO::PARAM_STR);
    }
    // on vérifie les cookies
    else
    {
        $verif = $db->prepare('SELECT * FROM `Admin` WHERE Admin_ID = :id AND Admin_Password = :password');
        $verif->bindParam(':id',$_COOKIE['id'],PDO::PARAM_INT);
        $verif->bindParam(':password',$_COOKIE['password'],PDO::PARAM_STR);
    }
    $verif->execute();
    // On vérifie qu'un utilisateur est bien retourné
    if($verif->rowCount() == 1)
    {
        // On créer ou update les cookies en vérifiant si remember est coché
        $admin = $verif->fetch(PDO::FETCH_OBJ);
        if($remember == 1){
            // Si remember est coché alors le cookie est valable 24h
            $time = (time()+86400);
            //$time = (time()+60*60*24);
        } 
        else{
            // Sinon le cookie est valable 1h
            $time = (time()+3600);
        } 
        setcookie('id',$admin->Admin_ID,$time);
        setcookie('password',$admin->Admin_Password,$time);
        $_SESSION['admin'] = 1;
        return true;
    }
    else
    {
        return false;
    }
}
function generateToken()
{
    // Chaine de caractères pour le token
    $ch = 'azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBN&é(-è_çà)]}{[|#&';
    // On transforme la chaîne de caractère en tableau avec str_split()
    $ch = str_split($ch);
    // On définit une longueur de token comprise entre 17 et 25
    $lg = rand(17,25);
    // On initialise la variable token
    $token = '';
    // On boucle jusqu'à la valeur de lg
    for($i=0;$i<=$lg;$i++)
    {
        // On sélectionne une clé de tableau entre 0 et le nombre d'occurence de $ch
        $c = rand(0,count($ch)-1);
        // On retourne le caractère
        $token.= $ch[$c];
    }
    return $token;

}