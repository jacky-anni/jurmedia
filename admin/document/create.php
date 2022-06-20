<?php  require 'class/Document.php'; ?>
<div class="modal fade" id="document" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-file"></i> Nouveau document</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Titre du document</label>
                  <input type="text" class="form-control" name="nom" id="exampleInputEmail1" accept="application/pdf" data-parsley-maxlength="254" placeholder="Le titre ici..." required="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label for="exampleInputEmail1">Choix du document</label>
                  <input type="file" name="document" class="form-control" required="">
                  </div>
              </div>
          </div>
        </div>

            <div class="modal-footer">
              <button type="submit" name="submit1" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Ajouter</button>

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
    if (isset($_FILES['document']['name'])) {

      if(isset($_GET['module']) AND !empty($_GET['module'])){
        $id = $_GET['module'];
      }elseif(isset($_GET['publication']) AND !empty($_GET['publication'])){
        $pub = Query::affiche('publication', $_GET['publication'] , 'slug');
        if(!empty($pub)){
          $id = $pub->id;
        }else{
          $url =$_SERVER['REQUEST_URI'];
						Fonctions::set_flash("Cette publication n'existe pas",'danger');
						echo "<script>window.location ='$url '</script>";
        }
        
      }

      if (strtolower($_FILES['document']['type']=='application/pdf')) {
        extract($_POST);
        $document =new Document($nom,$id,$_FILES['document']['name']);
        $document->ajouter();
      }
      else
      {
        Fonctions::set_flash('Le document doit etre au format PDF','danger');
        $redirect=$_SERVER['REQUEST_URI'];
        echo "<script>window.location ='$redirect';</script>";
      }
    }
  }

?>