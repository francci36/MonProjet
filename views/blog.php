<?php
session_start();
$blog = true;
require_once('../header.php');

// initialise moin programme

//require_once('app/config.php');
require_once('../app/classe.apprdvtherapeute.php');
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Maria José - Thérapeute familiale</h1>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">Constellation Familiale</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Comprendre la constellation familiale : un outil puissant pour
                                la guérison</a>
                        </h3>
                        <img class="thumbnail" src="../assets/images/constelacao-familiar-1.jpg"
                            alt="Constellation familiale">

                        <div class="mb-1 text-muted">05 Juin</div>
                        <p class="card-text mb-auto">La constellation familiale est une approche thérapeutique qui vise
                            à révéler et à guérir les dynamiques familiales inconscientes qui peuvent avoir un impact
                            sur notre vie quotidienne. En identifiant les schémas et les traumatismes
                            transgénérationnels, la constellation familiale permet de libérer les émotions refoulées et
                            de trouver des solutions pour atteindre l'harmonie et la guérison.

                            Dans cet article, nous explorerons les principes fondamentaux de la constellation familiale,
                            y compris l'idée selon laquelle chaque membre d'une famille est connecté énergétiquement et
                            influence mutuellement les autres. Nous aborderons également les avantages de cette approche
                            thérapeutique et comment elle peut aider à résoudre les conflits familiaux, à améliorer les
                            relations et à favoriser la croissance personnelle.






                        </p>
                        <a href="#">Continue...</a>

                    </div>
                    <!-- <div class="card-body d-flex flex-column align-items-end"> -->
                    <!-- <img class="constelacao" src="assets/images/constelacao-familiar-1.jpg"
                    alt=""> -->
                    <!--<img class="card-img-right flex-auto d-none d-lg-block"
                    data-src="./images/image.jpg" alt="Card image cap">-->
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success"></strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Les bienfaits de la constellation familiale : libérez-vous des
                                schémas répétitifs</a>
                        </h3>
                        <img class="thumbnail" src="../assets/images/Image.jpg" alt="Constellation Familiale">
                        <div class="mb-1 text-muted">05 Juin</div>
                        <p class="card-text mb-auto">Avez-vous déjà remarqué que certains schémas ou comportements se
                            répètent dans votre famille, comme des conflits fréquents, des problèmes de communication ou
                            des difficultés relationnelles ? La constellation familiale offre une approche unique pour
                            identifier et résoudre ces schémas répétitifs en remontant à leurs origines profondes.

                            Dans cet article, nous explorerons comment la constellation familiale permet de mettre en
                            lumière les blessures et les traumatismes hérités de nos ancêtres, et comment ces
                            expériences peuvent continuer à influencer notre vie présente. En prenant conscience de ces
                            schémas, nous pouvons apporter des changements significatifs et favoriser une transformation
                            personnelle et familiale positive.</p>
                        <a href="#">Continue...</a>
                    </div>
                    <!-- <div class="card-body d-flex flex-column align-items-end"> <img
                    class="constelacao" src="assets/images/Image.jpg" alt=""> -->
                    <!--<img class="card-img-right flex-auto d-none d-lg-block"
                    data-src="./images/image.jpg" alt="Card image cap">-->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

</main>
<?php
require_once('../footer.php');
?>