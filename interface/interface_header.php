<?php
session_start();

require_once('../app/classe.apprdvtherapeute.php');

global $oAppRDV;


// Rappel = qd je demande oUserConnected, je demande une REFERENCE & de l'objet
$oUser = &$oAppRDV->get_UserConnected();



/**
 * Ce fichier traite les requêtes de header.php
 */
echo 'bonjour interface_header.php <br>';



// on vérifie que le formulaire a été envoyé
if( isset($_POST['form_name']) ) {


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
                 && isset($_POST['type_compte']) ) {
            // on récupère les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $telephone = $_POST['telephone'];
            $type_compte = $_POST['type_compte'];
           
            
            $r = $oUser->createUser($nom, $prenom, $email, $password, $telephone, $type_compte);
            if( $r && $oUser->is_connected() ) {
                echo "utilisateur crée avec succèss ".$oUser->getNom(). " ". $oUser->getPrenom(). 
                                        " ". $oUser->getEmail (). "". $oUser->getPassword(). "". $oUser->getTelephone(). 
                                        " ". $oUser->getTypeCompte(). ": )";

                $oAppRDV->save_to_session();
                header('Location: /');
                return;
            }


        } else {
            // si les champs n'ont pas été remplis, on affiche un message d'erreur
            echo 'Erreur: tous les champs doivent être remplis';
            // TODO pûis quoi ensuite ?
        }


      
    }
   
}





 