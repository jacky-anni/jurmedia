<div id="<?= $document->id;?>12" class="modal fade" tabindex="-1" >
	<center>
	<div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
		<div class="modal-content">
			<form method="POST" action="">
			<div class="modal-body">
				<center>
					<p><img src="dist/img/icon/icons8_Minus_48px_1.png"></p>
					<h5 class="smaller lighter blue no-margin"><b> Supprimer ce document ?</b></h5>
					<input type="hidden" name="id" value="<?= $document->id ?>">
				</center>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Annuler
				</button>

				<button type="submit" name="supprimer11" class="btn btn-sm btn-success btn-round pull-left">
					<i class="ace-icon fa fa fa-trash-o"></i>
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
		if (isset($_POST['supprimer11'])) {

			//delete artile
			Query::supprimer('document',$_POST['id']);

			// supprimer le document dans le folder
			Query::supprimer_fichier_one('dist/document/'.$document->document);
			Fonctions::set_flash('Document supprimé','success');
			$redirect=$_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";

		}
	?>