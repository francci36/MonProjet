<?php
    $index=true;

    // initialise moin programme
    
    require_once('app/config.php');
    require_once('app/app-rdvtherapeute.php');




    //
    //
    // Démarrons l'affichage du site web
    //
   require_once('header.php');
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Meu Site</h1>
        <!--Ceci est mon carroussel-->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/paysage2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/paysage3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/paysage4.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--c'est la fin de mon carrousel-->
        <div class="row mb-2">
            <div class="col-md-6">
                <!-- <div class="card flex-md-row mb-4 shadow-sm h-md-250"> -->
                    <!-- <div class="card-body d-flex flex-column align-items-start"> -->
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Titulo 1</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="card-text mb-auto">Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Perferendis, vero enim! Cumque blanditiis officiis, quo neque iure eum
                            maxime delectus iste, aliquid sed odit reiciendis quidem voluptatem hic est
                            eaque id nulla tempora. Quas fuga atque in neque harum, animi aspernatur eum
                            aliquam minus vel consectetur itaque illo tempore blanditiis quidem quaerat
                            suscipit. Qui commodi officia expedita repudiandae blanditiis consequuntur, vero
                            est, dicta aspernatur quod numquam dolorum quidem provident alias, nemo iusto
                            eaque. Quia odit, numquam iusto consequuntur dignissimos similique delectus vero
                            soluta illum ea, nostrum labore recusandae quisquam saepe doloribus quidem
                            nesciunt, dicta veritatis ut eum minima quo cumque debitis. Eos, similique
                        </p>
                    <!-- </div> -->
                    
                <!-- </div> -->
            </div>
            <div class="col-md-6">
                <!-- <div class="card flex-md-row mb-4 shadow-sm h-md-250"> -->
                    <!-- <div class="card-body d-flex flex-column align-items-start"> -->
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Titulo 2</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="card-text mb-auto">Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Perferendis, vero enim! Cumque blanditiis officiis, quo neque iure eum
                            maxime delectus iste, aliquid sed odit reiciendis quidem voluptatem hic est
                            eaque id nulla tempora. Quas fuga atque in neque harum, animi aspernatur eum
                            aliquam minus vel consectetur itaque illo tempore blanditiis quidem quaerat
                            suscipit. Qui commodi officia expedita repudiandae blanditiis consequuntur, vero
                            est, dicta aspernatur quod numquam dolorum quidem provident alias, nemo iusto
                            eaque. Quia odit, numquam iusto consequuntur dignissimos similique delectus vero
                            soluta illum ea, nostrum labore recusandae quisquam saepe doloribus quidem
                            nesciunt, dicta veritatis ut eum minima quo cumque debitis. Eos, similique
                        </p>
                    <!-- </div> -->
                    
                <!-- </div> -->
            </div>
        </div>
</main>
        <?php
         require_once('footer.php');
    ?>
