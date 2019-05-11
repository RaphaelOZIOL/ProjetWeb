<body>

<!-- WELCOME PAGE -->
  <?php if($isAdmin==0){ ?>
  <div class="container full-height text-center my-auto" id="welcome">
      <h1 class="mb-1">L'Amie du Pain</h1>
      <h3 class="mb-5">
        <em>Bienvenue sur le site de l'Ami du Pain</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" onclick="loadListProduct()">Liste des produits</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo site_url("connexion")?>">Se connecter</a>
    </div>
  <?php } else {?>
    <div class="container full-height text-center my-auto" id="welcome">
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
  <div class="container" id="registration_user">
    <div class="col-md-1 mb-5 mt-5">
      <h1 class="display-3">Inscription</h1>
    </div>
    <form id="form_registration" class="needs-validation" novalidate method="post">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="firstName">Prénom</label>
          <input type="text" class="form-control" id="firstName" placeholder="Prénom" required>
          <div class="valid-feedback">
            Correct !
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="lastName">Nom</label>
          <input type="text" class="form-control" id="lastName" placeholder="Nom" required>
          <div class="valid-feedback">
            Correct !
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="email">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
            </div>
            <input type="text" class="form-control" id="email" placeholder="email" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Veuillez rentrer une bonne adresse email.
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="phoneNumber">Numéro de téléphone</label>
          <input type="text" class="form-control" id="phoneNumber" placeholder="téléphone" required>
          <div class="invalid-feedback">
            Veuillez rentrer un bon numéro de téléphone.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="yearBirth">Date de Naissance</label>
          <input type="date" class="form-control" id="yearBirth" required>
          <div class="invalid-feedback">
            Veuillez rentrer une bonne date de naissance.
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="password">Mot de passe</label>
          <input type="text" class="form-control" id="password" placeholder="Mot de passe" required>
          <div class="invalid-feedback">
            Veuillez rentrer un mot de passe correct.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="passwordConfirm">Confirmation mot de passe</label>
          <input type="text" class="form-control" id="passwordConfirm" required>
          <div class="invalid-feedback">
            Veuillez rentrer un mot de passe correct.
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="street">Adresse</label>
          <input type="text" class="form-control" id="street" placeholder="numéro + rue" required>
          <div class="invalid-feedback">
            Veuillez rentrer une adresse valide.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="city">Ville</label>
          <input type="text" class="form-control" id="city" placeholder="Ville" required>
          <div class="invalid-feedback">
            Veuillez rentrer une ville valide
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="postalCode">Code Postal</label>
          <input type="text" class="form-control" id="postalCode" placeholder="Code Postal" required>
          <div class="invalid-feedback">
            Veuillez rentrer un code postal valide.
          </div>
        </div>
      </div>
      <div class="d-flex">
        <button class="btn btn-primary ml-auto p-2" onclick=form_validation type="submit" id="button_save">Envoyer</button>
      </div>

    </form>
  </div>
<!--  -->

<!-- Category page -->
  <div class="container" id="list_category">
  </div>
<!-- -->



<script>

// CHANGE WHEN DEPLOYING ON SERVER
var url_connection='http://localhost/LamiDuPain/connexion';
var url_deconnnection='http://localhost/LamiDuPain/connexion/deconnecter';
var url_list_product='http://localhost/LamiDuPain/productAJAX/list_product';
var url_product_id='http://localhost/LamiDuPain/productAJAX/afficher_idProd';
var url_product_info='http://localhost/LamiDuPain/productAJAX/product_info/';
var url_registration='http://localhost/LamiDuPain/register/registration';
var url_category='http://localhost/LamiDuPain/category/list_category';
var url_profile='http://localhost/LamiDuPain/profile';


function display_button_connected(data){
    var htmlConnection='';
    if(data[1]==null){
      htmlConnection += '<li><a class=nav-link onclick=makeRegistration()><span class="glyphicon glyphicon-user"></span>S\'inscrire</a></li>'+
      '<li><a class=nav-link href="' + url_connection + '"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>';
    }
    else if(data[1]==1){
      htmlConnection+='<li><a class=nav-link href=' + url_profile + '><span class="glyphicon glyphicon-user"></span>Profil</a></li>'+
      '<li><a class=nav-link href=' + url_deconnnection + '><span class="glyphicon glyphicon-user"></span>Se Déconnecter</a></li>';
    }
    $('#nav_bar_connection').html(htmlConnection);
}

//function show all product
      function loadListProduct(){
        document.getElementById('welcome').style.display="none";
        document.getElementById('list_product').style.display="block";
        document.getElementById('selected_product').style.display="none";
        document.getElementById('registration_user').style.display="none";
        document.getElementById('list_category').style.display="none";


          $.ajax({
              type  : 'GET',
              url   : url_list_product,
              async : true,
              dataType : 'json',
              success : function(data){
                  var htmlProduct = '';
                  var i;
                  for(i=0; i<data[0].length; i++){
                      if(i%4==0){
                        htmlProduct += '<div class="row">';
                      }
                        htmlProduct += '<div class="col-md-3">'+
                                  '<div class="card-deck">'+
                                    '<div class="card">'+
                                        '<img class="card-img-top" src="' + data[0][i].srcImg + '" alt="Image de ' + data[0][i].nameProd + '">' +
                                      '<div class="card-block">'+
                                          '<h5 class="card-title" onclick=loadProduct(this) id="' + data[0][i].IdProd +'">'+ data[0][i].nameProd +' - ' + data[0][i].price + ' € </h5>'+
                                        '<p class="card-text">' + data[0][i].compoProd + '</p>'+
                                        '<p class="card-text">' + data[0][i].quantity + ' pièces</p>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>';

                      if(i%4==3){
                        htmlProduct += '</div>';
                      }

                      htmlProduct += '</div>';
                  }
                  if(i%4!=0){
                    htmlProduct +='</div>';
                  }
                  htmlProduct += '<nav aria-label="Page navigation example">'+
                          '<ul class="pagination justify-content-end">'+
                            '<li class="page-item disabled">'+
                              '<a class="page-link" href="#" tabindex="-1">Previous</a>'+
                            '</li>'+
                            '<li class="page-item"><a class="page-link" href="#">1</a></li>'+
                            '<li class="page-item"><a class="page-link" href="#">2</a></li>'+
                            '<li class="page-item"><a class="page-link" href="#">3</a></li>'+
                            '<li class="page-item">'+
                              '<a class="page-link" href="#">Next</a>'+
                            '</li>'+
                          '</ul>'+
                        '</nav>';

                  $('#list_product').html(htmlProduct);


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
              document.getElementById('welcome').style.display="none";
              document.getElementById('list_product').style.display="none";
              document.getElementById('selected_product').style.display="block";
              document.getElementById('registration_user').style.display="none";
              document.getElementById('list_category').style.display="none";

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
                          var html = '';
                          html +='<div class="row no-gutters">'+
                                    '<div class="col-6 col-md-4">'+
                                      '<img src="assets/images/painChocolat.jpg" class="rounded float-left" alt="Pain au chocolat">'+
                                    '</div>'+
                                    '<div class="col-12 col-sm-6 col-md-8">'+
                                      '<p class="font-weight-bold">'+ data[0].nameProd +'</p>'+
                                      '<p class="font-weight-normal">'+ data[0].IdProd +'</p>'+
                                      '<p class="font-weight-normal">'+ data[0].price +'</p>'+
                                      '<p class="font-weight-normal">'+ data[0].quantity +'</p>'+

                                      '<button onclick=loadListProduct()>Retour liste produit</button>'
                                      // INSERT QUANTITY TO BOOK AFTER
                                    '</div>'+
                                    '</div>';

                          $('#selected_product').html(html);
                      }

                  });
                }
              });
        }

    function loadListCategory(){
      document.getElementById('welcome').style.display="none";
      document.getElementById('list_product').style.display="none";
      document.getElementById('selected_product').style.display="none";
      document.getElementById('registration_user').style.display="none";
      document.getElementById('list_category').style.display="block";

        $.ajax({
            type  : 'GET',
            url   : url_category,
            async : true,
            dataType : 'json',
            success : function(data){
                var htmlCat = '';
                var i;
                for(i=0; i<data[0].length; i++){

                      if(i%3==0){
                        htmlCat += '<div class="card-deck container-fluid justify-content-center">';
                      }
                        htmlCat+=
                                  '<div class="card bg-dark text-white col-md-4">'+
                                  '<img class="card-img" src="' + data[0][i].imgSrc + '" alt="Card image">'+
                                  '<div class="card-img-overlay text-center">'+
                                    '<h1 class="card-title display-5 my-auto text-dark text-uppercase">' + data[0][i].nameCat + '</h5>'+
                                  '</div>'+
                                '</div>';
                      if(i%3==2){
                        htmlCat += '</div>';
                      }
                    }
                $('#list_category').html(htmlCat);
                display_button_connected(data);
            }
        });
    }



        //function registration user
  function makeRegistration(){
          document.getElementById('welcome').style.display="none";
          document.getElementById('list_product').style.display="none";
          document.getElementById('selected_product').style.display="none";
          document.getElementById('registration_user').style.display="block";
          document.getElementById('list_category').style.display="none";



          $('#form_registration').submit(function(){
                      var firstName = $('#firstName').val();
                      var lastName = $('#lastName').val();
                      var email = $('#email').val();
                      var yearBirth= $('#yearBirth').val();
                      var phoneNumber = $('#phoneNumber').val();
                      var postalCode= $('#postalCode').val();
                      var street= $('#street').val();
                      var password= $('#password').val();
                      var city= $('#city').val();

                      // AJOUTER CONFIRM PASSWORD APRES

                      $.ajax({
                          type : "POST",
                          url  : url_registration,
                          dataType : "JSON",
                          data : {firstName:firstName,lastName:lastName,email:email,
                            yearBirth:yearBirth, phoneNumber:phoneNumber , postalCode:postalCode,
                            street:street,password:password,city:city},
                          success: function(msg){
                              loadListProduct();
                          }
                      });
                      return false;
                  });
        }


        //  for disabling form submissions if there are invalid fields
        function form_validation(){
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
        }
</script>


</body>
</html>
