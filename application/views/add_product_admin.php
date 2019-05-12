<body>

	<div class="container">
		<div class="row">

			<div class="col-md-12">
			    <div class="card">
			        <div class="card-body">
			            <div class="row">
			                <div class="col-md-12">
			                    <h4>Ajouter un produit</h4>
			                    <hr>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-12">
			                    <form action="" method="POST">
	                              <div class="form-group row">
	                                <label for="firstName" class="col-4 col-form-label">Nom du produit :</label>
	                                <div class="col-8">
	                                  <input id="firstName" name="firstName" class="form-control here" required="required" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="lastName" class="col-4 col-form-label">Prix :</label>
	                                <div class="col-8">
	                                  <input id="lastName" name="lastName" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="email" class="col-4 col-form-label">Quantité en stock :</label>
	                                <div class="col-8">
	                                  <input id="email" name="email" class="form-control here" type="text">
	                                </div>
	                              </div>
	                              <div class="form-group row">
                                  <div class="md-form amber-textarea active-amber-textarea col-md-12">
                                    <i class="fas fa-pencil-alt prefix"></i>
                                    <label for="comment">Composition du produit :</label>
                                    <textarea id="comment" name="comment" placeholder="" class="md-textarea form-control here" rows="3"></textarea>
                                  </div>
	                              </div>
	                              <div class="form-group row">
	                                <label for="yearBirth" class="col-4 col-form-label">Catégorie du produit</label>
	                                <div class="col-8">
																		<input id="yearBirth" name="yearBirth" type="date" class="form-control here" required="required" >
	                                </div>
	                              </div>

	                              <div class="form-group row">
	                                <label for="street" class="col-4 col-form-label">Sélectionner une image pour votre produit :</label>
	                                <div class="col-8">
                                    <input type="file" required="required" name="fileToUpload" id="fileToUpload">
	                                </div>
	                              </div>

	                              <div class="form-group row">
	                                <div class="offset-4 col-8">
	                                  <button name="submit" type="submit" class="btn btn-primary">Créer le produit</button>
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
