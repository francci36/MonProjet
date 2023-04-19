<?php
require('config.php');
// verification si le formulaire a été soumis
if(isset($_POST['submit']))
{
    // verifier si les champs ne sont pas vides
    if(!empty($_POST['name']) && !empty($_POST['lastname'])  && !empty($_POST['email'])  && !empty($_POST['telephone'])  && !empty($_POST['type_compte'])  && !empty($_POST['date_heure'])  && !empty($_POST['lastname']))
    {
        // requête pour récupérer les informations du formulaire
        $utilisateur = $db->query('SELECT utilisateur_id FROM `utilisateur` WHERE `utilisateur_name` ="'.$_POST['name'].'" AND `utilisateur_lastName` ="'.$_POST['lastname'].'" AND `utilisateur_email` ="'.$_POST['email'].'" AND `utilisateur_telephone` ="'.$_POST['telephone'].'" AND `type_compte` ="'.$_POST['type_compte'].'"');
        // verification si la requête a renvoyé un seul utilisateur
        if($utilisateurs->rowCount() == 1)
        {
            // on récupère l'objet utilisateur
            $utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ);
            // stockage de l'id de l'utilisateur en session
            $_SESSION['utilisaateurs'] = $utilisateur->utilisateurs_id;
            // redirection vers la page d'acceuil
            header('location:index.php');
        }
    }
}