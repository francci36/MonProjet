<?php
require_once('app/classe.apprdvtherapeute.php');

//global $oAppRDV;

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
        <title>Mon site</title>
    </head>
    <body>
        <!-- <a href="test.php">Test</a> -->
        <!-- ceci est une section avec une classe de marges et de bordures -->
        <header class="p-3 mb-3 border-bottom">
            <!-- Ce conteneur maintien l'allignement du contenu et la centralisation -->
            <div class="container">
                <!-- ici j'ai utilisé la disposition flexbox pour organiser les éléments -->
                <div
                    class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <!-- Je mets ici un lien avec une image pour le logo -->
                    <a
                        href="/"
                        class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-labe="bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                    <!-- Ici c'est une liste non ordonnée de liens de navigation pour les
                    différentes pages -->
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li>
                            <a
                                href="/index.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'nav-active' : ''; ?> nav-link  px-2 link-dark">Accueil</a>
                        </li>
                        <li>
                            <a
                                href="/views/blog.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/views/blog.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark ">Blog</a>
                        </li>
                        <li>
                            <?php if( $oUser->is_connected() && !$oUser->isAdmin()) : ?>
                                <a
                                    href="/views/client.php"
                                    class="<?php echo ($_SERVER['PHP_SELF'] == '/views/client.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark ">
                                Mon compte</a>
                            <?php else: 
                                $nbRdv = $oAgenda->getTotalRdv();
                                ?>
                                <a
                                    href="/backend/admin.php"
                                    class="<?php echo ($_SERVER['PHP_SELF'] == '/backend/admin.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark ">
                                Espace admin <span class="info-nb-rdv"><?php echo $nbRdv; ?></span></a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a
                                href="/views/newsletter.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/views/newsletter.php') ? 'nav-active' : ''; ?> nav-link px-2 link-dark">Newsletter</a>
                        </li>
                    </ul>
     
                    <div class="dropdown text-end">
                        <a
                            href="#"
                            class="d-block link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img
                                src="http://github.com/mdo.png"
                                alt="mdo"
                                width="32"
                                height="32"
                                class="rounded-circle"></a>

                        <ul class="dropdown-menu text-small" >
                            <?php if( $oAppRDV->get_UserConnected()->is_connected() ) : ?>

                                <li>
                                    <a id="rendez_vous-link" href="#rendez_vous.html" class="dropdown-item">Prendre rdv</a>
                                </li>
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
                        
                            <?php if( !$oAppRDV->get_UserConnected()->is_connected() ) : ?>

                                    <div id="signup-form" style="display:none;">
                                        <form method="post" action="/interface/interface_header.php?e=inscription">
                                            <label for="nom">Nom :</label>
                                            <input type="text" id="nom" name="nom"><br><br>
                                            <label for="prenom">Prénom :</label>
                                            <input type="text" id="prenom" name="prenom"><br><br>
                                            <label for="email">Email :</label>
                                            <input type="email" id="email" name="email"><br><br>
                                            <label for="telephone">Téléphone :</label>
                                            <input type="tel" id="telephone" name="telephone"><br><br>
                                            <label for="type_compte">Type de compte :</label>
                                            <select id="type_compte" name="type_compte">
                                            <option value="client">Client</option>
                                            <option value="admin">Admin</option>
                                            </select><br><br>
                                            <label for="password">Mot de passe :</label>
                                            <input type="password" id="password" name="password"><br><br>
                                            <label for="password2">confirmer Mot de passe :</label>
                                            <input type="password" id="password2" name="password2"><br><br>
                                            <input type="submit" value="S'inscrire">
                                            <!-- ce champ caché envoie l'info qu'il s'agit du formulaire signup-form -->
                                            <input hidden name="form_name" value="signup-form">
                                        </form>
                                    </div>
                                    <!-- Formulaire de connexion -->
                                    <div id="login-form" style="display:none;">
                                        <form method="post" action="/interface/interface_header.php?e=login">
                                            <label for="login_email">Email :</label>
                                            <input type="email" id="login_email" name="login_email"><br><br>
                                            <label for="login_password">Mot de passe :</label>
                                            <input type="login_password" id="login_password" name="login_password"><br><br>
                                            <input type="submit" value="Se connecter">
                                            <input hidden name="form_name" value="login-form">
                                        </form>
                                    </div>
                            <?php endif; ?>

                        
                    </div>
                        <?php
                        // si la session utilisateurs existe et qu'elle est vrai
                            if(isset($_SESSION['utilisateurs']) && $_SESSION['utilisateurs'])
                            {
                                echo '<a class="link" href="interface/interface_logout.php">Se déconnecter</a>';
                            }
                        ?>
                </div>
            </div>
            <script type="text/javascript" src="/assets/js/projet.js"></script>

        </header>
        
