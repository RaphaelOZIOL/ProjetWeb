<body>

	<div class="container">
		<div class="row">

			<div class="col-md-12">
			    <div class="card">
			        <div class="card-body">
			            <div class="row">
			                <div class="col-md-12">
			                    <h4>Profil - Vos Informations personnelles</h4>
			                    <hr>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-12">
			                    <form action="<?php echo site_url("profile/update_info")?>" method="POST">
	                              <div class="form-group row">
	                                <label for="firstName" class="col-4 col-form-label">Prénom</label>
	                                <div class="col-8">
	                                  <input id="firstName" name="firstName" value="<?php echo ($profile_info->firstName)?>" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="lastName" class="col-4 col-form-label">Nom</label>
	                                <div class="col-8">
	                                  <input id="lastName" name="lastName" value="<?php echo ($profile_info->lastName)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="email" class="col-4 col-form-label">Email</label>
	                                <div class="col-8">
	                                  <input id="email" name="email" value="<?php echo ($profile_info->email)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="phoneNumber" class="col-4 col-form-label">Numéro de téléphone</label>
	                                <div class="col-8">
	                                  <input id="phoneNumber" name="phoneNumber" value="<?php echo ($profile_info->phoneNumber)?>" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="yearBirth" class="col-4 col-form-label">Date de naissance</label>
	                                <div class="col-8">
																		<input id="yearBirth" name="yearBirth" type="date" value="<?php echo ($profile_info->yearBirth)?>" class="form-control here" required="required" >
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="street" class="col-4 col-form-label">Adresse</label>
	                                <div class="col-8">
	                                  <input id="street" name="street" value="<?php echo ($profile_info->street)?>" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="city" class="col-4 col-form-label">Ville</label>
	                                <div class="col-8">
	                                  <input id="city" name="city" value="<?php echo ($profile_info->city)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="postalCode" class="col-4 col-form-label">Code postal</label>
	                                <div class="col-8">
																		<input id="postalCode" name="postalCode" value="<?php echo ($profile_info->postalCode)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="password" class="col-4 col-form-label">Nouveau mot de passe</label>
	                                <div class="col-8">
	                                  <input id="password" placeholder="Nouveau mot de passe" class="form-control here" type="password">
	                                </div>
	                              </div>
																<div class="form-group row">
	                                <label for="confirmPassword" class="col-4 col-form-label">Confirmation mot de passe</label>
	                                <div class="col-8">
	                                  <input id="confirmPassword" name="newpass" placeholder="Confirmer mot de passe" class="form-control here" type="password">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <div class="offset-4 col-8">
	                                  <button name="submit" type="submit" class="btn btn-primary">Enregistrer vos modifications</button>
	                                </div>
	                              </div>
	                            </form>
			                </div>
			            </div>

			        </div>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>
