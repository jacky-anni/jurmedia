<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php Fonctions::redirect(); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Formations | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php'); ?>
    <?php include('font-end/layout/logo_and_search.php'); ?>
    <?php include('font-end/layout/menu.php'); ?>
    <?php include('font-end/layout/user_bar.php'); ?>
</header>
<div class="c-layout-page">
	<?php include('font-end/layout/banner.php'); ?>
	<?php banner('Mes dossiers'); ?>

	<div class="container">
	<div class="row">
		<?php foreach (Query::liste_prepare_asc('formation_suivie', $_SESSION['id_user'], 'id_participant') as $dossier) : ?>
			<?php 
		$formation = Query::affiche('formation', $dossier->id_formation, 'id');
		$module_total = Query::count_prepare('module_formation', $formation->id, 'id_formation');

			    // verifier la quantite de quiz passe
		$module_total = Module::count($formation->id);
		$module_passe = Quiz::pass_module($_SESSION['id_user'], $formation->id);

		if ($module_passe > $module_total) {
			$module_passe = $module_total;
		}

				// verifi si le modue passe est egal a 0
		if ($module_passe > 0) {
					// pourcentage de module passe;
			$note = number_format($module_passe / $module_total * 100);
		}else{
			$note = 0;
		}
		?>

			<div class="col-md-6">
				<div class="c-layout-sidebar-content ">
					<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
						<h3 class="c-font-bold "><?= $formation->titre ?></h3>
						<div class="c-line-left c-theme-bg"></div>
					</div>

					<?php if($formation->fermeture ==0){  ?>
					
					<div class="tab-pane" id="blog_popular_posts">
			    		<ul class="c-content-recent-posts-1">
			    		 <?php if ($module_passe == $module_total && $module_total >1) : ?>
			    			<li>
			    				<div class="c-post">
			    					<b> <i class="fa fa-certificate"></i> Certificat de réussite </b>
			    					<div class="c-date">
			    						<a href="<?= $link_menu ?>/certificat/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?>" target="_blank"><span style="margin-right: 7px;" target="_blank"><b><i class="fa fa-download"></i> Télécharger</b></span></a> 
			    					</div>
			    				</div>
			    			</li>
			    		<?php endif ?> 

			    			<li>
			    				<h4 style="color: red; font-weight: bold; margin-top: -2px;"><?= $note; ?>% de réussite</h4>
			    			</li>

			    			<div >
			    				<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $note ?>%; background-color: #00a65a;">
								    	<?= $note ?>%
								  	</div>
								</div> 
			    			</div>

			    			 <small>
								<?php if ($module_passe != $module_total) : ?>
									<p class="alert alert-info" style=" padding: 3px; color: black; text-align: center;"><b> <i class="fa fa-close"></i> Terminer le cours pour obtenir votre certificat</b></p>
								<?php endif ?>

								<?php if ($module_passe == $module_total) : ?>
									<p class="alert alert-success" style=" padding: 3px; color: red; text-align: center;"><b> <i class="fa fa-check"></i> Cours terminé</b></p>
								<?php endif ?>
							</small>
			    		</ul>
			    	</div>
					<?php }else{ ?>
						<p class="alert alert-danger">Ce cours n'est pas encore terminé</p>
					<?php } ?>
				
				</div>
		</div>

			<div id="certificat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content c-square">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel" class="c-btn-uppercase"><b><?= $formation->titre ?></b></h4>
						</div>
						<div class="modal-body">
							<center>
							<h2> <i class="fa fa-certificate"></i> Certificat de réussite </h2>
						</div>
						</center>
						<div class="modal-footer">								
							<button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal"> <i class="fa fa-check"></i> Ok</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			<div id="attestation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content c-square">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel" class="c-btn-uppercase"><b><?= $formation->titre ?></b></h4>
						</div>
						<div class="modal-body">
							<center>
							<h2> <i class="fa fa-file"></i> Attestation de participation </h2>
							<p>
									<p>Copier le lien</p>
									<span style="background-color: gray; color: white; font-family: initial; padding: 5px;"><?= $link_menu ?>/attestation/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?></span>
							</p>
						</div>
						</center>
						<div class="modal-footer">								
							<button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal"> <i class="fa fa-check"></i> Ok</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			<div id="releve" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content c-square">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel" class="c-btn-uppercase"><b><?= $formation->titre ?></b></h4>
						</div>
						<div class="modal-body">
							<center>
							<h2> <i class="fa fa-file"></i> Rélevé de notes </h2>
							<p>
								
									<p>Copier le lien</p>
									<span style="background-color: gray; color: white; font-family: initial; padding: 5px;">/<?= $link_menu ?>/releve-de-note/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?></span>
							</p>
						</div>
						</center>
						<div class="modal-footer">								
							<button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal"> <i class="fa fa-check"></i> Ok</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
		<?php endforeach ?>
		
	</div>	
	</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
