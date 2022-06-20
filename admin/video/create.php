<?php  require 'class/Video.php'; ?>
<div class="modal fade" id="modal-default" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-film"></i> Nouvelle video</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de la video</label>
              <input type="text" class="form-control" name="nom" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="Le titre ici..." required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Le lien d'integration youtube</label>
              <textarea class="form-control" name="lien"  placeholder="<iframe width='1173' height='660' src='https://www.youtube.com/embed/R3fXaeBMgiA' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>" rows='6' required=""></textarea> 
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
      $video = new Video($nom,$_GET['module'],$_SESSION['id'],$lien);
      $video->ajouter();
      Fonctions::set_flash('Video enregistrée avec succès','success');
  }

?>