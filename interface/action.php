<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../app/app-rdvtherapeute.php');
require_once('../app/core/functions.php');
global $oAppRDV;


switch($_GET['e'])
{
    case 'inscription' : 

        // on vérifie de quel formulaire il s'agit
        if (isset($_POST['form_name']) && $_POST['form_name'] == 'signup-form') {

            if (isset($_POST['nom']) 
                    && isset($_POST['prenom']) 
                    && isset($_POST['email']) 
                    && isset($_POST['telephone']) 
                    && isset($_POST['type_compte']) 
                    && isset($_POST['password'])
                    && isset($_POST['password2'])) {
                        
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];
                $type_compte = $_POST['type_compte'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
            
                // Vérifier si les deux mots de passe sont identiques
                if ($password == $password2) {
                    // Hacher le mot de passe avant de l'enregistrer dans la base de données
                    $hashed_password = $password; // bug password_hash($password, PASSWORD_DEFAULT);
            

                    if ($oAppRDV->create_user($nom, $prenom, $email, $telephone, $type_compte, $hashed_password)) {
                        echo "utilisateur créé avec succès";
                    } else {
                        echo "Erreur lors de la création de l'utilisateur";
                    }
                } else {
                    // Afficher un message d'erreur si les mots de passe ne correspondent pas
                    echo "Les mots de passe ne correspondent pas.";
                }     
            }
            
            $message = "Inscription réussie";
            header('location:../index.php?msg='.urlencode($message));
            exit;
        }
        break;

        case 'login':
            // on vérifie si le mail ou le mot de passe sont valides
            if (isset($_POST['form_name']) && $_POST['form_name'] == 'login-form') {
                if (!empty($_POST['login_email']) && !empty($_POST['login_password'])) {
                    $verif_connect = Utilisateurs::getConnexion($_POST['login_email'], $_POST['login_password']);
                    // Si verif connect nous retourne un client
                    if ($verif_connect) {
                        // On redirige vers la page index
                        $_SESSION['user_connected'] = true;
                        header('Location: ../index.php');
                        exit;
                    } else {
                        $message = 'Login et/ou mot de passe incorrect';
                    }
                } else {
                    $message = "Veuillez renseigner un login et un mot de passe";
                }
                header('Location: ../index.php?message='.urlencode($message));
                exit;
            }
            break;
        

    case 'logout' :
        // Détruire les variables de session pour l'utilisateur connecté
        session_unset();
        session_destroy();
        // Rediriger vers la page de connexion
        header('location:../connexion.html');
        exit;
        break;

    default :
        // Rediriger vers la page d'accueil si aucune action n'est spécifiée
        header('location:../index.php');
        exit;




            case 'printuser':

        // On vérifie que l'id de l'user est bien passé
        if(!empty($_GET['userid']))
        {
            $req = $db->prepare('SELECT * FROM `utilisateurs` WHERE ID = :id');
            $req->BindParam(':id',$_GET['userid'],PDO::PARAM_INT);
            $req->execute();
            // On vérifie si on a bien un utilisateur de retourné
            if($req->rowCount() == 1)
            {
                $user = $req->fetch(PDO::FETCH_OBJ);
                // On envoie en json les données
                echo json_encode($user);
            }
            else
            {
                // Si aucun utilisateur n'est retourné
                echo '{}';
            }
           
        }
        else
        {
            echo '{}';
        }

    break;


    case 'ajoutUser':

       // On vérifie si la variable $_POST['action'] existe et qu'elle vaut 'ajoutUser'
    if(isset($_POST['action']) && $_POST['action'] === 'ajoutUser') {
    if(!verifAdmin()) {
        // Si l'utilisateur n'est pas admin, on arrête l'exécution du code
        exit;
    }
    // On enlève le point-virgule qui est inutile et qui empêche l'exécution du code suivant
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['type_compte']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
        $verif = $db->prepare('SELECT ID FROM `utilisateurs` WHERE email = :email');
        $verif->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
        $verif->execute();
        // On vérifie si la requête nous retourne aucun résultat
        if($verif->rowCount() == 0) {
            // Si pas d'utilisateur avec cette adresse email, on l'enregistre
            $user_rec = $db->prepare('INSERT INTO `utilisateurs` SET
                                    nom     = :nom,
                                    prenom   = :prenom,
                                    email    = :email,
                                    telephone = :telephone,
                                    type_compte = :type_compte,
                                    password = :password
                                    '); // Il manquait un champ à la fin de la requête
            $user_rec->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
            $user_rec->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
            $user_rec->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
            $user_rec->bindValue(':telephone',$_POST['telephone'],PDO::PARAM_STR);
            $user_rec->bindValue(':type_compte',$_POST['type_compte'],PDO::PARAM_STR);
            $user_rec->bindValue(':password',sha1(md5($_POST['password'])),PDO::PARAM_STR);
            if($user_rec->execute()) {
                $message = 'Utilisateur enregistré avec succès';
            } else {
                // En cas d'erreur, on enregistre les données du formulaire en session pour les récupérer plus tard
                $_SESSION['signup-form'] = serialize($_POST);
                $message = 'Erreur lors de la création';
            }                   
        } else {
            $_SESSION['signup-form'] = serialize($_POST);
            $message = 'Cette adresse email est déjà enregistrée';
        }
    } else {
        $_SESSION['signup-form'] = serialize($_POST);
        $message = 'Veuillez remplir tous les champs';
    }
} else {
    $_SESSION['signup-form'] = serialize($_POST);
    $message = 'Action non autorisée';
}

// On redirige vers la page d'accueil avec le message en paramètre d'URL
header('location:../index.php?message='.urlencode($message));
exit;


    break;

    case 'deluser':

        if(!verifAdmin()) exit;
        if(!empty($_GET['id']))
        {
            $del_user = $db->prepare('DELETE FROM `utilisateurs` WHERE ID = :id');
            $del_user->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
            if($del_user->execute())
            {
                $message = 'Utilisateur supprimé avec succès !!';
            }
            else
            {
                $message = "Erreur lors de la suppression de l'utilisateur";
            }
        }
        else
        {
            $message = "vous n'êtes pas sensé être connecté !!!";
        }
        header('location:../index.php?message='.urlencode($message));
        exit;

    break;
    

    case 'ajoutRendez_vous':

        if(!verifAdmin()) {
            exit;
        }
    
        if(!empty($_POST['date']) && !empty($_POST['heure'])) {
            $rdv_add = $db->prepare('INSERT INTO `rendez_vous` SET date = :date, heure = :heure');
            $rdv_add->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $rdv_add->bindValue(':heure', $_POST['heure'], PDO::PARAM_STR);
    
            if($rdv_add->execute()) {
                $message = 'Rendez-vous ajouté avec succès';
            } else {
                $_SESSION['form-signin'] = serialize($_POST);
                $message = "Une erreur est survenue lors de l'ajout du rendez-vous";
            }
        } else {
            $message = 'Vous devez indiquer la date et l\'heure du rendez-vous';
        }
    
        header('location:../agendamento.php?message=' . urlencode($message));
        exit;
    
        break;
    

    case 'delRendez_vous':

        if(!verifAdmin()) exit;
        if(!empty($_GET['id']))
        {
            $rdv_del = $db->prepare('DELETE FROM `rendez_vous` WHERE ID = :id');
            $rdv_del->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
            if($rdv_del->execute())
            {
                $message = 'rendez-vous supprimé avec succès';
            }
            else
            {
                $message = "Erreur lors de la suppression du rendez-vous";
            }
        }
        else
        {
            $message = "l'id du rendez-vous n'a pas été fourni";
        }
        header('location:../agendamento.php?message='.urlencode($message));
        exit;
    break;
}

//
//
//


//vieux code
// ...