<?php
// inclusion du fichier db-inc.php
require('db-inc.php');
// on verifie si le formulaire a été soumis
if(isset($_POST['submit']))
{
    // on verifie si les champs email et password ne sont pas vides
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        // on fait une requête pour récupérer l'utilisateur correspondant à l'email et l'utilisateur rentrant
        $utilisateurs = $db->prepare('SELECT `id` FROM `utilisateur` WHERE `email` = :email AND `password`= :password');
        $utilisateurs->execute(array(':email' => $_POST['email'], ':password' => sha1($_POST['password'])));
        
        // vérification si la requête a envoyé un seul utilisateur
        if ($utilisateurs->rowCount() == 1) {
            // on récupère l'objet utilisateur
            $utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ);
            // on stock l'id de l'utilisateur en session
            $_SESSION['utilisateur_id'] = $utilisateur->id;
            //on redirectionne vers la page d'accueil
            header('location:index.php');
            exit();
        } 
    }
}

// require('db-inc.php');
// // on verifie si le formulaire a été soumis
// if(isset($_POST['submit']))
// {
//     // on verifie si les champs email et password non sont pas vide
//     if(!empty($_POST['email']) && !empty($_POST['password']))
//     {
//         // on fait une requête pour récupérer l'utilisateur correspondant à l'email et l'utilisateur rentrant
//         $utilisateurs = $db->query('SELECT `id` FROM `utilisateur` WHERE `email` = "'.$_POST['email'].'" AND `password`="'.sha1($_POST['password']).'"');
//         // vérification si la requête a envoyé un seul utilisateur
//         if ($utilisateurs->rowCount() == 1) {
//             // on récupère l'objet utlisateur
//             $utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ);
//             // on stock l'id de l'utilisateur en session
//             $_SESSION['utilissateur'] = $utilisateur->utilisateur_id;
//             //on redirectionne vers la page d'accueil
//             header('location:index.php');
//         } 
//     }
// }