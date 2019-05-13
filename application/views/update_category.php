<body>

	<div class="container">
		<div class="row">

			<div class="col-md-12">
			    <div class="card">
			        <div class="card-body">
			            <div class="row">
			                <div class="col-md-12">
			                    <h4>Modifier une catégorie</h4>
			                    <hr>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-12">
			                    <form action="" method="POST">
	                              <div class="form-group row">
	                                <label for="firstName" class="col-4 col-form-label">Nom de la catégorie :</label>
	                                <div class="col-8">
	                                  <input id="firstName" name="firstName" value="" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>

	                              <div class="form-group row">
	                                <label for="street" class="col-4 col-form-label">Sélectionner une image pour votre catégorie :</label>
	                                <div class="col-8">
                                    <input type="file" required="required" value="" name="fileToUpload" id="fileToUpload">
	                                </div>
	                              </div>

	                              <div class="form-group row">
	                                <div class="offset-4 col-8">
	                                  <button name="submit" type="submit" class="btn btn-primary">Créer la catégorie</button>
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
