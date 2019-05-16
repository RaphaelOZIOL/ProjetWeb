<body>
  <<div class="container" id="div_search">
  </div>
  <div class=container id="body">


  <table id="dtBook" class="table table-striped table-bordered" cellspacing="10em" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Réserver pour le
        </th>
        <th class="th-sm">A récupérer à
        </th>
        <th class="th-sm">Produit
        </th>
        <th class="th-sm">Précision sur la commande
        </th>
        <th class="th-sm">Quantité
        </th>
        <th class="th-sm">Prix total
        </th>
        <th class="th-sm">Annuler la réservation
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
        <td><?php echo $list_book[$i]->dateHour; ?></td>
        <td><?php echo $list_book[$i]->nameProd; ?></td>
        <td><?php echo $list_book[$i]->comment; ?></td>
        <td><?php echo ($list_book[$i]->quantity." pièces"); ?></td>
        <td><?php
                  $price=(float) $list_book[$i]->price;
                //  echo $price;
                  $quantity=(float) $list_book[$i]->quantity;
                  echo ($price*$quantity." € Au total");
        ?></td>
        <td><a href=<?php echo site_url("book/delete_book/").$list_book[$i]->idBook?> class="btn btn-outline-danger col-md-12">Annuler</button></td>

      </tr>
    <?php } ?>

    </tbody>

  </table>

  <script>
  $(document).ready(function () {
    $('#dtBook').DataTable({
    "searching": true, // false to disable search (or any other option)
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
    "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}
  });


    $('.dataTables_length').addClass('bs-select');

  });

  </script>

  </div>
</body>

</html>
