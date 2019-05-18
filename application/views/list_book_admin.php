<body>
  
  <div class="container" id="div_search">
  </div>
  <div class=container id="body">


<table id="dtBookAdmin" class="table table-striped table-bordered" cellspacing="10em" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Réserver pour le
      </th>
      <th class="th-sm">Client
      </th>
      <th class="th-sm">Produit
      </th>
      <th class="th-sm">Précisions de la commande
      </th>
      <th class="th-sm">Quantité
      </th>
      <th class="th-sm">Prix total
      </th>
      <th class="th-sm">Etat de la commande
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    for($i=0; $i< count($list_book) ;$i++) {
    ?>
    <tr>
      <td><?php echo $list_book[$i]->date; ?></td>
      <td><?php echo ($list_book[$i]->firstName." ".$list_book[$i]->lastName); ?></td>

      <td><?php echo $list_book[$i]->nameProd; ?></td>
      <td><?php echo $list_book[$i]->comment; ?></td>
      <td><?php echo ($list_book[$i]->quantity." pièces"); ?></td>
      <td><?php
                $price=(float) $list_book[$i]->price;
              //  echo $price;
                $quantity=(float) $list_book[$i]->quantity;
                echo ($price*$quantity." € Au total");
      ?></td>
      <td><a href=<?php echo site_url("book/delete_book_admin/").$list_book[$i]->idBook?> class="btn btn-outline-success col-md-12">Le client a payé ?</button></td>

    </tr>
  <?php } ?>

  </tbody>

</table>

</div>

<script>
$(document).ready(function () {
  $('#dtBookAdmin').DataTable({
  "searching": true, // false to disable search (or any other option)
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
  "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}
});


  $('.dataTables_length').addClass('bs-select');

});
</script>
</body>

</html>
