<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="navbar-header">
        <a class="navbar-brand" href="#">L'Ami du Pain</a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
      aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent15">

        <ul class="nav navbar-nav">
          <li><a class="nav-link border-right mr-2" href="<?php echo site_url('/product/list_product')?>">Liste des Produits<span class="sr-only">(current)</span></a></li>
          <li class="dropdown"><a class="dropdown-toggle nav-link border-right mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenu2" href="#">Catégories</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Viennoiserie</a>
              <a class="dropdown-item" href="#">Salés</a>
              <a class="dropdown-item" href="#">Pain</a>
            </div>
          </li>
          <li><a class="nav-link border-right mr-2" onclick="loadReservation()">Vos réservations</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a class=nav-link href=""><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
          <li><a class=nav-link href="#"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>
        </ul>
      </div>
    </nav>


  </head>
