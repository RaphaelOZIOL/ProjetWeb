<!DOCTYPE html>

<html>
  <head>
    <?php header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header("X-XSS-Protection: 1; mode=block");?>

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
    <link rel="icon" type="image/png" href="<?php echo site_url('assets/images/logo_lami_du_pain.png')?> "/>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url();?>">L'Ami du Pain</a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
      aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent15">

        <ul class="nav navbar-nav" id="nav_bar_booking">
          <li><a class="nav-link border-right mr-md-2 " onclick="loadListProduct()">Liste des Produits</a></li>
          <li><a class="nav-link border-right mr-md-2" onclick="loadListCategory()">Catégories</a></li>

          <?php if($isAdmin==1){ ?>
            <li><a class="nav-link border-right mr-md-2" href="<?php echo site_url('reservations/client');?>">Vos réservations</a></li>
          <?php } ?>
          <?php if($isAdmin==2){ ?>
            <li><a class="nav-link border-right mr-md-2" href="<?php echo site_url("reservations/liste");?>">Réservations des clients</a></li>
            <li><a class="nav-link border-right mr-md-2" onclick=load_create_update_page()>Ajout/Modification/Suppression</a></li>

          <?php } ?>
        </ul>


        <ul class="nav navbar-nav navbar-right" id="nav_bar_connection">

          <?php if($isAdmin==0){ ?>
            <li><a class=nav-link onclick=makeRegistration()><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
            <li><a class=nav-link href="<?php echo site_url("connection");?>"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>
          <?php }
          if($isAdmin==1 || $isAdmin==2){
          ?>
          <li><a class=nav-link href="<?php echo site_url("profil");?>"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
          <li><a class=nav-link href="<?php echo site_url("deconnecter");?>"><span class="glyphicon glyphicon-user"></span>Se Déconnecter</a></li>

          <?php } ?>

        </ul>
      </div>
    </nav>



    <script>

    // CHANGE WHEN DEPLOYING ON SERVER
 //var url_site="http://localhost/LamiDuPain/";
  var url_site="https://lamidupain.herokuapp.com/";


    var url_connection= url_site + 'connection';
    var url_deconnnection= url_site + 'deconnecter';
    var url_list_product= url_site + 'produits/liste';
    var url_list_product_by_category= url_site + 'categoryajax/get_product_by_category/';
    var url_product_id= url_site + 'produits/produit/id';
    var url_product_info= url_site + 'productajax/product_info/';
    var url_registration= url_site + 'inscription';
    var url_category= url_site + 'categories';
    var url_profile= url_site + 'profil';
    var url_book_product= url_site + 'reserver';
    var url_product_create= url_site + 'produits/produit/creer';
    var url_category_create= url_site + 'categories/categorie/creer';
    var url_category_info= url_site + "categories/categorie/information";
    var url_category_update= url_site + "categories/categorie/modifier";
    var url_upload_img= url_site + "categories/categorie/telecharger";
    var url_product_info_admin= url_site + 'produits/produit/information/administrateur';
    var url_product_update= url_site + 'produits/produit/modifier';
    var url_delete_product= url_site + 'product/delete_product/';
    var url_search_product= url_site + 'searchproduct/search/';



    function display_button_connected(data){
        var htmlConnection='';
        if(data[1]==null){
          htmlConnection += '<li><a class=nav-link onclick=makeRegistration()><span class="glyphicon glyphicon-user"></span>S\'inscrire</a></li>'+
          '<li><a class=nav-link href="' + url_connection + '"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>';
        }
        else if(data[1]==1 || data[1]==2){
          htmlConnection+='<li><a class=nav-link href=' + url_profile + '><span class="glyphicon glyphicon-user"></span>Profil</a></li>'+
          '<li><a class=nav-link href=' + url_deconnnection + '><span class="glyphicon glyphicon-user"></span>Se Déconnecter</a></li>';
        }
        $('#nav_bar_connection').html(htmlConnection);
    }




    //function show all product
          function loadListProduct(){
            document.getElementById('div_search').style.display="block";

              $.ajax({
                  type  : 'GET',
                  url   : url_list_product,
                  async : true,
                  dataType : 'json',
                  success : function(data){
                      var htmlProduct = '';
                      var htmlSearch=    '<form class="form-inline col-md-4 mt-4 mb-4">'+
                                            '<i class="fas fa-search" aria-hidden="true"></i>'+
                                            '<input class="form-control form-control-sm ml-3 w-75" type="search" placeholder="Rechercher un produit" id="productSearch" name="productSearch" aria-label="Chercher">'+
                                          '</form>'+
                                          '<div class="col-md-12 mt-4 mb-4 text-center">'+
                                            '<h3>Liste des produits</h3>'+
                                          '</div>';
                      var i;
                      for(i=0; i<data[0].length; i++){
                          if(i%3==0){
                            htmlProduct += '<div class="card-deck container-fluid justify-content-center">';
                          }
                            htmlProduct += '<div class="card col-12 col-sm-6 col-md-4 bg-light border-primary mb-3">'+
                                      '<div class="card-deck">'+
                                        '<div class="card-header col-md-12">'+
                                            '<img class="card-img-top" src="' + data[0][i].srcImg + '" alt="Image de ' + data[0][i].nameProd + '">' +
                                        '</div>'+
                                          '<div class="card-body text-center">'+
                                              '<h5 class="card-title col-md-12 pl-0 pr-0"  id="' + data[0][i].IdProd +'">'+ data[0][i].nameProd +'</h5>'+
                                              '<h5 class="card-title col-md-12 pl-0 pr-0">Prix : ' + data[0][i].price + ' € </h5>'+

                                              '<p class="card-text">' + data[0][i].compoProd + '</p>'+
                                              '<p class="card-text">' + data[0][i].quantityStock + ' pièces</p>'+
                                          '</div>'+

                                          '<div class="text-center col-md-12 force-to-bottom">'+
                                              '<button type="button" onclick=loadProduct(this) id=' + data[0][i].IdProd + ' class="btn btn-outline-success btn-lg col-md-12 mr-2 mt-3 mb-2 pl-0 pr-0">Réserver</button>';

                                             if(data[1]==2){
                                                  htmlProduct +=
                                                '<button type="button" onclick=load_update_product(this) id=' + data[0][i].IdProd + ' class="btn btn-outline-warning btn-lg col-md-12 mr-2 mt-2 mb-0 pl-0 pr-0">Modifier/Supprimer</button>';
                                              }



                            htmlProduct+='</div>'+
                                        '</div>'+
                                      '</div>';

                          if(i%3==2){
                            htmlProduct += '</div>';
                          }


                      }







                            $('#div_search').html(htmlSearch);
                            $('#body').html(htmlProduct);

                            $('#productSearch').keyup(function(){
                                              var text = $('#productSearch').val();
                                              if (text==""){
                                                text="all_product";
                                              }
                                              var adr = url_search_product;
                                              var url = adr+text;
                                              var htmlProd='';
                                              console.log(url);
                                                      $.ajax({
                                                          type : "post",
                                                          url  : url,
                                                          dataType : "JSON",
                                                          success: function(data){

                                                            for(i=0; i<data["product"].length; i++){
                                                                if(i%3==0){
                                                                  htmlProd += '<div class="card-deck container-fluid justify-content-center">';
                                                                }
                                                                  htmlProd += '<div class="card col-12 col-sm-6 col-md-4 bg-light border-primary mb-3">'+
                                                                            '<div class="card-deck">'+
                                                                              '<div class="card-header col-md-12">'+
                                                                                  '<img class="card-img-top" src="' + data["product"][i]["srcImg"] + '" alt="Image de ' + data["product"][i]["nameProd"] + '">' +
                                                                              '</div>'+
                                                                                '<div class="card-body text-center">'+
                                                                                    '<h5 class="card-title col-md-12 pl-0 pr-0"  id="' + data["product"][i]["IdProd"] +'">'+ data["product"][i]["nameProd"] +'</h5>'+
                                                                                    '<h5 class="card-title col-md-12 pl-0 pr-0">Prix : ' + data["product"][i]["price"] + ' € </h5>'+

                                                                                    '<p class="card-text">' + data["product"][i]["compoProd"] + '</p>'+
                                                                                    '<p class="card-text">' + data["product"][i]["quantityStock"] + ' pièces</p>'+
                                                                                '</div>'+

                                                                                '<div class="text-center col-md-12 force-to-bottom">'+
                                                                                    '<button type="button" onclick=loadProduct(this) id=' + data["product"][i]["IdProd"] + ' class="btn btn-outline-success btn-lg col-md-12 mr-2 mt-3 mb-2 pl-0 pr-0">Réserver</button>';

                                                                                   if(data[1]==2){
                                                                                        htmlProd +=
                                                                                      '<button type="button" onclick=load_update_product(this) id=' + data["product"][i]["IdProd"] + ' class="btn btn-outline-warning btn-lg col-md-12 mr-2 mt-2 mb-0 pl-0 pr-0 ">Modifier/Supprimer</button>';
                                                                                    }



                                                                  htmlProd+='</div>'+
                                                                              '</div>'+
                                                                            '</div>';

                                                                if(i%3==2){
                                                                  htmlProd += '</div>';
                                                                }


                                                            }


                                                            $('#body').html(htmlProd);

                                                          }
                                                        });
                                                      });



                     display_button_connected(data);

                  }

              });
          }



          function loadListProductByCategory(e){

              document.getElementById('div_search').style.display="block";

              var idCat= e.getAttribute('id');
              /*var root = url_list_product_by_category;
              var newS= idCat.substr(1,idCat.length-2);
              var adr = root.concat(newS);*/
              var adr= url_list_product_by_category.concat(idCat);
              console.log(adr);

              $.ajax({
                  type  : 'GET',
                  url   : adr,
                  async : true,
                  dataType : 'json',
                  success : function(data){
                      var htmlProduct = '';
                      var i;
                      for(i=0; i<data[0].length; i++){
                          if(i%3==0){
                            htmlProduct += '<div class="card-deck container-fluid justify-content-center">';
                          }
                            htmlProduct += '<div class="card col-12 col-sm-6 col-md-4 bg-light border-primary mb-3">'+
                                      '<div class="card-deck">'+
                                        '<div class="card-header col-md-12">'+
                                            '<img class="card-img-top" src="' + data[0][i].srcImg + '" alt="Image de ' + data[0][i].nameProd + '">' +
                                        '</div>'+
                                          '<div class="card-body text-center">'+
                                              '<h5 class="card-title col-md-12 pl-0 pr-0"  id="' + data[0][i].IdProd +'">'+ data[0][i].nameProd +'</h5>'+
                                              '<h5 class="card-title col-md-12 pl-0 pr-0">Prix : ' + data[0][i].price + ' € </h5>'+

                                              '<p class="card-text">' + data[0][i].compoProd + '</p>'+
                                              '<p class="card-text">' + data[0][i].quantityStock + ' pièces</p>'+
                                          '</div>'+

                                          '<div class="text-center col-md-12 force-to-bottom">'+
                                              '<button type="button" onclick=loadProduct(this) id=' + data[0][i].IdProd + ' class="btn btn-outline-success btn-lg col-md-12 mr-2 mt-3 mb-2 pl-0 pr-0">Réserver</button>';

                                             if(data[1]==2){
                                                  htmlProduct +=
                                                '<button type="button" onclick=load_update_product(this) id=' + data[0][i].IdProd + ' class="btn btn-outline-warning btn-lg col-md-12 mr-2 mt-2 mb-0 pl-0 pr-0 ">Modifier/Supprimer</button>';
                                              }



                            htmlProduct+='</div>'+
                                        '</div>'+
                                      '</div>';

                          if(i%3==2){
                            htmlProduct += '</div>';
                          }


                      }



                      $('#body').html(htmlProduct);


                     display_button_connected(data);

                  }

              });
          }

          /*if()
          {
            window.onload(loadListProduct());
          }*/

          //function show selected product
          function loadProduct(e){
                /*  document.getElementById('welcome').style.display="none";
                  document.getElementById('list_product').style.display="none";
                  document.getElementById('selected_product').style.display="block";
                  document.getElementById('registration_user').style.display="none";
                  document.getElementById('list_category').style.display="none";
    */
                document.getElementById('div_search').style.display="none";
                  var idProd= e.getAttribute('id');


                    $.ajax({
                      type : 'GET',
                      async : true,
                      url: url_product_id,
                      data: 'id_Prod='+ idProd,
                      dataType : 'text',
                      success: function(s) {

                        var root = url_product_info;
                        var newS= s.substr(1,s.length-2);
                        var adr = root.concat(newS);
                      $.ajax({
                          type  : 'GET',
                          url   : adr,
                          async : true,
                          dataType : 'json',
                          success : function(data){
                            var today = new Date();
                            var seven_day = new Date();
                            var dd = today.getDate();
                            //var dd7 = dd+7;
                            var mm = today.getMonth()+1;
                            var yyyy = today.getFullYear();
                             if(dd<10){
                                    dd='0'+dd
                                }
                                if(mm<10){
                                    mm='0'+mm
                                }

                            today = yyyy+'-'+mm+'-'+dd;
                            //seven_day = yyyy+'-'+mm+'-'+dd7;
                            console.log(data['isAdmin']);

                              var html = '';
                              html+= '<div class="container">'+
                                        '<div class="col-md-4">'+
                                          '<img src="' + data['product_info'][0].srcImg + '" class="rounded float-left" alt="Pain au chocolat">'+
                                        '</div>'+
                              '</div>'+
                              '<div class="container justify-content-md-center">'+
                                        '<div class="col-md-8">'+
                                          '<h3 class="font-weight-bold display-4" id="nameProd">'+ data['product_info'][0].nameProd +'</p>'+
                                        '</div>'+
                                        '<div class="row">'+
                                          '<div class="col-md-4">'+
                                            '<p class="font-weight-normal">Prix : '+ data['product_info'][0].price +' euros</p>'+
                                          '</div>'+
                                          '<div class="col-md-8">'+
                                            '<p class="font-weight-normal">Quantité en stock : '+ data['product_info'][0].quantityStock +' pièces</p>'+
                                          '</div>'+
                                        '</div>';
                                        //If connected on admin show button admin
                                        if(data['isAdmin']==2){
                                            html+='<div class="row">'+
                                              '<button type="button" onclick=load_update_product(this) id=' + data['product_info'][0].IdProd + ' class="btn btn-outline-warning btn-lg col-md-4 mr-md-2 mt-md-2 mb-md-2 ">Modifier le produit</button>'+
                                              '<a href=' + url_delete_product + data['product_info'][0].IdProd + ' id=' + data['product_info'][0].IdProd + ' class="btn btn-outline-danger btn-lg col-md-4 mr-md-2 mt-md-2 mb-md-2 ">Supprimer le produit</a>'+
                                            '</div>';
                                          }

                                        html+='<div class="row">'+
                                          '<div class="col-md-8 alert alert-warning" role="alert">'+
                                            '<p class="font-weight-normal">Attention vous devrez régler votre commande en caisse en arrivant ! Le cas échéant votre commande ne vous sera pas remise.</p>'+
                                          '</div>'+
                                        '</div>'+
                                        '<div class="row">'+
                                          '<div class="col-md-8">'+
                                            '<p class="font-weight-normal">Composition : '+ data['product_info'][0].compoProd +'</p>'+
                                          '</div>'+
                                        '</div>'+


                                          '<form id="form_book_product" class="needs-validation" method="post">'+
                                            '<div class="row">'+
                                                '<div class="form-group row col-md-6">'+
                                                  '<label  for="quantityProduct" class="col-md-3 field_title">Quantité à réserver :</label>'+
                                                  '<div class="col-md-5">'+
                                                    '<input id="quantityProduct" min="1" max="' + data['product_info'][0].quantityStock + '" name="quantityProduct" value="" class="form-control here" required="required" type="number">'+
                                                  '</div>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="row">'+
                                                '<div class="form-group row col-md-6">'+
                                                  '<label for="dateDay" class="col-md-3 col-form-label">Date (Jour) :</label>'+
                                                  '<div class="col-md-5">'+
                                                    '<input id="dateDay" name="dateDay" required min="' + today + '" value="" class="form-control here" type="date">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row col-md-6">'+
                                                  '<label for="dateHour" class="col-md-3 col-form-label">Date (Heure) :</label>'+
                                                  '<div class="col-md-5">'+
                                                    '<input id="dateHour" name="dateHour" min="06:00" max="20:00" required value="" class="form-control here" type="time">'+
                                                  '</div>'+
                                                '</div>'+
                                              '</div>'+

                                            '<div class="row">'+
                                              '<div class="md-form amber-textarea active-amber-textarea col-md-12">'+
                                                '<i class="fas fa-pencil-alt prefix"></i>'+
                                                '<label for="comment">Précisions pour la réservation :</label>'+
                                                '<textarea id="comment" name="comment" placeholder="Cuisson du pain , viennoiseries, etc..." class="md-textarea form-control here" rows="3"></textarea>'+
                                              '</div>'+
                                            '</div>'+
                                            '<div class="row" hidden>'+
                                                '<label for="idProd" col-form-label"></label>'+
                                                '<div class="col-md-8">'+
                                                  '<input id="idProd" name="idProd" value='+ data['product_info'][0].IdProd + ' type="number">'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="row">'+
                                                '<div class="form-group row">'+
                                                  '<button class="btn btn-primary" onclick=form_validation type="submit" id="button_save">Réserver</button>'+
                                                '</div>'+
                                            '</div>'+
                                          '</form>'+



                                          '<button onclick=loadListProduct()>Retour liste produit</button>'+

                                          // INSERT QUANTITY TO BOOK AFTER

                              '</div>';


                              $('#body').html(html);
                              $('#form_book_product').submit(function(e){
                                          //e.preventDefault();

                                          var dataForm = $(this).serialize();
                                          $.ajax({
                                              type : "POST",
                                              url  : url_book_product,
                                              dataType : "JSON",
                                              data : dataForm,
                                              success: function(msg){
                                                console.log(msg);
                                                  if(msg.isAdmin==null){
                                                    alert("Vous devez être connecté avec un compte client pour pouvoir réserver !");
                                                  }
                                                  else if(msg.isAdmin==2){
                                                    alert("Vous ne pouvez pas réserver en tant qu'administrateur !");
                                                  }
                                                  else if(msg.form_not_valid==true){
                                                    alert("Vous n'avez pas rentré de bonnes valeurs dans les champs du formulaire !");
                                                  }
                                                  else if(msg.before_book_impossible==true){
                                                    alert("Vous ne pouvez pas réserver dans le passé désolé !");
                                                  }
                                                  else if(msg.TooLate==true){
                                                    alert("Attention vous ne pouvez pas réserver au plus de 7 jours !");
                                                  }
                                                  else{
                                                    alert("Réservation confirmée ! Vous pouvez maintenant la consulter dans l'onglet 'Vos réservations' !");
                                                    loadListProduct();
                                                  }
                                              }
                                          });
                                          return false;
                                      });
                          }

                      });
                    }
                  });
            }


        function loadListCategory(){
          /*document.getElementById('welcome').style.display="none";
          document.getElementById('list_product').style.display="none";
          document.getElementById('selected_product').style.display="none";
          document.getElementById('registration_user').style.display="none";
          document.getElementById('list_category').style.display="block";*/
          document.getElementById('div_search').style.display="none";

            $.ajax({
                type  : 'GET',
                url   : url_category,
                async : true,
                dataType : 'json',
                success : function(data){
                  console.log(data);
                    var htmlCat = '';
                    var i;
                    htmlCat += '<div class="col-md-12 mt-4 mb-4 text-center">'+
                                '<h3>Liste des catégories</h3>'+
                              '</div>';
                    for(i=0; i<data[0].length; i++){

                          if(i%3==0){
                            htmlCat += '<div class="card-deck container-fluid justify-content-center">';
                          }
                            htmlCat+=
                                      '<div class="card col-12 col-sm-6 col-md-4 bg-light border-primary mb-3" >'+
                                      '<div class="card-deck">'+
                                      '<div class="card-header col-md-12"><img class="card-img-top" src="' + data[0][i].imgSrc + '" alt="Image de ' + data[0][i].nameCat + '"></div>'+
                                      '<div class="card-body text-center text-primary">'+
                                          '<h5 class="card-title col-md-12 pl-0 pr-0">' + data[0][i].nameCat + '</h5>'+
                                      '</div>'+
                                      '<div class=" text-center col-md-12 force-to-bottom">'+

                                          '<button type=button class="btn btn-outline-success btn-lg col-md-12 mr-2 mt-3 mb-2 pl-0 pr-0 " id="' + data[0][i].IdCat + '" onclick=loadListProductByCategory(this) >Allez voir !</button>';

                                  if(data[1]==2){
                                      htmlCat+=
                                            '<button type="button" onclick=load_update_category(this) id="' + data[0][i].IdCat + '" class="btn btn-outline-warning btn-lg col-md-12 mr-2 mt-2 mb-0 pl-0 pr-0 ">Modifier catégorie</button>';
                                          }

                                  htmlCat+='</div>'+
                                      '</div>'+
                                    '</div>';
                          if(i%3==2){
                            htmlCat += '</div>';
                          }
                        }
                    $('#body').html(htmlCat);
                    display_button_connected(data);
                }
            });
        }

        function load_create_update_page(){
          document.getElementById('div_search').style.display="none";

            var html="";
            html+='<div class=container>'+
                    '<div class="row">'+
                      '<button type="button" onclick=load_create_product() class="btn btn-outline-success btn-lg col-md-5 mr-md-5 mt-5 p-5">Ajouter un produit</button>'+
                      '<button type="button" onclick=load_create_category() class="btn btn-outline-success btn-lg col-md-5 ml-5 mt-5 p-5">Ajouter une catégorie</button>'+
                    '</div>'+
                  '</div>'+
                  '<div class=container>'+
                        '<div class="row">'+
                          '<button type="button" onclick="loadListProduct()" class="btn btn-outline-warning btn-lg col-md-5 mr-md-5 mt-5 p-5">Modifier un produit</button>'+
                          '<button type="button" onclick="loadListCategory()" class="btn btn-outline-warning btn-lg col-md-5 ml-5 mt-5 p-5">Modifier une catégorie</button>'+
                        '</div>'+
                  '</div>'+
                  '<div class=container>'+
                          '<div class="row">'+
                            '<button type="button" onclick="loadListProduct()" class="btn btn-outline-danger btn-lg col-md-5 mr-md-5 mt-5 p-5">Supprimer un produit</button>'+
                          '</div>'+
                  '</div>';
            //var element = document.getElementById("body");
            $('#body').html(html);

        }

        function load_create_product(){

          $.ajax({
              type  : 'GET',
              url   : url_category,
              async : true,
              dataType : 'json',
              success : function(data){
                console.log(data);
                var i=0;
                var html='';
                html+=
                '<div class="container">'+
                    '<div class="row">'+

                      '<div class="col-md-12">'+
                          '<div class="card">'+
                              '<div class="card-body">'+
                                  '<div class="row">'+
                                      '<div class="col-md-7">'+
                                          '<h4>Ajouter un produit</h4>'+
                                          '<hr>'+
                                      '</div>'+
                                      '<div class="col-md-5  d-flex flex-row-reverse mb-2">'+
                                        '<button name="listProduct" type="submit" onclick=loadListProduct() class="btn btn-primary pull-right">Retour aux produits</button>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="row">'+
                                      '<div class="col-md-12">'+
                                          '<form action=' + url_product_create + ' method="POST" enctype="multipart/form-data" id="form_create_product">'+

                                                '<div class="form-group row">'+
                                                  '<label for="nameProd" class="col-4 col-form-label">Nom du produit :</label>'+
                                                  '<div class="col-8">'+
                                                    '<input id="nameProd" name="nameProd" class="form-control here" required="required" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row">'+
                                                  '<label for="price" class="col-4 col-form-label">Prix :</label>'+
                                                  '<div class="col-8">'+
                                                    '<input id="price" name="price" class="form-control here" type="number" required step="0.01">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row">'+
                                                  '<label for="quantityStock" class="col-4 col-form-label">Quantité en stock :</label>'+
                                                  '<div class="col-8">'+
                                                    '<input id="quantityStock" name="quantityStock" class="form-control here" required type="number">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row">'+
                                                  '<div class="md-form amber-textarea active-amber-textarea col-md-12">'+
                                                    '<i class="fas fa-pencil-alt prefix"></i>'+
                                                    '<label for="compoProd">Composition du produit :</label>'+
                                                    '<textarea id="compoProd" name="compoProd" placeholder="" class="md-textarea form-control here" required rows="3"></textarea>'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row">'+
                                                  '<label for="IdCat" class="col-4 col-form-label">Catégorie du produit</label>'+
                                                  '<div class="col-8">'+
                                                    '<select name="IdCat" id="IdCat">';
                                                        for(i=0; i<data[0].length; i++){
                                                          html+='<option value="' + data[0][i]['IdCat'] + '">' + data[0][i]['nameCat'] + '</option>';
                                                        }
                                                    html+='</select>'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="form-group row">'+
                                                  '<label for="srcImg" class="col-4 col-form-label">Sélectionner une image pour votre produit :</label>'+
                                                  '<div class="col-8">'+
                                                    '<input type="file" id="srcImg" class="form-control-file" name="srcImg" size="50" required />'+
                                                  '</div>'+
                                               '</div>'+

                                                '<div class="form-group row">'+
                                                  '<div class="offset-4 col-8">'+
                                                    '<button name="submit" type="submit" class="btn btn-primary">Créer le produit</button>'+
                                                  '</div>'+
                                                '</div>'+
                                              '</form>'+
                                      '</div>'+
                                  '</div>'+

                             '</div>'+
                          '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';

                  $('#body').html(html);

                  display_button_connected(data);
              }
          });



        }

        function load_create_category(){
          var html=
          '<div class="container">'+
              '<div class="row">'+
                '<div class="col-md-12">'+
                    '<div class="card">'+
                        '<div class="card-body">'+
                            '<div class="row">'+
                                '<div class="col-md-7">'+
                                    '<h4>Ajouter une catégorie</h4>'+
                                    '<hr>'+
                                '</div>'+
                                '<div class="col-md-5  d-flex flex-row-reverse mb-2">'+
                                  '<button name="listCategory" type="submit" onclick=loadListCategory() class="btn btn-primary pull-right">Retour aux catégories</button>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<form action=' + url_category_create + ' method="POST" enctype="multipart/form-data" id="form_create_category">'+
                                        '<div class="form-group row">'+
                                          '<label for="nameCat" class="col-4 col-form-label">Nom de la catégorie :</label>'+
                                          '<div class="col-8">'+
                                            '<input id="nameCat" name="nameCat" class="form-control here" required="required" type="text">'+
                                          '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                          '<label for="srcImg" class="col-4 col-form-label">Sélectionner une image pour votre catégorie :</label>'+
                                          '<div class="col-8">'+
                                            '<input type="file" id="srcImg" name="srcImg" required />'+
                                          '</div>'+
                                       '</div>'+
                                      '<div class="form-group row">'+
                                          '<div class="offset-4 col-8">'+
                                            '<button name="submit" type="submit" class="btn btn-primary">Créer la catégorie</button>'+
                                          '</div>'+
                                        '</div>'+
                                    '</form>'+
                            '</div>'+
                        '</div>'+

                   '</div>'+
                '</div>'+
            '</div>'+
          '</div>'+
        '</div>';

        $('#body').html(html);

        }

        function load_update_product(e){
          var idProd= e.getAttribute('id');
          document.getElementById('div_search').style.display="none";


          $.ajax({
              type  : 'GET',
              url   : url_category,
              async : true,
              dataType : 'json',
              success : function(dataCategory){

              $.ajax({
                type : 'GET',
                async : true,
                url: url_product_info_admin,
                data: 'IdProd='+ idProd,
                dataType : 'JSON',
                success: function(dataProduct) {


               var html= '<div class="container">'+
                 '<div class="row">'+

                   '<div class="col-md-12">'+
                       '<div class="card">'+
                           '<div class="card-body">'+
                               '<div class="row">'+
                                   '<div class="col-md-7">'+
                                      ' <h4>Modifier le produit ' + dataProduct[0].nameProd + '</h4>'+
                                       '<hr>'+
                                   '</div>'+
                                   '<div class="col-md-5  d-flex flex-row-reverse mb-2">'+
                                     '<button name="listProduct" type="submit" onclick=loadListProduct() class="btn btn-primary pull-right">Retour aux produits</button>'+
                                   '</div>'+
                               '</div>'+
                               '<div class="row">'+
                                   '<div class="col-md-12">'+
                                       '<form action=' + url_product_update + ' method="POST" enctype="multipart/form-data">'+
                                             '<div class="form-group row" hidden>'+
                                               '<label for="IdProd" class="col-4 col-form-label"></label>'+
                                               '<div class="col-8">'+
                                                 '<input id="IdProd" name="IdProd" value="' + dataProduct[0].IdProd + '" class="form-control here" type="text">'+
                                               '</div>'+
                                             '</div>'+
                                             '<div class="form-group row">'+
                                               '<label for="nameProd" class="col-4 col-form-label">Nom du produit :</label>'+
                                               '<div class="col-8">'+
                                                 '<input id="nameProd" name="nameProd" value="' + dataProduct[0].nameProd + '" class="form-control here" required="required" type="text">'+
                                               '</div>'+
                                             '</div>'+
                                             '<div class="form-group row">'+
                                               '<label for="price" class="col-4 col-form-label">Prix :</label>'+
                                               '<div class="col-8">'+
                                                 '<input id="price" name="price" value="' + dataProduct[0].price + '" class="form-control here" step="0.01" type="number">'+
                                               '</div>'+
                                             '</div>'+
                                             '<div class="form-group row">'+
                                               '<label for="quantityStock" class="col-4 col-form-label">Quantité en stock :</label>'+
                                               '<div class="col-8">'+
                                                 '<input id="quantityStock" name="quantityStock" value="' + dataProduct[0].quantityStock + '" class="form-control here" type="number">'+
                                               '</div>'+
                                             '</div>'+
                                             '<div class="form-group row">'+
                                               '<div class="md-form amber-textarea active-amber-textarea col-md-12">'+
                                                 '<i class="fas fa-pencil-alt prefix"></i>'+
                                                 '<label for="compoProd">Composition du produit :</label>'+
                                                 '<textarea id="compoProd" name="compoProd" class="md-textarea form-control here" rows="3">' + dataProduct[0].compoProd + '</textarea>'+
                                               '</div>'+
                                             '</div>'+
                                             '<div class="form-group row">'+
                                               '<label for="IdCat" class="col-4 col-form-label">Catégorie du produit</label>'+
                                               '<div class="col-8">'+
                                               '<select name="IdCat" id="IdCat">'+
                                                  '<option value="' + dataProduct[0].IdCat + '">' + dataProduct[0].nameCat + '</option>';
                                                  for(i=0; i<dataCategory[0].length; i++){
                                                    if(dataCategory[0][i]['IdCat'] != dataProduct[0].IdCat){
                                                      html+='<option value="' + dataCategory[0][i]['IdCat'] + '">' + dataCategory[0][i]['nameCat'] + '</option>';
                                                    }
                                                  }
                                               html+='</select>'+
                                               '</div>'+
                                             '</div>'+

                                             '<div class="form-group row">'+
                                               '<label for="srcImg" class="col-4 col-form-label">Sélectionner une nouvelle image pour votre catégorie :</label>'+
                                               '<div class="col-8">'+
                                                 '<input type="file" id="srcImg" name="srcImg" />'+
                                               '</div>'+
                                            '</div>'+



                                             '<div class="form-group row">'+

                                               '<div class=" col-md-12">'+
                                                 '<button name="submit" type="submit" class="btn btn-primary col-md-3 offset-4">Enregistrer vos modifications</button>'+
                                                 '<a href=' + url_delete_product + dataProduct[0].IdProd + ' id=' + dataProduct[0].IdProd + ' class="btn btn-outline-danger offset-4  col-md-3 mr-md-2 mt-md-2 mb-md-2 ">Supprimer le produit</a>'+

                                               '</div>'+

                                             '</div>'+
                                           '</form>'+
                                   '</div>'+
                               '</div>'+

                           '</div>'+
                       '</div>'+
                   '</div>'+
                 '</div>'+
               '</div>';

               $('#body').html(html);
             }
           });
         }
       });

      }

        function load_update_category(e){
             var idCat= e.getAttribute('id');

             $.ajax({
               type : 'GET',
               async : true,
               url: url_category_info,
               data: 'IdCat='+ idCat,
               dataType : 'JSON',
               success: function(dataCategory) {


              var html= '<div class="container">'+
            		'<div class="row">'+

            			'<div class="col-md-12">'+
            			    '<div class="card">'+
            			        '<div class="card-body">'+
                            '<div class="row">'+
                                '<div class="col-md-7">'+
                                   ' <h4>Modifier la catégorie ' + dataCategory[0].nameCat + '</h4>'+
                                    '<hr>'+
                                '</div>'+
                                '<div class="col-md-5  d-flex flex-row-reverse mb-2">'+
                                  '<button name="listCategory" type="submit" onclick=loadListCategory() class="btn btn-primary pull-right">Retour aux catégories</button>'+
                                '</div>'+
                            '</div>'+
            			           '<div class="row">'+
            			                '<div class="col-md-12">'+
            			                    '<form action=' + url_category_update +' enctype="multipart/form-data" method="POST">'+
                                            '<div class="form-group row" hidden>'+
                                              '<label for="IdCat" class="col-4 col-form-label">Nouveau nom de catégorie</label>'+
                                              '<div class="col-8">'+
                                                '<input id="IdCat" name="IdCat" value="' + dataCategory[0].IdCat + '" class="form-control here" type="text">'+
                                              '</div>'+
                                            '</div>'+
            	                              '<div class="form-group row">'+
            	                                '<label for="nameCat" class="col-4 col-form-label">Nouveau nom de catégorie</label>'+
            	                                '<div class="col-8">'+
            	                                  '<input id="nameCat" name="nameCat" value="' + dataCategory[0].nameCat + '" class="form-control here" type="text">'+
            	                                '</div>'+
            	                              '</div>'+
                                            '<div class="form-group row">'+
                                              '<label for="srcImg" class="col-4 col-form-label">Sélectionner une nouvelle image pour votre catégorie :</label>'+
                                              '<div class="col-8">'+
                                                '<input type="file" id="srcImg" name="srcImg" />'+
                                              '</div>'+
                                           '</div>'+

            	                              '<div class="form-group row">'+
            	                                '<div class="offset-4 col-8">'+
            	                                  '<button name="submit" type="submit" class="btn btn-primary">Enregistrer vos modifications</button>'+
            	                                '</div>'+
            	                              '</div>'+
            	                            '</form>'+
            			                '</div>'+
            			            '</div>'+

            			        '</div>'+
            			    '</div>'+
            			'</div>'+
            		'</div>'+
            	'</div>';

              $('#body').html(html);

              /*  $("#form_update_category").on('submit','form',(function(e1) {
                      e1.preventDefault();
                      //var IdCat= $("#IdCat").val();
                      //var nameCat = $("#nameCat").val();
                      // First an ajax request to upload the image as it requires separate request
                      $.ajax({
                          type: "POST",
                          url: url_upload_img,
                          data: new FormData(this),
                          contentType: false,
                          cache: false,
                          processData: false,
                          success: function(resp) {
                              alert(resp);
                          },
                          error: function (resp) {
                              alert(resp);
                          }
                      });*/

                    /*  $.ajax({
                        type: "POST",
                        url: url_category_update,
                        data: "mode=details&IdCat="+IdCat+"+&nameCat="+nameCat,
                        success: function(resp) {
                            // resp contains what is echoed on update.php
                            alert(resp);
                        }
                        });
                        return false;
                      }));*/


                  //}));
                    }
          });
        }


            //function registration user
      function makeRegistration(){
              document.getElementById('div_search').style.display="none";

              var html =
                '<div class="col-md-1 mb-5 mt-5">'+
                  '<h1 class="display-3">Inscription</h1>'+
                '</div>'+
              '<form id="form_registration" class="needs-validation" novalidate method="post">'+
                  '<div class="form-row">'+
                    '<div class="col-md-4 mb-3">'+
                      '<label for="firstName">Prénom</label>'+
                      '<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Prénom" required>'+
                      '<div class="valid-feedback">'+
                        'Correct !'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-4 mb-3">'+
                      '<label for="lastName">Nom</label>'+
                      '<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Nom" required>'+
                      '<div class="valid-feedback">'+
                        'Correct !'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-4 mb-3">'+
                      '<label for="email">Email</label>'+
                      '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                          '<span class="input-group-text" id="inputGroupPrepend">@</span>'+
                        '</div>'+
                        '<input type="text" class="form-control" id="email" name="email" placeholder="email" aria-describedby="inputGroupPrepend" required>'+
                        '<div class="invalid-feedback">'+
                          'Veuillez rentrer une bonne adresse email.'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+

                  '<div class="form-row">'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="phoneNumber">Numéro de téléphone</label>'+
                      '<input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="0466459386" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer un bon numéro de téléphone.'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="yearBirth">Date de Naissance</label>'+
                      '<input type="date" class="form-control" name="yearBirth" id="yearBirth" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer une bonne date de naissance.'+
                      '</div>'+
                    '</div>'+
                  '</div>'+

                  '<div class="form-row">'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="password">Mot de passe</label>'+
                      '<input type="password" autocomplete="off" class="form-control" name="password" id="password" placeholder="Mot de passe" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer un mot de passe correct.'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="passwordConfirm">Confirmation mot de passe</label>'+
                      '<input type="password" autocomplete="off" class="form-control" name="passwordConfirm" id="passwordConfirm" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer un mot de passe correct.'+
                      '</div>'+
                    '</div>'+
                  '</div>'+

                  '<div class="form-row">'+
                    '<div class="col-md-6 mb-3">'+
                      '<label for="street">Adresse</label>'+
                      '<input type="text" class="form-control" name="street" id="street" placeholder="numéro + rue" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer une adresse valide.'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="city">Ville</label>'+
                      '<input type="text" class="form-control" name="city" id="city" placeholder="Ville" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer une ville valide'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-3 mb-3">'+
                      '<label for="postalCode">Code Postal</label>'+
                      '<input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="Code Postal" required>'+
                      '<div class="invalid-feedback">'+
                        'Veuillez rentrer un code postal valide.'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="d-flex">'+
                    '<button class="btn btn-primary ml-auto p-2" onclick=form_validation type="submit" id="button_save">Envoyer</button>'+
                  '</div>'+

                '</form>';

              $('#body').html(html);


              $('#form_registration').submit(function(){
                          var firstName = $('#firstName').val();
                          var lastName = $('#lastName').val();
                          var email = $('#email').val();
                          var yearBirth= $('#yearBirth').val();
                          var phoneNumber = $('#phoneNumber').val();
                          var postalCode= $('#postalCode').val();
                          var street= $('#street').val();
                          var password= $('#password').val();
                          var passwordConfirm= $('#passwordConfirm').val();
                          var city= $('#city').val();


                          $.ajax({
                              type : "POST",
                              url  : url_registration,
                              dataType : "JSON",
                              data : {firstName:firstName,lastName:lastName,email:email,
                                yearBirth:yearBirth, phoneNumber:phoneNumber , postalCode:postalCode,
                                street:street,password:password,passwordConfirm:password,city:city},
                              success: function(form_validate){
                                if(form_validate=="true"){
                                  alert("Vous vous êtes inscrits avec succès ! Veuilez maintenant vous connecter si vous voulez réserser des produits !")
                                  loadListProduct();
                                }
                                else{
                                  alert("Nous somme désolés mais quelques champs sont incorrects veuillez vérifiez vos informations ! Vérifiez que vos informations sont au bon format. Si le problème persiste cela vient du fait que l'adresse email est déjà utilisée")
                                }
                              }
                          });
                          return false;
                      });
            }


            //  for disabling form submissions if there are invalid fields
            /*function form_validation(){
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            }*/
    </script>




  </head>
