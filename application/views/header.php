<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/css/welcome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="navbar-header">
        <a class="navbar-brand" onclick="loadListProduct()">L'Ami du Pain</a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
      aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent15">

        <ul class="nav navbar-nav" id="nav_bar_booking">
          <li><a class="nav-link border-right mr-2" onclick="loadListProduct()">Liste des Produits</a></li>
          <li><a class="nav-link border-right mr-2" onclick="loadListCategory()">Catégories</a></li>

          <?php if($isAdmin==1){ ?>
            <li><a class="nav-link border-right mr-2" href="<?php echo site_url("book/list_book")?>">Vos réservations</a></li>
          <?php } ?>
          <?php if($isAdmin==2){ ?>
            <li><a class="nav-link border-right mr-2" href="<?php echo site_url("book/list_book_all_admin")?>">Réservations des clients</a></li>
            <li><a class="nav-link border-right mr-2" href="<?php echo site_url("book/list_book_all_admin")?>">Ajout/Modification</a></li>

          <?php } ?>
        </ul>


        <ul class="nav navbar-nav navbar-right" id="nav_bar_connection">

          <?php if($isAdmin==0){ ?>
            <li><a class=nav-link onclick=makeRegistration()><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
            <li><a class=nav-link href="<?php echo site_url("connexion")?>"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>
          <?php }
          if($isAdmin==1 || $isAdmin==2){
          ?>
          <li><a class=nav-link href="<?php echo site_url("profile")?>"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
          <li><a class=nav-link href="<?php echo site_url("connexion/deconnecter")?>"><span class="glyphicon glyphicon-user"></span>Se Déconnecter</a></li>

          <?php } ?>

        </ul>
      </div>
    </nav>


  </head>
