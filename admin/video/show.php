
<div class="modal fade" id="<?= $video->id ?>2538" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <?= $video->nom ?></b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
             <?= $video->lien ?>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="modal-footer">
  <!--                 <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Enregistrer</button> -->

                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> <i class="fa fa-close"></i> Fermer</button>
                </div>
              </div>
            </div>
       
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->