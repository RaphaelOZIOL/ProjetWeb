<form action="<?php echo site_url("profile/update_info_pwd")?>" method="POST">

    <div class="form-group row">
      <label for="newPass" class="col-4 col-form-label">Nouveau mot de passe</label>
      <div class="col-8">
        <input id="newPass" name="newPass" placeholder="Nouveau mot de passe" class="form-control here" type="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="confirmPassword" class="col-4 col-form-label">Confirmation mot de passe</label>
      <div class="col-8">
        <input id="confirmPassword" name="confirmPassword" placeholder="Confirmer mot de passe" class="form-control here" type="password">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Enregistrer vos modifications</button>
      </div>
    </div>
    
</form>
