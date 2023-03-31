<?php
 require_once('header.php')
?>
<body>
    <main class="flex-shrink-0">
        <form class="form-signin">
            <div class="text-center mb-4">
                <!--<img class="mb-4" src="assets/css/bootstrap.css" alt="" width="72"
                height="72">-->
                <h1 class="h3 mb-3 font-weight-normal">Formulario de Agendamento</h1>
                <p>Preencha os campos do formulario<code></code>
                    <a href="https://caniuse.com/#feat=css-placeholder-shown"></a>
                </p>
            </div>

            <div class="form-label-group">
                <input
                    type="text"
                    id="inputName"
                    class="form-control"
                    placeholder="digite seu nome"
                    required="required"
                    autofocus="autofocus">
                <label for="name">Nome</label>
            </div>
            <div class="form-label-group">
                <input
                    type="text"
                    id="inputLastName"
                    class="form-control"
                    placeholder="digite seu sobre nome"
                    required="required"
                    autofocus="autofocus">
                <label for="lastname">Sobrenome</label>
            </div>
            <div class="form-label-group">
                <input
                    type="email"
                    id="inputEmail"
                    class="form-control"
                    placeholder="digite seu email"
                    required="required"
                    autofocus="autofocus">
                <label for="inputEmail">Email</label>
            </div>

            <div class="form-label-group">
                <input
                    type="password"
                    id="inputPassword"
                    class="form-control"
                    placeholder="digite sua senha"
                    required="required">
                <label for="inputPassword">senha</label>
            </div>
            <div class="form-label-group">
                <input
                    type="password"
                    id="inputPassword"
                    class="form-control"
                    placeholder="confirme sua senha"
                    required="required">
                <label for="inputPassword">Confirmar senha</label>
            </div>
            <div class="form-label-group">
                <input type="tel" id="inputTelephone" class="form-control" placeholder="Numéro de téléphone" name="telephone" required>
                <label for="inputTelephone">Numéro de téléphone</label>
            </div>
            <div class="form-group">
                <label for="selectTypeCompte">Type de compte</label>
                <select class="form-control" id="selectTypeCompte" name="type_compte">
                    <option value="client">Client</option>
                    <option value="professionnel">Professionnel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputDate">Date et heure de rendez-vous</label>
                <input type="datetime-local" class="form-control" id="inputDate" name="date_heure" required>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me">
                    Lembre me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Validar</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
        </form>
    </main>
</body>
<?php
 require('footer.php')
?>