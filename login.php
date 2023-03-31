<?php
    $blog=true;
    require_once('header.php');
?>
<html>
    <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Connexion</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="process-login.php">
                                <div class="form-group">
                                    <label for="email">E-mail :</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha :</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        required="required">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Conexão</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
         require_once('footer.php');
    ?>