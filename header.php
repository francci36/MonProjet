<!-- <div class="container"> <header class="d-flex flex-wrap justify-content
py-3 mb-4 border-bottom"> <a href="" class="d-flex align-items-center mb3
mb-md-0 me-md-auto text-dark text-decoration-none"> <svg class="bi me-2"
width="40" height="32"> <use xlink:href="#bootstrap"></use> </svg> <span
class="f-s4">simple header</span> </a> <ul class="nav nav-pills"> <li
class="nav-item"><a href="#" class="nav-link active"
aria-current="page">Acueille</a></li> <li class="nav-item"><a href="#"
class="nav-link">Présentation</a></li> <li class="nav-item"><a href="#"
class="nav-link">Blog</a></li> <li class="nav-item"><a href="#"
class="nav-link">Newsletter</a></li> <li class="nav-item"><a href="#"
class="nav-link">Rdv</a></li> </ul> </header> </div> <div
class="b-example-divider"></div> <div class="container"> <header class="d-flex
justify-content-center py-3"> <ul class="nav nav-pills"> <li class="nav-item"><a
href="#" class="nav-link active" aria-current="page">Acueille</a></li> <li
class="nav-item"><a href="#" class="nav-link">Présentation</a></li> <li
class="nav-item"><a href="#" class="nav-link">Blog</a></li> <li
class="nav-item"><a href="#" class="nav-link">Newsletter</a></li> <li
class="nav-item"><a href="#" class="nav-link">Rdv</a></li> </ul> <div
class="col-md-3 text-end"> <button class="btn
btn-outline-primary">Login</button> <button class="btn
btn-primary">Sign-up</button> </div> </header> </div> <div
class="b-example-divider"></div> <header class="p-3 text-bg-dark"> <div
class="container"> <div class="d-flex flex-wrap align-items-center
justify-content-center justify-content-lg-start"> <a href="" class="d-flex
align-items-center mb-2 mb-lg-0 text-white text-decoration-none"> <svg class="bi
me-2" width="40" height="32" role="img" aria-label="bootstrap"> <use
xlink:href="bootstrap"></use> </svg> </a> <ul class="nav col-12 col-lg-auto
me-lg-auto mb-2 justify-content-center mb-md-0"> <li><a href="#" class="nav-link
px-2 text-secondary">Accueil</a></li> <li><a href="#" class="nav-link px-2
text-white">Présentation</a></li> <li><a href="#" class="nav-link px-2
text-white">Blog</a></li> <li><a href="#" class="nav-link px-2
text-white">Newsletter</a></li> <li><a href="#" class="nav-link px-2
text-white">Rdv</a></li> </ul> <form action="" class="col-12 col-lg-auto mb-3
mb-lg-0 me-lg-3"> <input type="search" class="form-control form-control-dark
text-bg-dark" placeholder="recherche" aria-label="recherche"> </form> <div
class="text-end"> <button type="button" class="btn btn-outline-light
me-2">login</button> <button type="buttom" class="btn
btn-warning">Sign-up</button> </div> </div> </div> </header> <div
class="b-example-divider"></div> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Mon site</title>
    </head>
    <body>
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
                    <ul
                        class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li>
                            <a
                                href="index.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/index.php'); ?>nav-link  px-2 link-dark">Sobre mim</a>
                        </li>
                        <li>
                            <a
                                href="blog.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/blog.php'); ?>nav-link px-2 link-dark ">Blog</a>
                        </li>
                        <li>
                            <a
                                href="newsletter.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/newsletter.php'); ?>nav-link px-2 link-dark">Newsletter</a>
                        </li>
                        <li>
                            <a
                                href="agendamento.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/agendamento.php'); ?>nav-link px-2 link-dark">Agendamento</a>
                        </li>
                        <li>
                            <a
                                href="login.php"
                                class="<?php echo ($_SERVER['PHP_SELF'] == '/login.php'); ?>nav-link px-2 link-dark">Login</a>
                        </li>

                    </ul>
                    <!-- Ici je crée le formulaire avec un input pour une zonne de recherche -->
                    <form action="" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input
                            type="search"
                            class="form-control "
                            placeholder="recherche"
                            aria-label="recherche"></form>
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
                        <ul class="dropdown-menu text-small">
                            <li>
                                <a href="#" class="dropdown-item">Novo projeto</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Configurações</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Perfil</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider"></li>
                            <li>
                                <a href="#" class="dropdown-item">Sair</a>
                            </li>
                        </ul>
                    </div>
                        <?php
                            if($_SESSION['utilisateurs'])
                            {
                                echo '<a class="link" href="deconnexion.php">Déconnexion</a>';
                            }
                        ?>
                </div>
            </div>
        </header>