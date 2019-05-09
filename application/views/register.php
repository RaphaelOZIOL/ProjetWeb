<body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Prenom</label>
      <input type="text" class="form-control" id="firstName" placeholder="Prenom">
    </div>
<div class="form-group col-md-6">
      <label for="inputPassword4">Nom</label>
      <input type="text" class="form-control" id="lastName" placeholder="Nom">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone">Telephone</label>
    <input type="text" class="form-control" id="phone" placeholder="0600000000">
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="street" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="city" placeholder="Montpellier">
    </div>
    <div class="form-group col-md-4">
    <label for="inputCPP">CodePOstal</label>
      <input type="text" class="form-control" id="postalCode" placeholder="34000">
    </div>
  </div>
  <div class="form-group">
  <label for="inputDate">Date de naissance</label>
  <input type="date" id="yearBirth">
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" id="button_save" >M'inscrire</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$('#button_save').on('click',function(){
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var email = $('#email').val();
            var yearBirth= $('#yearBirth').val();
            var phoneNumber = $('#phoneNumber').val();
            var postalCode= $('#postalCode').val();
            var street= $('#street').val();
            var password= $('#password').val();
            var city= $('#city').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('connection/registration')?>",
                dataType : "JSON",
                data : {firstName:firstName , lastName:lastName, email:email, yearbirth:yearbirth, phone:phone , postalCode:postalCode,
                  street:street, password:password, city:city},
                success: function(data){
                  $('#exampleModal').modal('hide');
                }
            });
            return false;
        });
</script>
<div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
