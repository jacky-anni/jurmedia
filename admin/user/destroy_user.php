
<div id="<?= $utilisateur->id_user ?>" class="modal fade" tabindex="-1" >
  <center>
  <div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
    <div class="modal-content">
      <form method="POST" action="">
      <div class="modal-body">
        <center>
          <p><img src="dist/img/icon/icons8_Minus_48px_1.png"></p>
          <h5 class="smaller lighter blue no-margin" style="color: #f03a00;"> <i class="glyphicon glyphicon-trash"></i> <b>Supprimer cet utilisateur ?</b></h5>

        <input type="hidden" name="id" value="<?= $utilisateur->id_user ?>">
        </center>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
           Annuler
        </button>

          <button type="submit" name="supprimer" class="btn btn-sm btn-success btn-round pull-left">
         <i class="glyphicon glyphicon-trash"></i>  Supprimer
        </button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </center>
</div>

  <?php
    //pour supprimer une photo
    if (isset($_POST['supprimer'])) {
      Query::supprimer('utilisateur',$_POST['id']);

      Query::supprimer('cv',$_POST['id'],'id_user');

      Fonctions::set_flash("Suppression éffectuée avec succès!","success");
        header("Location:?page=utilisateurs");
    }
    
  ?>