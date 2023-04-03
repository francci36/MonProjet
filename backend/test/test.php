<?php
require_once 'classe.utilisateur.php'; 

$utilisateur = new utilisateur();
$utilisateur->setNom("Dupont");
$utilisateur->setPrenom("Jean");
$utilisateur->setEmail("jean.dupont@example.com");
$utilisateur->setPassword("monmotdepasse");
$utilisateur->setTelephone("555-1234");
$utilisateur->setType_compte("client");
$utilisateur->setInscription_date("06-05-2022");

// Ensuite, insérez l'utilisateur dans la base de données avec une requête SQL INSERT
$rq = $db->prepare("INSERT INTO utilisateur (nom, prenom, email, password, telephone, type_compte, inscription_date) VALUES (:nom, :prenom, :email, :password, :telephone, :type_compte, :inscription_date)");
$rq->bindParam(':nom', $utilisateur->getNom());
$rq->bindParam(':prenom', $utilisateur->getPrenom());
$rq->bindParam(':email', $utilisateur->getEmail());
$rq->bindParam(':telephone', $utilisateur->getTelephone());
$password_crypte = password_sha1($utilisateur->getPassword(), PASSWORD_DEFAULT);
$rq->bindParam(':password', $password_crypte);

$rq->bindParam(':type_compte', $utilisateur->getType_compte());
$rq->bindParam(':inscription_date', $utilisateur->getInscription_date());

$rq->execute();

// Récupérer l'ID de l'utilisateur inséré
$utilisateur_id = $db->lastInsertId();

require_once 'classe.rendezVous.php'; 

$rendezVous = new rendezVous();
$rendezVous->setDate("26/06/2023");
$rendezVous->setHeure("14:30:00");
$rendezVous->setUtilisateurId($utilisateur_id);
$rendezVous->setEtat("en cours");

// Insérer un nouveau rendez-vous
$rq = $db->prepare("INSERT INTO rendez_vous (date, heure, utilisateur_id, etat) VALUES (:date, :heure, :utilisateur_id, :etat)");
$rq->bindParam(':date', $rendezVous->getDate());
$rq->bindParam(':heure', $rendezVous->getHeure());
$rq->bindParam(':utilisateur_id', $rendezVous->getUtilisateurId());
$rq->bindParam(':etat', $rendezVous->getEtat());
$rq->execute();

// Créez un nouvel objet RendezVous
$rendezVous = new rendezVous();

// Configurez les propriétés du rendez-vous
$rendezVous->setDate("26/06/2023");
$rendezVous->setHeure("14:30:00");
$rendezVous->setUtilisateurId($utilisateur_id);
$rendezVous->setEtat("en cours");

// Insérez le rendez-vous dans la base de données avec une requête SQL INSERT
$rq = $db->prepare("INSERT INTO rendez_vous (date, heure, utilisateur_id, etat) VALUES (:date, :heure, :utilisateur_id, :etat)");
$rq->bindParam(':date', $rendezVous->getDate());
$rq->bindParam(':heure', $rendezVous->getHeure());
$rq->bindParam(':utilisateur_id', $utilisateur_id());
$rq->bindParam(':etat', $rendezVous->getEtat());
$rq->execute();

// Récupérer l'ID du rendez-vous inséré
$rendezVous_id = $db->lastInsertId();

// Mettre à jour l'utilisateur avec l'ID du rendez-vous
$rq = $db->prepare("UPDATE utilisateur SET rendez_vous_id = :rendezVous_id WHERE id = :id");
$rq->bindParam(':rendezVous_id', $rendezVous_id);
$rq->bindParam(':id', $utilisateur_id);
$rq->execute();

// Afficher un message de succès
echo "Le rendez-vous a été ajouté avec succès !";
// Fermer la connexion à la base de données
$db = null;
