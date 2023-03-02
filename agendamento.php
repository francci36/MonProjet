<?php
 require_once('header.php')
?>
<body>
  <main class="flex-shrink-0">
        <form class="form-signin">
          <div class="text-center mb-4">
            <!--<img class="mb-4" src="assets/css/bootstrap.css" alt="" width="72" height="72">-->
            <h1 class="h3 mb-3 font-weight-normal">Formulario de Agendamento</h1>
            <p>Preencha os campos do formulario<code></code> <a href="https://caniuse.com/#feat=css-placeholder-shown"></a></p>
          </div>

          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">senha</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Lembre me
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