
<div class="modal fade" id="<?= $module->id ?>" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-edti"></i> Modifier ce module <?= $module->id ?> </b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
          <?php  $edit=Query::affiche('module_formation',$module->id,'id'); ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Titre</label>
              <input type="text" class="form-control" name="titre" value="<?= $edit->titre ?>" id="exampleInputEmail1" data-parsley-maxlength="250" placeholder="Le titre ici...">
              <input type="hidden" name="id" value="<?= $edit->id ?>">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Objectif (s) / Description</label>
              <textarea class="form-control" name="description"  placeholder="" rows='3' required=""><?= $edit->description ?></textarea> 
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Intervenant (s)</label>
              <input type="text" class="form-control" name="intervenant" id="exampleInputEmail1" data-parsley-maxlength="250" value="<?= $edit->intervenant ?>" placeholder="Ex: Anizaire Jacky">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit1" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Modifier </button>

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
  if (isset($_POST['submit1'])) {
      extract($_POST);
      $module = new Module($titre,$description,$intervenant);
      $module->modifier($_POST['id']);
  }

?>