<?php  require 'class/Categorie.php'; ?>
<div class="modal fade" id="modal-default" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-film"></i> Nouvelle categorie</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de la categorie</label>
              <input type="text" class="form-control" name="nom" id="exampleInputEmail1" maxlength="240"  placeholder="Le titre ici..." required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control" name="description"  maxlength="240"   placeholder="" rows='6' required=""></textarea> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Enregistrer</button>

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
      $categorie = new categorie($nom,$description);
      $categorie->ajouter();
  }

?>