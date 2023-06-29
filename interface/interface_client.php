<?php
session_start();

require_once('../app/classe.apprdvtherapeute.php');

global $oAppRDV;

// on vérifie que le formulaire est le formulaire de rendez-vous
// Rappel = qd je demande oUserConnected, je demande une REFERENCE & de l'objet
$oUser = null;
$oUser = $oAppRDV->get_UserConnected();


if(!$oUser->is_connected()){
    header('Location: /');
    exit;
}
// on vérifie que le formulaire est le formulaire de rendez-vous
if( !isset($_POST['form_name']) 
            || $_POST['form_name'] != 'rendez_vous-form'  ) {
       
    echo 'Erreur: le formulaire n\'a pas été envoyé';
    // faire la redirection vers la page d'accueil
    header('Location: ../views/client.php');
}

switch($_POST['actionQuery']){
    case 'createRdv' :
        $oRdv = new RT_Rdv();
        $date = $_POST['date'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];
        $oRdv->createRdv($date, $heure_debut, $heure_fin, $oUser);
        break;

    case 'updateRdv':
        $idRdv = $_POST['idRdv'];
        $oAgenda = $oAppRDV->get_Agenda();
        $oRDV = $oAgenda->getRDVById($idRdv);
        if ($oRDV) {
            $date = $_POST['date'];
            $heure_debut = $_POST['heure_debut'];
            $heure_fin = $_POST['heure_fin'];
            $oRDV->updateRdv($date, $heure_debut, $heure_fin, $oUser);
        }
        break;
    
    case 'deleteRdv':
        $idRdv = $_POST['idRdv'];
        $oAgenda = $oAppRDV->get_Agenda();
        $oRDV = $oAgenda->getRDVById($idRdv);

        if ($oRDV && $oRDV->getUserId() == $oUser->getId()) {
            $oRDV->deleteRdv();
        }
        break;
}

header('Location: ../views/client.php');
exit;