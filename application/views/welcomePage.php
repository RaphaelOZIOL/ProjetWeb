

<body>
  <?php
    if (isset($product_created) && $product_created==true){
      echo "<script>alert(\"Le produit a été créé avec succès\")</script>";
    }
    else if (isset($product_created) && $product_created==false){
      echo "<script>alert(\"Le produit n'a pas été créé, veuillez réessayer\")</script>";
    }
    if (isset($product_created_but_img_err) && $product_created_but_img_err==true){
      echo "<script>alert(\"Le produit a été créé mais l'image n'a pas pu être téléchargée\")</script>";
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
      <h1 class="mb-md-1 display-3">L'Ami du Pain</h1>
      <h3 class="mb-5">
        <em>Bienvenue sur le site de l'Ami du Pain</em>
      </h3>
      <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListProduct()">Voir les produits</button>
      <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListCategory()">Voir les catégories</button>

      <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo site_url("connexion")?>">Se connecter</a>
    </div>
  <?php } else if($isAdmin==1){?>
    <div class="container full-height text-center my-auto" id="welcome_user">
        <h1 class="mb-md-1 display-3">L'Amie du Pain</h1>

        <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListProduct()">Voir les produits</button>
        <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListCategory()">Voir les catégories</button>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo site_url("book")?>">Vos réservations</a>
      </div>
<?php } else if($isAdmin==2){?>
  <div class="container full-height text-center my-auto" id="welcome_user">
      <h1 class="mb-md-1 display-3">L'Amie du Pain</h1>

      <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListProduct()">Voir les produits</button>
      <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListCategory()">Voir les catégories</button>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo site_url("book")?>">Les réservations des clients</a>
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
