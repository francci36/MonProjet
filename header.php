<?php
require_once('app/classe.apprdvtherapeute.php');

global $oAppRDV;

$oAppRDV = RT_AppRDVTherapeute::instance();

$oUser = $oAppRDV->get_UserConnected();
$oAgenda = $oAppRDV->get_Agenda();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Maria José - Thérapeute Familiale Expérimentée</title>
    <meta name="description"
        content="Maria José est une thérapeute familiale expérimentée dévouée à aider les familles à traverser les défis et à construire des relations saines et épanouissantes.">

</head>

<body>
    <!-- <a href="test.php">Test</a> -->
    <!-- ceci est une section avec une classe de marges et de bordures -->
    <header class="p-3 mb-3 border-bottom">
        <!-- Ce conteneur maintien l'allignement du contenu et la centralisation -->
        <div class="container">
            <!-- ici j'ai utilisé la disposition flexbox pour organiser les éléments -->
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <!-- Je mets ici un lien avec une image pour le logo -->
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-labe="bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <!-- Ici c'est une liste non ordonnée de liens de navigation pour les
                    différentes pages -->
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="/index.php"
                            class="<?php echo ($_SERVER['REQUEST_URI'] == '/index.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">Accueil</a>
                    </li>
                    <li>
                        <a href="/views/blog.php"
                            class="<?php echo ($_SERVER['REQUEST_URI'] == '/views/blog.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">Blog</a>
                    </li>
                    <li>
                        <a href="/views/services.php"
                            class="<?php echo ($_SERVER['REQUEST_URI'] == '/views/services.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">Services</a>
                    </li>
                    <li>
                        <?php if ($oUser->is_connected() && !$oUser->isAdmin()): ?>
                            <a href="/views/client.php"
                                class="<?php echo ($_SERVER['REQUEST_URI'] == '/views/client.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">
                                <?php echo $oUser->getPrenom() ?> - Mon compte
                            </a>
                        <?php elseif ($oUser->is_connected() && $oUser->isAdmin()):
                            $nbRdv = $oAgenda->getTotalRdv();
                            ?>
                            <a href="/backend/admin.php"
                                class="<?php echo ($_SERVER['REQUEST_URI'] == '/backend/admin.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">
                                <?php echo $oUser->getPrenom() ?> - Espace admin <span class="info-nb-rdv">
                                    <?php echo $nbRdv; ?>
                                </span>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>


                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/assets/images/family.avif" alt="mdo" width="32" height="32" class="rounded-circle"></a>


                            <!--menu déroulant-->
                    <ul class="dropdown-menu text-small">
                        <?php if ($oUser->is_connected()): ?>
                           
                                <li>
                                    <a id="logout-link" href="#" class="dropdown-item">Se déconnecter</a>
                                </li>
                            
                        <?php else: ?>
                            
                                <li>
                                    <a id="signup-link" href="#inscription.html" class="dropdown-item">S'inscrire</a>
                                </li>
                                <li>
                                    <a id="login-link" href="#connexion.html" class="dropdown-item">Se connecter</a>
                                </li>
     
                        <?php endif; ?>
                    </ul>

                    <script>
                        // Fonction exécutée lors de la soumission du formulaire s'inscrire
                        function handleSubmit(event) {
                            // Bloquer l'envoi des données par défaut
                            event.preventDefault();
                            document.getElementById('msg-error').style.display = 'none';
    
                            // vérifions que les données ont bien été saisie
                            var nom = document.getElementById('nom').value;
                            var prenom = document.getElementById('prenom').value;
                            var email = document.getElementById('email').value;
                            var telephone = document.getElementById('telephone').value;
                            var password = document.getElementById('password').value;
                            var password2 = document.getElementById('password2').value;
                            var msgError = document.getElementById('msg-error');
                            

                            if (nom === '' || prenom === '' || email === '' || telephone === '' || password === '' || password2 === '') {
                                msgError.innerHTML = 'Veuillez remplir tous les champs du formulaire.';
                                msgError.style.display = 'block';
                                return;
                            }


                            // vérifions si le mot de passe contient 5 caractères, 1 chiffre et un symbole
                            if (/^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]{5,}$/.test(password)) {
                                // Le mot de passe est valide (contient au moins 5 caractères, 1 chiffre et 1 symbole)
                            } else {
                                // Le mot de passe ne satisfait pas les critères
                                msgError.innerHTML = "Votre mot de passe n'est pas assez solide. "
                                            +"<br>Il doit contenir au moins 5 caractères, 1 chiffre et un symbole";
                                msgError.style.display = 'block';
                                document.getElementById('password').focus();
                                return;
                            }

                            // vérifions que l'email soit bien jamais utilisé
                            var email = encodeURIComponent( document.getElementById('email').value );

                            // appelons le serveur pour valider cet email
                            fetch('/interface/interface_header.php?check-email=1&email=' + email, {
                                method: 'GET'
                            })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(data) {
                                if (data === true) {
                                    // envoie du formulaire au serveur
                                    document.getElementById('signup-form').submit()

                                } else {
                                    document.getElementById('msg-error').style.display = 'block';
                                    document.getElementById('msg-error').innerHTML = "Cet e-mail est incorrecte ou déjà utilisé."
                                                    +"<br>Veuillez en choisir un autre.";

                                    var emailField = document.getElementById('email')
                                    emailField.classList.add('field-error');
                                    emailField.focus();
                                }
                            })
                            .catch(function(error) {
                                console.error('Erreur lors de la requête au serveur:', error);
                            });
                        }
                    </script>

                    <?php if ( ! $oUser->is_connected() ): ?>
                        <div id="signup-div" style="display:none;">
                            <span id="msg-error" class="info-error"></span>
                                    
                            
                            <form id="signup-form" method="post" action="/interface/interface_header.php">
                                
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom"><br><br>
                                <label for="prenom">Prénom :</label>
                                <input type="text" id="prenom" name="prenom"><br><br>
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email"><br><br>
                                <label for="telephone">Téléphone :</label>
                                <input type="tel" id="telephone" name="telephone"><br><br>
                                <!-- <label for="type_compte">Type de compte :</label>
                                <select id="type_compte" name="type_compte">
                                    <option value="client">Client</option>
                                    < !-- <option value="admin">Admin</option> -- >
                                </select><br>--> <br>
                                <label for="password">Mot de passe :</label>
                                <input type="password" id="password" name="password"><br><br>
                                <label for="password2">confirmer Mot de passe :</label>
                                <input type="password" id="password2" name="password2"><br><br>

                                <button id="btnSignup" type="submit" onclick="handleSubmit(event)" class="btn btn-primary">S'inscrire</button>
                                <!-- ce champ caché envoie l'info qu'il s'agit du formulaire signup-form -->
                                <input hidden name="form_name" value="signup-form">
                            </form>
                        </div>
                        <!-- Formulaire de connexion -->
                        <div id="login-div" style="display:none;">
                            <form method="post" action="/interface/interface_header.php">
                                <label for="login_email">Email :</label>
                                <input class="form-control" type="email" id="login_email" name="login_email"><br><br>
                                <label for="login_password">Mot de passe :</label>
                                <input class="form-control" type="login_password" id="login_password" name="login_password"><br><br>
                                
                                <button id="btnLogin" type="submit" class="btn btn-primary">Se connecter</button>
                                <input hidden name="form_name" value="login-form">
                            </form>
                        </div>
                    <?php endif; ?>



                </div>
            </div>
        </div>

    </header>