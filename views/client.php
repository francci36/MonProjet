<?php
session_start();
require_once('../app/config.php');
require_once('../app/classe.apprdvtherapeute.php');

$oAppRDV = RT_AppRDVTherapeute::instance();

$oUser = $oAppRDV->get_UserConnected();
$oAgenda = $oAppRDV->get_Agenda();

if(!$oUser->is_connected()){
    header('Location: /');
    exit;
}
if( $oUser->isAdmin() ) {
    header('Location: ../backend/admin.php');
    exit;
}

require_once('../header.php');

$aListeRDVUser = $oAgenda->getAllRDV( '', $oUser );

if (empty($aListeRDVUser)) {
    echo '<div class="container">';
    echo "<p>Aucun rendez-vous à afficher</p>";
    echo "</div>";
    
} else {
    echo '<div class="container">';
    echo "<h2>Liste des rendez-vous</h2>";
    echo "<ul class='liste-rdv'>";

    foreach($aListeRDVUser as $oRDV){
        echo '<li classe="user">Rendez-vous du ' . $oRDV->getDate() . ' de ' . $oRDV->getHeureDebut() 
            . ' à ' . $oRDV->getHeureFin() 
            . ' <a href="#" onclick="updateRdv('.$oRDV->getId().',\''.$oRDV->getDate().'\',\''.$oRDV->getHeureDebut().'\',\''.$oRDV->getHeureFin().'\');">Modifier</a> '
            . '- <a href="#" onclick="supprimeRdv ('.$oRDV->getId().');">Supprimer</a></li>';    
    }
    echo "</ul>";
    echo "</div>";

}


// HTML code for the appointment booking form
?>
<div class="container">
                                <a onclick="createRdv();" href="#">Prendre un rendez-vous</a> 
                              


                                <!-- Formulaire de prise de rdv v2 -->
                                <div id="crea-update-form" style="display:none;">
                                    <form method="post" action="../interface/interface_client.php">
                                            <h2 id="formTitle">Modifiez votre rendez-vous</h2>
                                            <div class="form-group">
                                                <label for="date">Date:</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="heure_debut">Heure de début:</label>
                                                <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="heure_fin">Heure de fin:</label>
                                                <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
                                            </div>
                                            
                                        <button id="btnEdit" type="submit" class="btn btn-primary">Ajouter-Envoyer</button>
                                        <input id="idRdv" name="idRdv" value="" type="hidden">

                                        <input hidden name="actionQuery" id="actionQuery" value="" type="text">
                                        <input hidden name="form_name" value="crea-update-form">
                                    </form>
                                    <button id="btnCancel" type="" class="btn btn-primary"  onclick="hideForm('crea-update-form')">Annuler</button>
                                        
                                </div>
                                <div id="delete-form" style="display:none;">
                                    <form method="post" action="../interface/interface_client.php">
                                        <button id="btnDelete" type="submit" class="btn btn-primary">Je confirme la suppression de ce RDV</button>
                                       <input  id="fd_idRdv" name="idRdv" value="" type="hidden">
                                        <input hidden name="actionQuery" id="fd_actionQuery" value="deleteRdv" type="text">
                                        <input hidden name="form_name" value="delete-form">
                                    </form>
                                    <button id="btnCancel" type="" class="btn btn-primary" onclick="hideForm('delete-form')">Annuler</button>
                                        
                                </div>
</div>

                                <!-- block js -->
                                <script >
                                    function hideForm( form ) {
                                        document.getElementById(form).style.display = 'none';
                                    }
                                    function createRdv() {
                                        document.getElementById('crea-update-form').style.display = 'block';
                                        //document.getElementsByName('form_name')[0].value = 'crea-update-formm';
                                        document.getElementById('actionQuery').value = 'createRdv';
                                        document.getElementById('formTitle').innerHTML = "Prendre un rendez-vous avec le thérapeute";
                                        document.getElementById('btnEdit').innerHTML = "Créer le rdv";
                                    }



                                    function updateRdv(id, date, heure_debut, heure_fin) {
                                        
                                        document.getElementById('crea-update-form').style.display = 'block';
                                        document.getElementById('delete-form').style.display = 'none';
                                        let field = document.getElementById('actionQuery')
                                        field.value = 'updateRdv';

                                        document.getElementById('idRdv').value = id;
                                        

                                        document.getElementById('formTitle').innerHTML = "Modifier votre rdv du "+date+" avec Docteur";
                                        document.getElementById('date').value = date;
                                        document.getElementById('heure_debut').value = heure_debut;
                                        document.getElementById('heure_fin').value = heure_fin;
                                        //document.getElementsByName('form_name')[0].value = 'crea-update-form';
                                        document.getElementById('btnEdit').innerHTML = "Modifier le rdv";
                                    }

                                    function supprimeRdv(id) {
                                       
                                        //let field = document.getElementById('fd_actionQuery')
                                        //field.value = 'deleteRdv';

                                        let field = document.getElementById('fd_idRdv')
                                        field.value = id;

                                        //document.getElementById('btnEdit').innerHTML = "Je confirme la suppression de ce rdv";
                                        document.getElementById('delete-form').style.display = 'block';
                                        document.getElementById('crea-update-form').style.display = 'none';
                                    }
                                </script>

                                <?php
         require_once('../footer.php');
    ?>
    