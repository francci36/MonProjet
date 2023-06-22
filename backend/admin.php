<?php
session_start();
require_once('../app/config.php');

require_once('../app/classe.apprdvtherapeute.php');

// je récupère l'instance courante de l'application
$oAppRDV = RT_AppRDVTherapeute::instance();
// je demande à l'application de me renvoyer l'utilisateur eventuellement connecté
$oUser = $oAppRDV->get_UserConnected();
$oAgenda = $oAppRDV->get_Agenda();


// securité
// si l'utilisateur n'est pas connecté ou n'est pas admin, redirection vers la page d'accueil
if(!$oUser->is_connected() || !$oUser->isAdmin()) {
   header('Location: /');
   exit;
}
//je construit ma page
require_once('../header.php'); // j'affiche le header



// affiche la liste des patients avec tous leurs rendez-vous
if( !$oUser->isAdmin() ) {
    header('Location: /');
    exit;
}

?>


<div class="container">
    <h1>Bonjour admin <?php echo $oUser->getPrenom() ?> !</h1>

</div>

<?php
// lister tous les rdv
    $aListeRdv = $oAgenda->getAllRDV();

    if(count($aListeRdv) > 0) {
        echo '<div class="container">';
        echo '<h2>Liste de tous les rendez-vous :</h2>';
        echo '<ul class="liste-rdv">';
        foreach($aListeRdv as $oRdv) {
            
            echo '<div>';
            echo '<li>Rendez-vous numero' . ' ' . $oRdv->getId() . ' du ' .$oRdv->getDate(). ' de ' . $oRdv->getHeureDebut() . ' à '.$oRdv->getHeureFin().'</li>';
            $oPatient = $oRdv->getPatient();
            
            echo '<p>' . $oPatient->getNom() . ' ' . $oPatient->getPrenom() . '</p>'
                    . ' <a href="#" onclick="updateRdv('.$oRdv->getId().');">Modifier</a> '
                    . '- <a href="#" onclick="supprimeRdv ('.$oRdv->getId().');">Supprimer</a></li>';  

            ?>


              <!-- Formulaire de modification et suppression-->
                <div id="update-form-<?php echo $oRdv->getId(); ?>" style="display:none;">
                    <form method="post" action="../interface/interface_admin.php">
                        <h2 id="formTitle">Modifiez votre rendez-vous</h2>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" value="<?php echo $oRdv->getDate(); ?>" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="heure_debut">Heure de début:</label>
                            <input type="time" value="<?php echo $oRdv->getHeureDebut(); ?>" class="form-control" id="heure_debut" name="heure_debut" required>
                        </div>
                        <div class="form-group">
                            <label for="heure_fin">Heure de fin:</label>
                            <input type="time" value="<?php echo $oRdv->getHeureFin(); ?>" class="form-control" id="heure_fin" name="heure_fin" required>
                        </div>
                        
                        <button id="btnEdit" type="submit" class="btn btn-primary">Modifier le rdv</button>
                        <button id="btnCancel-<?php echo $oRdv->getId(); ?>" type="button" class="btn btn-primary" onclick="hideForm('update-form-<?php echo $oRdv->getId(); ?>')">Annuler</button>
                        
                        <input type="hidden" id="idRdv" name="idRdv" value="<?php echo $oRdv->getId(); ?>">
                        <input type="hidden" name="actionQuery" value="updateRdv">
                        <input type="hidden" name="form_name" value="update-form">
                    </form>
                </div>


                <div id="delete-form-<?php echo $oRdv->getId(); ?>" style="display:none;">
                    <form method="post" action="../interface/interface_admin.php">
                        <button id="btnDelete" type="submit" class="btn btn-primary">Confirmer la suppression de ce RDV</button>
                        <button id="btnCancel-<?php echo $oRdv->getId(); ?>" type="button" class="btn btn-primary" onclick="hideForm('delete-form-<?php echo $oRdv->getId(); ?>')">Annuler</button>
                        <input hidden  id="fd_idRdv" name="idRdv" value="<?php echo $oRdv->getId(); ?>" type="text">
                        <input hidden name="actionQuery" id="fd_actionQuery" value="deleteRdv" type="text">
                        <input hidden name="form_name" value="delete-form">
                    </form>

                </div>

            <?php
            echo '</div>';
        }
    } else {
        echo '<p>Aucun rendez-vous enregistré pour le moment.</p>';
    }
     echo '</ul>';
        echo '</div>';


require_once('../footer.php'); // j'affiche le footer

?>


<!-- block js -->
<script >
        function hideForm( form ) {
        document.getElementById(form).style.display = 'none';
    }

    function updateRdv(id) {
        
        document.getElementById('update-form-'+id).style.display = 'block';
        document.getElementById('delete-form-'+id).style.display = 'none';
        
    }

    function supprimeRdv(id) {
        
        //document.getElementById('btnEdit').innerHTML = "Je confirme la suppression de ce rdv";
        document.getElementById('delete-form-'+id).style.display = 'block';
        document.getElementById('update-form-'+id).style.display = 'none';
    }
</script>