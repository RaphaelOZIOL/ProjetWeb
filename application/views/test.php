<div class="container">
          <div class="col-md-4">
            <img src="http://localhost/LamiDuPain/assets/images/painChocolat.jpg" class="rounded float-left" alt="Pain au chocolat">
          </div>
</div>
<div class="container">
          <div class="col-md-8">
            <h3 class="font-weight-bold display-4">Produit</p>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p class="font-weight-normal">Prix : 1,20 euros</p>
            </div>
            <div class="col-md-8">
              <p class="font-weight-normal">Quantité en stock : 130 pièces</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 alert alert-warning" role="alert">
              <p class="font-weight-normal">Attention vous devrez régler votre commande en caisse en arrivant ! Le cas échéant votre commande ne vous sera pas remise.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <p class="font-weight-normal">Farine de blé, eau, sel, trolol </p>
            </div>
          </div>


            <form action="" method="POST">
              <div class="row">
                  <div class="form-group row">
                    <label for="quantityProduct" class="col-md-6 ">Quantité à réserver :</label>
                    <div class="col-md-3">
                      <input id="quantityProduct" name="quantityProduct" value="" class="form-control here" required="required" type="number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="date" class="col-md-3 col-form-label">Date :</label>
                    <div class="col-md-8">
                      <input id="date" name="date" value="" class="form-control here" type="date">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="md-form amber-textarea active-amber-textarea col-md-12">
                  <i class="fas fa-pencil-alt prefix"></i>
                  <label for="comment">Précisions pour la réservation :</label>
                  <textarea id="comment" name="comment" placeholder="Cuisson du pais , viennoiseries, etc..." class="md-textarea form-control here" rows="3"></textarea>
                </div>
              </div>

              <div class="row">
                  <div class="form-group row">
                    <button class="btn btn-primary " onclick=form_validation type="submit" id="button_save">Réserver</button>
                  </div>
              </div>
            </form>

              <



            <button onclick=loadListProduct()>Retour liste produit</button>
            // INSERT QUANTITY TO BOOK AFTER
          </div>
</div>
