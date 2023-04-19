<?php
 require_once('header.php');
?>
<body>
    <main class="flex-shrink-0">
        <form class="form-signin" method= "post" action="interface/action.php?e=ajoutRendez_vous">
            <div class="text-center mb-4">
                <!--<img class="mb-4" src="assets/css/bootstrap.css" alt="" width="72"
                height="72">-->
                <h1 class="h3 mb-3 font-weight-normal">Formulario de Agendamento</h1>
                <p>Preencha os campos do formulario<code></code>
                    <a href="https://caniuse.com/#feat=css-placeholder-shown"></a>
                </p>
            </div>

            <div class="form-label-group">
            <label for="name">Nome</label>
                <input
                    type="text"
                    id="inputName"
                    class="form-control"
                    placeholder="digite seu nome"
                    required="required"
                    autofocus="autofocus">
                
            </div>
            <div class="form-label-group">
            <label for="lastname">Sobrenome</label>
                <input
                    type="text"
                    id="inputLastName"
                    class="form-control"
                    placeholder="digite seu sobre nome"
                    required="required"
                    autofocus="autofocus">
                
            </div>
            <div class="form-label-group">
            <label for="inputEmail">Email</label>
                <input
                    type="email"
                    id="inputEmail"
                    class="form-control"
                    placeholder="digite seu email"
                    required="required"
                    autofocus="autofocus">
                
            </div>
            <div class="form-label-group">
            <label for="inputTelephone">Numéro de téléphone</label>
                <input type="tel" id="inputTelephone" class="form-control" placeholder="Numéro de téléphone" name="telephone" required>
                
            </div>
            <div class="form-group">
                <label for="selectTypeCompte">Type de compte</label>
                <select class="form-control" id="selectTypeCompte" name="type_compte">
                    <option value="client">Client</option>
                    <option value="administrateur">administrateur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="heure">Heure</label>
                <input type="time" class="form-control" id="heure" name="heure" required>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me">
                    Lembre me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Validar</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2023</p>
        </form>
    </main>
</body>
<?php
 require('footer.php')
?>