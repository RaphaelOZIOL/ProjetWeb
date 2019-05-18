
  <body>
    

    <div class="container" id="div_search">
    </div>
    <div class=container id="body">


    <?php if (isset($not_connected) && $not_connected==true)
    {
    echo "<script>alert(\"Vous devez vous connecter pour accéder à ce contenue.\")</script>";
    }
    ?>

<div class="container" id="connexion_user">
  <div class="col-md-1 mb-5 mt-5">
    <h1 class="display-3">Connexion</h1>
  </div>
  <form id="form_registration" class="needs-validation" action="<?=site_url("connexion")?>" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="identifiant">Email</label>
        <?php echo form_error('identifiant'); ?>
        <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?php echo set_value('identifiant'); ?>" placeholder="Email" required>
        <div class="valid-feedback">
          Correct !
        </div>
      </div>

    </div>

    <div class="form-row">
      <div class="col-md-3 mb-3">
        <label for="password" ="off">Mot de passe</label>
        <?php echo form_error('password'); ?>
        <input type="password" autocomplete="off" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Mot de passe" required>
        <div class="invalid-feedback">

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
