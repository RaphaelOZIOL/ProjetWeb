
  <body>


    <div class="container" id="div_search">
    </div>
    <div class=container id="body">


    <?php if (isset($not_connected) && $not_connected==true)
    {?>
      <div class="alert alert-error" role="alert">
          Vous devez vous connecter pour accéder à ce contenue.
      </div>
  <?php  }?>

  <?php if (isset($pwd_updated) && $pwd_updated==true)
  {?>
    <div class="alert alert-success" role="alert">
        Votre mot de passe a été changé avec succès pour votre sécurité veuillez vous reconnecter avec votre nouveau mot de passe.
    </div>
<?php  }?>


<div class="container" id="connexion_user">
  <div class="col-md-1 mb-5 mt-5">
    <h1 class="display-3">Connexion</h1>
  </div>
  <form id="form_registration" class="needs-validation" action="<?=site_url("connexion")?>" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-4">
        <label for="identifiant">Email</label>
        <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?php echo set_value('identifiant'); ?>" placeholder="Email" required>
        <div class="valid-feedback">
          Correct !
        </div>
      </div>

    </div>

    <div class="form-row">
      <div class="col-md-4 mb-4">
        <label for="password" ="off">Mot de passe</label>
        <input type="password" autocomplete="off" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Mot de passe" required>
        <div class="invalid-feedback">

        </div>
      </div>

    </div>


    <div>
      <button class="btn btn-primary ml-auto p-2" type="submit" id="button_save">Se connecter</button>
    </div>

  </form>
</div>
</body>
</html>
