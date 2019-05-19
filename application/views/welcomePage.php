

<body>

  <?php
  if (isset($product_created_but_img_err) && $product_created_but_img_err==true){
    echo "<script>alert(\"Le produit a été créé mais l'image n'a pas pu être téléchargée\")</script>";
    }
    else if (isset($product_created) && $product_created==true){
      echo "<script>alert(\"Le produit a été créé avec succès\")</script>";
    }
    else if (isset($product_created) && $product_created==false){
      echo "<script>alert(\"Le produit n'a pas été créé, veuillez réessayer\")</script>";
    }
    
    if (isset($product_updated) && $product_updated==true){
      echo "<script>alert(\"Le produit a été modifié avec succès\")</script>";
    }
    else if (isset($product_updated) && $product_updated==false){
      echo "<script>alert(\"Le produit n'a pas été modifié, veuillez réessayer\")</script>";
    }
    else if (isset($product_updated_but_img_err) && $product_updated_but_img_err==true){
      echo "<script>alert(\"Le produit a été modifié mais l'image n'a pas pu être téléchargée\")</script>";
    }
    if (isset($product_deleted) && $product_deleted==true){
      echo "<script>alert(\"Le produit a été supprimé avec succès\")</script>";
    }
    else if (isset($book_already_prod) && $book_already_prod==true){
      echo "<script>alert(\"Le produit est déjà réservé, vous ne pouvez pas le supprimer pour l'instant.
      Si vous voulez tout de même le supprimer veuillez préalablement le notifier au(x) client(s) et supprimer chaque réservation pour ce produit.\")</script>";
    }
?>

  <div class="container" id="div_search">
  </div>
  <div class=container id="body">

<!-- WELCOME PAGE -->
  <?php if($isAdmin==0){ ?>
  <div class="container full-height text-center my-auto" id="welcome">

    <div class="row">
        <div class="col-md-4 ">
          <img src="<?php echo site_url("assets/images/logo_lami_du_pain.png") ?>" class="img-responsive img-fluid" alt="Logo de l'ami du pain">
        </div>
        <div class="col-md-8 align-item-center">
          <h1 class="mb-md-1 display-3">L'Ami du Pain</h1>
          <h3 class="mb-5">
            <em>Bienvenue sur le site de l'Ami du Pain</em>
          </h3>
        </div>
    </div>

      <div class="row col-md-12">
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-2" onclick="loadListProduct()">Voir les produits</button>
        </div>
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-2" onclick="loadListCategory()">Voir les catégories</button>
        </div>
        <div class=col-md-4>
          <a class="btn btn-outline-primary btn-lg mb-2" href="<?php echo site_url("connexion")?>">Se connecter</a>
        </div>
      </div>



      <p class="lead mt-3">Sur ce site vous aurez la possibilité de réserver vos produits préférés en avance pour que l'on vous les préparent de la meilleur des façons.</p>
      <p class="lead mt-3">Pour cela rien de plus simple ! Il vous suffit de vous créer un compte et de commencer à réserver vos produits.</p>
      <div class="alert alert-warning mt-3 mb-5" role="alert">
        Sachez que vous ne pouvez réserver qu'au plus de 7 jours et que le paiement se fera sur place lors de votre arrivée.
      </div>
    </div>

  <?php } else if($isAdmin==1){?>
    <div class="container full-height text-center my-auto" id="welcome_user">
        <h1 class="mb-md-1 display-3">L'Ami du Pain</h1>
        <h3 class="mb-5">
          <em>Espace client</em>
        </h3>

        <div class="row col-md-12">
          <div class=col-md-4>
            <button class="btn btn-outline-primary btn-lg mb-2" onclick="loadListProduct()">Voir les produits</button>
          </div>
          <div class=col-md-4>
            <button class="btn btn-outline-primary btn-lg mb-2" onclick="loadListCategory()">Voir les catégories</button>
          </div>
          <div class=col-md-4>
            <a class="btn btn-outline-primary btn-lg mb-2" href="<?php echo site_url("book")?>">Vos réservations</a>
          </div>
        </div>

      </div>
<?php } else if($isAdmin==2){?>
  <div class="container full-height text-center my-auto" id="welcome_user">
      <h1 class="mb-md-1 display-3">L'Ami du Pain</h1>
      <h3 class="mb-5">
        <em>Espace administrateur</em>
      </h3>

      <div class="row col-md-12">
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-5 col-md-8" onclick="loadListProduct()">Voir les produits</button>
        </div>
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-2 col-md-8" onclick="loadListCategory()">Voir les catégories</button>
        </div>
        <div class=col-md-4>
          <a class="btn btn-outline-primary btn-lg mb-2 col-md-8" href="<?php echo site_url("book")?>">Les réservations</a>
        </div>
      </div>
      <div class="row col-md-12">
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-5 col-md-8" onclick="load_create_product()">Ajouter un produit</button>
        </div>
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-2 col-md-8" onclick="loadListProduct()">Modifier un produit</button>
        </div>
        <div class=col-md-4>
          <button class="btn btn-outline-primary btn-lg mb-2 col-md-9" onclick="loadListProduct()"?>Supprimer un produit</button>
        </div>
      </div>
      <div class="row col-md-12">
        <div class=col-md-6>
          <button class="btn btn-outline-primary btn-lg mb-2 col-md-8" onclick="load_create_category()">Ajouter une catégorie</button>
        </div>
        <div class=col-md-6>
          <button class="btn btn-outline-primary btn-lg mb-2 col-md-8" onclick="loadListCategory()">Modifier une catégorie</button>
        </div>
      </div>

    </div>
<?php }?>

<!-- List Product -->
  <div class="container" id="list_product">
  </div>
<!--  -->

<!-- Selected Product -->
  <div class="container" id="selected_product">
  </div>
<!--  -->

<!-- Registration page -->

<!--  -->

<!-- Category page -->
  <div class="container" id="list_category">
  </div>
<!-- -->




</div>
</body>
</html>
