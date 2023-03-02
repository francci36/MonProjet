
<?php
    $blog=true;
    require_once('header.php');
?>
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Meu blog</h1>

            <div class="row mb-2">
                <div class="col-md-6">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">Constelação Familiar</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Featured post</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto">O trabalho com as constelações familiares pode esclarecer-nos de forma pratica como as </p>
                                <a href="#">Continue lendo</a>
                            </div>
                            <div class="card-body d-flex flex-column align-items-end">
                                <img class="constelacao" src="assets/images/constelacao-familiar-1.jpg" alt="">
                                <!--<img class="card-img-right flex-auto d-none d-lg-block" data-src="./images/image.jpg" alt="Card image cap">-->
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success">Design</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Post title</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 11</div>
                                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="#">Continue reading</a>
                        </div>
                        <div class="card-body d-flex flex-column align-items-end">
                                <img class="constelacao" src="assets/images/Image.jpg" alt="">
                                <!--<img class="card-img-right flex-auto d-none d-lg-block" data-src="./images/image.jpg" alt="Card image cap">-->
                            </div>
                    </div>
                </div>
            </div>
        </div>
          
    </main>
    <?php
         require_once('footer.php');
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>