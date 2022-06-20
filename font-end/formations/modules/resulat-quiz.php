<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php Fonctions::redirect(); ?>
<!DOCTYPE html>
<html lang="en"  >
<?php 
// selectionner la formation
$formation = Query::affiche('formation', $url[1], 'id');
if (!$formation) {
	Fonctions::set_flash("Cette formation n'existe pas", 'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
	// selectionner le module
$module = Query::affiche('module_formation', $url[2], 'id');

	// selectionner le quiz en question
$quiz_test = Query::affiche('quiz', $url[3], 'id');


if (!$module) {
		// Fonctions::set_flash("Cette formation n'existe pas",'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
	// verifier si on passe l'examen
$count1 = Quiz::verif_module($module->id, $_SESSION['id_user']);
if (!$count1) {
	echo "<script>window.location ='$link_menu/cours/$formation->id';</script>";
}
?>
<title>Résultat quiz - <?= $module->titre ?></title>

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
<?php banner('Formation'); ?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Résultat Quiz - <?= $module->titre ?></h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>
<div class="c-content-box c-size-md">
	<div class="container">
			<div class="col-sm-9">
		    	<div class="c-content-panel" style="padding: 10px;">
					<div class="rokw c-boxrder-top ">
						<?php $note = Quiz::resultat_quiz($_SESSION['id_user'], $module->id); ?>
						<?php $question_total = Query::count_prepare('questions_quiz', $module->id, 'id_module'); ?>
						<?php $reponse_v = Quiz::resultat_quiz_vrai($_SESSION['id_user'], $module->id); ?>

						<div class="col-md-12">
							<?php if ($note >= 60) { ?>
						<div style="background-color: #00a65a; padding: 10px; border-radius: 5px;">
							<h2 style="font-weight: bold;text-align: center; color: white;"> <img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Ok_24px_1.png" style="width: 27px;">  Félicitation</h2>

							<p style="text-align: center;color: white;"> Vous avez repondu <?= $reponse_v ?>/<?= $question_total ?> questions <span class=" c-font-tlhin" style="color: yellow;"> (<?= $note ?>%)</span> </p>
							<?= Module::module_passe_user($_SESSION['id_user'], $module->id, $formation->id) ?>
						</div><hr/>
					  <?php 
					} else { ?>
					  	<div style="background-color: #dd4b39; padding: 10px; border-radius: 5px;">
							<h2 style="font-weight: bold;text-align: center; color: white;"> <img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Cancel_24px.png" style="width: 27px;">Echec</h2>
							<p style="text-align: center;color: white;"> Vous avez repondu <?= $reponse_v ?>/<?= $question_total ?> questions <span class=" c-font-tlhin" style="color: yellow;"> (<?= $note ?>%)</span> </p>
							</div><hr/>
						<?php 
				} ?>
						</div>
						
						<form>
							<?php foreach (Query::liste_prepare_asc('questions_quiz', $url[3], 'id_quiz') as $key => $question) : ?>
								<?php $reponse_vf = Quiz::reponse($_SESSION['id_user'], $module->id, $question->id); ?>
							   	<label  class="col-md-12 control-label" style="font-size: 16px; margin-left: -5px;">
							   		
							   	<?php if ($reponse_vf->reponse == 1) {
											echo "<img class='icon' src='$link/assets/base/img/layout/icon/icons8_Ok_24px_2.png'/>";
										} else {
											echo "<img class='icon' src='$link/assets/base/img/layout/icon/icons8_Cancel_24px_2.png'/>";
										} ?><b><?= $question->titre ?></b></label >
							   		
							   	<div class="col-md-12">
							   		<div class="form-group" style="font-size: 16px;">
							   			<?php if (!empty($question->rep1)) : ?>
							   			<input type="radio" value="<?= $question->rep1 ?>" name="rep<?= $key ?>" required="" <?php if ($question->rep1 == $reponse_vf->choix) {
																																																																																																		echo "checked";
																																																																																																	} else {
																																																																																																		echo "disabled";
																																																																																																	} ?>> <?= $question->rep1 ?></br>
							   			<?php endif; ?>

							   			<?php if (empty($question->rep1)) : ?>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>

							   			<?php if (!empty($question->rep2)) : ?>
								   		<input type="radio" value="<?= $question->rep2 ?>" name="rep<?= $key ?>"  required="" <?php if ($question->rep2 == $reponse_vf->choix) {
																																																																																																			echo "checked";
																																																																																																		} else {
																																																																																																			echo "disabled";
																																																																																																		} ?>> <?= $question->rep2 ?></br>
								   		<?php endif; ?>

								   		<?php if (empty($question->rep2)) : ?>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>

								   		<?php if (!empty($question->rep3)) : ?>
								   		<input type="radio"  value="<?= $question->rep3 ?>" name="rep<?= $key ?>"  required="" <?php if ($question->rep3 == $reponse_vf->choix) {
																																																																																																				echo "checked";
																																																																																																			} else {
																																																																																																				echo "disabled";
																																																																																																			} ?>> <?= $question->rep3 ?></br>
								   		<?php endif; ?>

								   		<?php if (empty($question->rep3)) : ?>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>

								   		<?php if (!empty($question->rep4)) : ?>
								   		<input type="radio" value="<?= $question->rep4 ?>" name="rep<?= $key ?>"  required="" <?php if ($question->rep4 == $reponse_vf->choix) {
																																																																																																			echo "checked";
																																																																																																		} else {
																																																																																																			echo "disabled";
																																																																																																		} ?>> <?= $question->rep4 ?>
								   		<?php endif; ?>

								   		<?php if (empty($question->rep4)) : ?>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>
							   		</div>
							  	</div>
							<?php endforeach ?>
							<?php $count = Query::count_prepare('questions_quiz', $url[3], 'id_quiz'); ?>
						</form>


						<?php if($note <60) :  ?>
							<a href="<?= $link_menu ?>/quiz/<?= $formation->id ?>/<?= $module->id ?>/<?= $quiz_test->id ?>"  class="btn btn-primary">
							Reprendre le quiz
							</a>
						<?php endif ?>


						<?php if ($note >= 60) : ?>
							<a href="<?= $link_menu ?>/cours/<?= $url[1] ?>">
								<div class="form-group">
									<button class="btn btn-primary"> Continuer la formation <i class="fa fa-long-arrow-right"></i> </button>
								</div>
							</a>
						<?php endif ?>



																																																																																																		

					</div>
				</div>
		</div>
		<div class="col-sm-3">
			<h4 style="background-color:#25a8b4; padding: 10px; color: white; "><b> <i class="fa fa-file-o"></i> Modules</b></h4>
			 <?php include('partials/modules.php'); ?>
	    </div>
	</div>
</div>


<script type="text/javascript">
	function formSubmit(){
		$.ajax({
			type: 'POST',
			url: '<?= $link ?>/formations/modules/comment.php',
			data: $('#frmbox').serialize(),
			success: function(response){
				$('#success').html(response);
			}
		});
		var form= document.getElementById('frmbox').reset();
		return false;
	}
</script>



<style type="text/css">
	ul li
	{
		list-style-type: none;
	}

	.icon
	{
		width: 22px;
	}
</style>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>

<script type="text/javascript">
	
</script>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
