  
<div class="modal fade" id="modal-default" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-plus"></i> Créer un(e) abonné(e)</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nom</label>
              <input type="text" class="form-control" name="nom" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="Anizaire">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Prénom</label>
              <input type="text" class="form-control" name="prenom" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="Jacky">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="anizairejacky@gmail.com" required="">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> <b>Enregistrer</b></button>

          <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> <i class="fa fa-close"></i> Fermer</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
  if (isset($_POST['submit'])) {
      extract($_POST);
      Fonctions::abonnee($nom,$prenom,$email);
  }

?>