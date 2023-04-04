<?php
require_once('config.php');
var_dump();
// Initialiser les variables avec des valeurs vides
$name = $lastname = $email = $telephone = $type_compte = $date_heure = "";
$name_err = $lastname_err = $email_err = $telephone_err = $type_compte_err = $date_heure_err = "";

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Valider le champ Nom
    if(empty(trim($_POST["name"]))){
        $name_err = "Veuillez entrer votre nom.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Valider le champ Prénom
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Veuillez entrer votre prénom.";
    } else{
        $lastname = trim($_POST["lastname"]);
    }

    // Valider le champ Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre adresse email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Valider le champ Numéro de téléphone
    if(empty(trim($_POST["telephone"]))){
        $telephone_err = "Veuillez entrer votre numéro de téléphone.";
    } else{
        $telephone = trim($_POST["telephone"]);
    }

    // Valider le champ Type de compte
    if(empty(trim($_POST["type_compte"]))){
        $type_compte_err = "Veuillez sélectionner un type de compte.";
    } else{
        $type_compte = trim($_POST["type_compte"]);
    }

    // Valider le champ Date et heure de rendez-vous
    if(empty(trim($_POST["date_heure"]))){
        $date_heure_err = "Veuillez sélectionner une date et une heure de rendez-vous.";
    } else{
        $date_heure = trim($_POST["date_heure"]);
    }

    // Si tous les champs sont valides, on peut insérer les données dans la base de données
    if(empty($name_err) && empty($lastname_err) && empty($email_err) && empty($telephone_err) && empty($type_compte_err) && empty($date_heure_err))
    {

        // requête SQL pour insérer les données dans la base de données
        $sql = "INSERT INTO rendez_vous (utilisateur_name, utilisateur_lastName, utilisateur_email, utilisateur_telephone, type_compte, date_heure_rendez_vous) VALUES ('$name', '$lastname', '$email', '$telephone', '$type_compte', '$date_heure')";

        // exécuter la requête SQL
        if(mysqli_query($conn, $sql)){

            // message de confirmation pour l'utilisateur
            echo "Votre rendez-vous a été pris avec succès.";

            // envoyer un e-mail de confirmation
            $to = $email;
            $subject = "Confirmation de rendez-vous";
            $message = "Bonjour $name $lastname, 
            Nous vous confirmons la prise de rendez-vous pour le $date_heure. 
            Cordialement, 
            L'équipe de notre entreprise.";

            $headers = "From: webmaster@example.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);
        } else{
            echo "Erreur : " . mysqli_error($conn);
        }
      
        // fermer la connexion à la base
      }
    }
// fermer la connexion à la base de données
mysqli_close($conn);
    
?>
