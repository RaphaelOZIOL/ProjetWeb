
  <body>

    <div class="container">

      <?php
        $i=0;
        foreach ($list_product as $produit){
        ?>
      <?php if($i==0){ ?>
        <div class="row">
      <?php } ?>

      <div class="col-md-3">

        <div class="card-deck">
          <div class="card">
            <a href="view/descriptionProduct.php">
              <img class="card-img-top" src=<?php echo site_url('assets/images/painChocolat.jpg')?> alt="Card image cap">
            </a>
            <div class="card-block">
              <a href="<?php echo site_url('product/descriptionProduct')?>">
                <h5 class="card-title"><?php echo $produit->nameProd?> - <?php echo $produit->price?> €</h5>
              </a>
      				<p class="card-text"><?php echo $produit->compoProd?></p>
      				<p class="card-text"><?php echo $produit->quantity?> pièces</p>
            </div>
          </div>
        </div>

      </div>

      <?php if($i==3){ ?>
        </div>
      <?php
          } ?>
      <?php
          $i++;
          if($i==4){
            $i=0;
          }

        } ?>

    </div>



      <!--
      <div class="card col-3">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card col-3">
        <img class="card-img-top" src="images/painChocolat.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
  -->

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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
