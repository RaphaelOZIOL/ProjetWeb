
  <body>

      <div class=container id=list_product>
      </div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

<script type="text/javascript">
//function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('product/list_product')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(i%4==0){
                          html += '<div class="row">'+
                        }
                        html += '<div class="col-md-3">'+
                          '<div class="card-deck">'+
                            '<div class="card">'+
                              '<a href="view/descriptionProduct.php">'+
                                '<img class="card-img-top" src="assets/images/painChocolat.jpg" alt="Card image cap">'+
                              '</a>'+
                              '<div class="card-block">'+
                                '<a href="">'+
                                  '<h5 class="card-title">'+ data[i].nameProd +' - ' + data[i].price €'</h5>'+
                                '</a>'+
                        				'<p class="card-text">' + data[i].compoProd + '</p>'+
                        				'<p class="card-text">' + data[i].quantity + ' pièces</p>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        if(i%4==3){
                          html += '</div>';
                        }
                    }
                    $('#list_product').html(html);
                }

            });
        }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
