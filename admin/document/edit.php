<div class="modal fade" id="<?= $document->id ?>11" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-file"></i> Modifier ce document</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Titre du document</label>
                  <input type="text" class="form-control" name="nom" id="exampleInputEmail1" accept="application/pdf" data-parsley-maxlength="254" value="<?= $document->nom ?>" placeholder="Le titre ici..." required="">
                  <input type="hidden" name="id" value="<?= $document->id ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label for="exampleInputEmail1">Remplacer le document</label>
                  <input type="file" name="document" value="<?= $document->document ?>" class="form-control">
                  </div>
              </div>
          </div>
        </div>

            <div class="modal-footer">
              <button type="submit" name="submit2" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Ajouter</button>

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
 if (isset($_POST['submit2'])) {

  if (!empty($_FILES['document']['name'])) {
    if (strtolower($_FILES['document']['type']=='application/pdf')) {
      extract($_POST);
        $document =new Document($nom,$_GET['module'],$_FILES['document']['name']);
        $document->modifier($id);
    }else
      {
        Fonctions::set_flash('Le document doit etre au format PDF','danger');
        $redirect=$_SERVER['REQUEST_URI'];
        echo "<script>window.location ='$redirect';</script>";
      }
  }else{
    extract($_POST);
    $document =new Document($nom,$_GET['module'],$_FILES['document']['name']);
    $document->modifier($id);
  }

  }

?>