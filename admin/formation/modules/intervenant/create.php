<!--  -->
<div class="modal fade" id="intervenant" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-user"></i> Ajouter un (e) intervenant (e)</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">

              <select class="form-control" name="intervenant" required="">
                <label for="exampleInputEmail1">Choisir l'intervant (e)</label>
                <option value="">choisir un (e) intervenant (e) </option>
                <?php foreach(Query::liste('utilisateur') as $intervenant): ?>
                 
                  <option value="<?= $intervenant->id ?>"><?= $intervenant->prenom ?> <?= $intervenant->nom ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="interv" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Ajouter</button>

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
  if (isset($_POST['interv'])) {
      extract($_POST);
      Module::add_intervenant($intervenant,$module->id,$formation->id);
  }

?>