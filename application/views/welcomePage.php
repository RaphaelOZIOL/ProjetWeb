<body>

<!-- WELCOME PAGE -->
  <div class="container text-center my-auto" id="welcome">
      <h1 class="mb-1">Stylish Portfolio</h1>
      <h3 class="mb-5">
        <em>A Free Bootstrap Theme by Start Bootstrap</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
    </div>

<!-- List Product -->
  <div class="container" id="list_product">
  </div>
<!--  -->

<!-- Selected Product -->
  <div class="container" id="selected_product">
  </div>
<!--  -->

  <script>
  //function show all product
        function loadListProduct(){
          document.getElementById('welcome').style.display="none";
            $.ajax({
                type  : 'GET',
                url   : '<?php echo site_url('product/list_product')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(i%4==0){
                          html += '<div class="row">';
                        }
                          html += '<div class="col-md-3">'+
                                    '<div class="card-deck">'+
                                      '<div class="card">'+
                                          '<img class="card-img-top" src="assets/images/painChocolat.jpg" alt="Card image cap">'+
                                        '<div class="card-block">'+
                                            '<h5 class="card-title" onclick=loadProduct(this) id="' + data[i].IdProd +'">'+ data[i].nameProd +' - ' + data[i].price + ' € </h5>'+
                                          '<p class="card-text">' + data[i].compoProd + '</p>'+
                                          '<p class="card-text">' + data[i].quantity + ' pièces</p>'+
                                        '</div>'+
                                      '</div>'+
                                    '</div>';

                        if(i%4==3){
                          html += '</div>';
                        }

                        html+= '</div>';
                    }
                    if(i%4!=0){
                      html+='</div>';
                    }
                    html+= '<nav aria-label="Page navigation example">'+
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

                    $('#list_product').html(html);
                }

            });
        }

        //function show selected product
        function loadProduct(e){
                document.getElementById('welcome').style.display="none";
                document.getElementById('list_product').style.display="none";

                var idProd= e.getAttribute('id');

                  $.ajax({
                    type : 'GET',
                    async : true,
                    url: '<?php echo site_url('product/afficher_idProd')?>',
                    data: 'id_Prod='+ idProd,
                    dataType : 'text',
                    success: function(s) {

                      var root = "<?php echo site_url('product/product_info/')?>";
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
                                        '<img src="../painChocolat.jpg" class="rounded float-left" alt="Pain au chocolat">'+
                                      '</div>'+
                                      '<div class="col-12 col-sm-6 col-md-8">'+
                                        '<p class="font-weight-bold">Pain au chocolat</p>'+
                                        '<p class="font-weight-normal">Non ergo erunt homines deliciis diffluentes audiendi, si quando de amicitia, quam nec usu </p>'+
                                      '</div>'+
                                      '</div>';

                            $('#selected_product').html(html);
                        }

                    });
                  }
                });
          }
  </script>




  </body>
  </html>


</body>
</html>
