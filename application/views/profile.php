<body>

	<div class="container" id="div_search">
  </div>
  <div class=container id="body">


	<?php
		if (isset($profile_update) && $profile_update==true)
		{
		echo "<script>alert(\"Les informations de vote profil ont été modifiés avec succès !\")</script>";
		}
		else if (isset($profile_update_pwd) && $profile_update_pwd==true)
		{
		echo "<script>alert(\"Votre mot de passe a bien été changé !\")</script>";
		}
	?>
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
			                    <form action="<?php echo (site_url("profile/update_info"))?>" method="POST" name="profile_form">
																<div class="form-group row" hidden>
																	<label for="email" class="col-4 col-form-label">Email</label>
																	<?php echo form_error('email'); ?>
																	<div class="col-8">
																		<input id="email" name="email" value="<?php echo ($profile_info->email)?>" type="text">
																	</div>
																</div>
	                              <div class="form-group row">
	                                <label for="firstName" class="col-4 col-form-label">Prénom</label>
	                                <div class="col-8">
																		<?php echo form_error('firstName'); ?>

	                                  <input id="firstName" name="firstName" value="<?php echo ($profile_info->firstName)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="lastName" class="col-4 col-form-label">Nom</label>
	                                <div class="col-8">
																		<?php echo form_error('lastName'); ?>

	                                  <input id="lastName" name="lastName" value="<?php echo ($profile_info->lastName)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="emailStock" class="col-4 col-form-label">Email</label>
	                                <div class="col-8">
																		<?php echo form_error('emailStock'); ?>

	                                  <input id="emailStock" name="emailStock" disabled value="<?php echo ($profile_info->email)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="phoneNumber" class="col-4 col-form-label">Numéro de téléphone</label>
	                                <div class="col-8">
																		<?php echo form_error('phoneNumber'); ?>

	                                  <input id="phoneNumber" name="phoneNumber" value="<?php echo ($profile_info->phoneNumber)?>" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="yearBirth" class="col-4 col-form-label">Date de naissance</label>
	                                <div class="col-8">
																		<?php echo form_error('yearBirth'); ?>

																		<input id="yearBirth" name="yearBirth" type="date" value="<?php echo ($profile_info->yearBirth)?>" class="form-control here" required="required" >
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="street" class="col-4 col-form-label">Adresse</label>
	                                <div class="col-8">
																		<?php echo form_error('street'); ?>

	                                  <input id="street" name="street" value="<?php echo ($profile_info->street)?>" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="city" class="col-4 col-form-label">Ville</label>
	                                <div class="col-8">
																		<?php echo form_error('city'); ?>

	                                  <input id="city" name="city" value="<?php echo ($profile_info->city)?>" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="postalCode" class="col-4 col-form-label">Code postal</label>
	                                <div class="col-8">
																		<?php echo form_error('postalCode'); ?>

																		<input id="postalCode" name="postalCode" value="<?php echo ($profile_info->postalCode)?>" class="form-control here" type="text">
	                                </div>
	                              </div>

	                              <div class="form-group row">
	                                <div class="offset-4 col-8">
	                                  <button name="submit"  type="submit" class="btn btn-primary">Enregistrer vos modifications</button>
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
	<div class="row">
		<div class=" col-md-3">
			<a name="updatePassword" href="<?php echo site_url("profile/update_info_pwd_view")?>" >Modifier votre mot de passe</a>
		</div>
	</div>

</div>
</body>
</html>
