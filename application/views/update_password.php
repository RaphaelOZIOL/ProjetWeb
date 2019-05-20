<body>

  <div class="container" id="div_search">
  </div>
  <div class=container id="body">
  </div>


<?php
if(isset($pwd_not_same) && $pwd_not_same==true){
  ?>
  <div class="alert alert-danger" role="alert">
      Les mots de passes sont différents, veuillez réessayer.
  </div>
<?php  }
?>
<?php
if(isset($err_database) && $err_database==true){
  ?>
  <div class="alert alert-danger" role="alert">
      Erreur venant du serveur veuillez réessayer ultérieurement nous sommes désolé du dérangement.
  </div>
<?php  }
?>


<form action="<?php echo site_url("profile/update_info_pwd")?>" method="POST">

    <div class="form-group row">
      <label for="newPass" class="col-4 col-form-label">Nouveau mot de passe</label>
      <div class="col-8">
        <input id="newPass" autocomplete="off" name="newPass" placeholder="Nouveau mot de passe" class="form-control here" required type="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="confirmPassword" class="col-4 col-form-label">Confirmation mot de passe</label>
      <div class="col-8">
        <input id="confirmPassword" autocomplete="off" name="confirmPassword" placeholder="Confirmer mot de passe" required class="form-control here" type="password">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Enregistrer vos modifications</button>
      </div>
    </div>

</form>
</body>
</html>
