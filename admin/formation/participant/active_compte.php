<div id="<?= $participant->id;?>" class="modal fade" tabindex="-1" >
	<center>
	<div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
		<div class="modal-content">
			<form method="POST" action="">
			<div class="modal-body">
				<center>
					<h5 class="smaller lighter blue no-margin" style="text-align:center; line-height:20px;"> Voulez vous vraiment valider le compte de <b><?= $participant->prenom ?>  <?= $participant->nom ?></b> ?</h5>
					<input type="hidden" name="id_" value="<?= $participant->id ?>">
				</center>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Annuler
				</button>

				<button type="submit" name="valider_" class="btn btn-sm btn-success btn-round pull-left">
					<i class="ace-icon fa fa fa-check-circle-o"></i>
				  Valider
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</center>
</div>

	<?php
		//pour supprimer une photo
		if (isset($_POST['valider_'])) {
			// valider ce prticipant
			Participant::valider_or_no($_POST['id_'],$formations->id,1);
		}
	?>