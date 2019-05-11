

// CHANGE WHEN DEPLOYING ON SERVER
var url_connection='http://localhost/LamiDuPain/connexion';
var url_deconnnection='http://localhost/LamiDuPain/connexion/deconnecter';
var url_list_product='http://localhost/LamiDuPain/productAJAX/list_product';
var url_product_id='http://localhost/LamiDuPain/productAJAX/afficher_idProd';
var url_product_info='http://localhost/LamiDuPain/productAJAX/product_info/'';
var url_registration='http://localhost/LamiDuPain/register/registration';
var url_category='http://localhost/LamiDuPain/category/list_category';


function display_button_connected(data){
    var htmlConnection='';
    if(data[1]==null){
      htmlConnection += '<li><a class=nav-link onclick=makeRegistration()><span class="glyphicon glyphicon-user"></span>S\'inscrire</a></li>'+
      '<li><a class=nav-link href="' + url_connection + '"><span class="glyphicon glyphicon-log-in"></span>Se connecter</a></li>';
    }
    else if(data[1]==0){
      htmlConnection+='<li><a class=nav-link href=' + url_deconnnection + '><span class="glyphicon glyphicon-user"></span>Se Déconnecter</a></li>';
    }
    $('#nav_bar_connection').html(htmlConnection);
}

//function show all product
      function loadListProduct(){
        document.getElementById('welcome').style.display="none";
        document.getElementById('list_product').style.display="block";
        document.getElementById('selected_product').style.display="none";
        document.getElementById('registration_user').style.display="none";

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
                                  '<img class="card-img" src="http://localhost/LamiDuPain/assets/images/painChocolat.jpg" alt="Card image">'+
                                  '<div class="card-img-overlay text-center">'+
                                    '<h1 class="card-title display-5 my-auto text-dark text-uppercase">Card title</h5>'+
                                  '</div>'+
                                '</div>';
                      if(i%3==2){
                        htmlCat += '</div>';
                      }
                    }
                $('#nav_category').html(htmlCat);
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
