
  <body>

    <div class="container" id="div_search">
    </div>
    <div class=container id="body">


    <?php if (isset($not_connected) && $not_connected==true)
    {
    echo "<script>alert(\"Vous devez vous connecter pour accéder à ce contenue.\")</script>";
    }
    ?>

  <!--  <h1>Login</h1>
    <div id="body">
        <form action="" method="post" >
            <p>Identifiant :</p>
            <code><input type="text" name="identifiant" value="" /></code>
            <p>Mot de passe :</p>
            <code><input type="password" name="password" value="" /></code>

            <input type="submit" name="login" value="Connexion">
        </form>
    </div>

  </div>
  </body>
</html>-->




<div class="container" id="connexion_user">
  <div class="col-md-1 mb-5 mt-5">
    <h1 class="display-3">Connexion</h1>
  </div>
  <form id="form_registration" class="needs-validation" action="<?=site_url("connexion")?>" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="identifiant">Email</label>
        <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Email" required>
        <div class="valid-feedback">
          Correct !
        </div>
      </div>

    </div>

    <div class="form-row">
      <div class="col-md-3 mb-3">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
        <div class="invalid-feedback">
          Veuillez rentrer un bon numéro de téléphone.
        </div>
      </div>

    </div>


    <div class="d-flex">
      <button class="btn btn-primary ml-auto p-2" type="submit" id="button_save">Se connecter</button>
    </div>

  </form>
</div>
</body>
</html>
