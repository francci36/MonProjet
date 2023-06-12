<?php
session_start();

require_once('../app/classe.apprdvtherapeute.php');

global $oAppRDV;

// Rappel = qd je demande oUserConnected, je demande une REFERENCE & de l'objet
$oUser = $oAppRDV->get_UserConnected();

// si user est connecté et admin
if(!$oUser->is_connected() || !$oUser->isAdmin()){
    header('Location: /');
    exit;
}

// suprimer un rendez-vous
switch($_POST['actionQuery']){
    case 'deleteRdv':
        $idRdv = $_POST['idRdv'];
        $oAgenda = $oAppRDV->get_Agenda();
        $oRDV = $oAgenda->getRDVById($idRdv);

        if ($oRDV && $oRDV->getUserId() == $oUser->getId()) {
            $oRDV->deleteRdv();
        }
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
}
header('Location: ../backend/admin.php');

