<div id="<?= $abonne->id?>" class="modal fade" tabindex="-1" >
  <center>
  <div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
    <div class="modal-content">
      <form method="POST" action="">
      <div class="modal-body">
        <center>
          <p><img src="dist/img/icon/icons8_Minus_48px_1.png"></p>
          <h5 class="smaller lighter blue no-margin"><b> 1 abonné (e) sera supprimé (e) ?</b></h5>
        <input type="hidden" name="id" value="<?= $abonne->id ?>">
        </center>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
          <i class="fa fa-close"></i>
          Annuler
        </button>

        <button type="submit" name="supprimer" class="btn btn-sm btn-success btn-round pull-left">
          <i class="fa fa-trash-o"></i>
          Supprimer
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
      Query::supprimer('abonnee',$_POST['id']);
      Fonctions::set_flash("1 abonné (e) supprimé","success");
      header("Location:?page=liste-des-abonnés");
      
    }
  ?>