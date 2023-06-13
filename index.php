<?php
session_start();
$index = true;

// initialise moin programme

//require_once('app/config.php');
require_once('app/classe.apprdvtherapeute.php');





//
//
// Démarrons l'affichage du site web
//
require_once('header.php');
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1>Maria José - Thérapeute Familiale Expérimentée</h1>
        <!--Ceci est mon carroussel-->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="round-image-wrapper">
                        <img src="assets/images/majo.jpg" alt="Majo" class="rounded-image">
                    </div>
                    <img src="assets/images/paysage2.jpeg" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                <div class="round-image-wrapper">
                        <img src="assets/images/majo.jpg" alt="Majo" class="rounded-image">
                    </div>
                    <img src="assets/images/paysage3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <div class="round-image-wrapper">
                        <img src="assets/images/majo.jpg" alt="Majo" class="rounded-image">
                    </div>
                    <img src="assets/images/paysage4.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--c'est la fin de mon carrousel-->
        <div class="row mb-2">
            <div class="col-md-6 margin-md-6">
                <!-- <div class="card flex-md-row mb-4 shadow-sm h-md-250"> -->
                <!-- <div class="card-body d-flex flex-column align-items-start"> -->
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h2 class="mb-0">
                    <a class="text-dark" href="#">Bienvenue sur le site de Maria José - Thérapeute Familiale situé à
                        Vila Nova de Gaia</a>
                </h2>
                <div class="mb-1 text-muted">05 Mai</div>
                <p class="card-text mb-auto">Je suis Maria José, thérapeute dévouée à votre bien-être mental et
                    émotionnel. Avec une expérience solide dans le domaine de la thérapie, je m'engage à vous
                    accompagner sur votre chemin vers la guérison et l'épanouissement personnel.</p>
                <p>Mon approche thérapeutique est basée sur l'empathie, le respect et la confidentialité. Je crois en
                    l'importance d'établir une relation de confiance avec mes clients, afin de créer un espace sûr et
                    bienveillant pour explorer vos défis et vos aspirations.</p>
                <p>Je suis spécialisée dans la thérapie individuelle, la thérapie de couple et la thérapie familiale.
                    Qu'il s'agisse de gérer le stress, l'anxiété, les problèmes relationnels ou de trouver un sens plus
                    profond dans votre vie, je suis là pour vous soutenir à chaque étape du processus de guérison.</p>
                <p>En utilisant une approche personnalisée et en m'appuyant sur des techniques thérapeutiques éprouvées,
                    je vous aiderai à développer une meilleure compréhension de vous-même, à renforcer vos ressources
                    internes et à découvrir des solutions constructives pour surmonter les obstacles qui se dressent sur
                    votre chemin.</p>
                <p>Je suis passionnée par mon travail et je suis déterminée à vous aider à atteindre votre plein
                    potentiel et à vivre une vie équilibrée et épanouissante. Que vous cherchiez à résoudre des
                    problèmes spécifiques, à améliorer vos relations ou simplement à vous épanouir sur le plan
                    personnel, je suis là pour vous accompagner dans votre voyage vers le mieux-être.</p>
                <p>Contactez-moi dès aujourd'hui pour prendre rendez-vous et commencer votre parcours vers une vie plus
                    épanouissante. Je suis impatiente de vous rencontrer et de travailler ensemble pour votre bien-être
                    mental et émotionnel.</p>

                <!-- </div> -->

                <!-- </div> -->
            </div>
            <div class="col-md-6 margin-md-6">
                <!-- <div class="card flex-md-row mb-4 shadow-sm h-md-250"> -->
                <!-- <div class="card-body d-flex flex-column align-items-start"> -->
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h2 class="mb-0">
                    <a class="text-dark" href="#">Services de thérapie familiale:</a>
                </h2>
                <div class="mb-1 text-muted">05 Mai</div>
                <p>Découvrez les différents services de thérapie familiale offerts par Maria José, y compris la thérapie
                    individuelle, la thérapie de couple, le conseil parental et la gestion du stress familial.</p>


                <ul>
                    <li>Thérapie familiale</li>
                    <li>Conseil parental</li>
                    <li>Thérapie de couple</li>
                    <li>Gestion du stress familial</li>
                </ul>
                <h2>Approche thérapeutique pour soigner les traumas familiaux :</h2>
                <p>Maria José adopte une approche holistique et collaborative pour travailler avec les familles. Elle
                    intègre des méthodes thérapeutiques éprouvées telles que la thérapie systémique, la thérapie
                    cognitivo-comportementale et la thérapie narrative pour répondre aux besoins spécifiques de chaque
                    famille. Son objectif est de créer un espace où chaque membre de la famille peut s'exprimer
                    librement, se sentir entendu et contribuer à la transformation positive de la dynamique familiale.
                </p>
                <h2>Pourquoi choisir Maria José en tant que thrérapeute familiale:</h2>
                <ul>
                    <li>Expérience solide</li>
                    <li>Approche chaleureuse et empathique</li>
                    <li>Résultats concrets</li>
                    <li>Respect de la confidentialité</li>
                </ul>
                <h2>Contact - Prendre rendez-vous avec Maria José</h2>
                <p>Maria José exerce à [indiquer le nom de la ville et l'adresse]. Pour prendre rendez-vous ou pour
                    toute demande d'information, veuillez contacter Maria José par téléphone au [numéro de téléphone] ou
                    par courrier électronique à [adresse e-mail].</p>

                <!-- </div> -->

                <!-- </div> -->
            </div>
        </div>
</main>
<?php
require_once('footer.php');
?>