<?php
session_start();

require_once('../app/classe.apprdvtherapeute.php');

global $oAppRDV;


// Rappel = qd je demande oUserConnected, je demande une REFERENCE & de l'objet
$oUser = $oAppRDV->get_UserConnected();


// est une requête envoyé par le code JS pour vérifier l'email ?
if( isset($_GET['check-email']) && isset($_GET['email'])  ) {
    
    $email = $_GET['email'];

    // vérifions que email est bien un email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Retourner une réponse JSON avec false
        echo json_encode(false);
        exit;
    }


    // vérifier si l'email est unique
    if( $oUser->check_email_not_used($email) == false ) {
        // retourner false 
        echo json_encode(false);
        exit;
    }


    // email valide, retourne true
    echo json_encode(true);
    exit;

}
// on vérifie que le formulaire a été envoyé
elseif( isset($_POST['form_name']) ) {


    // on vérifie que le formulaire est le formulaire de connexion
    if( $_POST['form_name'] == 'login-form' ) {
        // on vérifie que les champs ont été remplis
        if( isset($_POST['login_email']) && isset($_POST['login_password']) ) {
            // on récupère les données du formulaire
            $email = $_POST['login_email'];
            $password = $_POST['login_password'];

            if( $oUser->is_connected() ) {
                echo "Vous êtes déjà connecté. Merci de vous déconnecter ".$oUser->getNom(). " ". $oUser->getPrenom(). " :)";
                $oAppRDV->save_to_session();
                header('Location: ../views/client.php');
                return;
            }

            // on tente de se connecter avec les identifiants fournis
            $result = $oUser->login($email, $password);
            // si la connexion a réussi
            if( $result ) {
                $oAppRDV->save_to_session();

                // on redirige l'utilisateur vers la page d'accueil
                header('Location: ../views/client.php');
            } else {
                // si la connexion a échoué, on affiche un message d'erreur
                echo 'Erreur: identifiants incorrects';
                $oAppRDV->save_to_session();
                header('Location: /');
            }
        } else {
            // si les champs n'ont pas été remplis, on affiche un message d'erreur
            echo 'Erreur: tous les champs doivent être remplis';
            $oAppRDV->save_to_session();
            header('Location: /');
        }
    }
    // on vérifie que le formulaire est le formulaire d'inscription
    elseif( $_POST['form_name'] == 'signup-form' ) {
        // on vérifie que les champs ont été remplis
        if( isset($_POST['nom'])
                 && isset($_POST['prenom']) 
                 && isset($_POST['email']) 
                 && isset($_POST['password']) 
                 && isset($_POST['password2']) 
                 && isset($_POST['telephone']) 
                /* && isset($_POST['type_compte'])*/ ) {

            // on récupère les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $telephone = $_POST['telephone'];
            $type_compte = 'Client'; //$_POST['type_compte'];
           
            
            // vérifier si l'email est unique
            if( $oUser->check_email_not_used($email) == false ) {
                echo "Erreur: impossible de créer votre compte car l'email est déjà utilisé";
                header('Location: /');
                return;
            }

            $r = $oUser->createUser($nom, $prenom, $email, $password, $telephone, $type_compte);

            if( $r && $oUser->is_connected() ) {
                echo "Votre compte utilisateur a bien été crée avec succès ";

                $oAppRDV->save_to_session();
                header('Location: /');
                return;
            }else {

                // erreur créa compte
                header('Location: /');
            }


        } else {
            // si les champs n'ont pas été remplis, on affiche un message d'erreur
            echo 'Erreur: tous les champs doivent être remplis';
            header('Location: /');
        }


      
    }
   
}





 