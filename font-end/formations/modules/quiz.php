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
$quiz1 = Query::affiche('quiz', $module->id, 'id_module');

if (!$module) {
		// Fonctions::set_flash("Cette formation n'existe pas",'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}

if ($note >= 60) {
			// Fonctions::set_flash("Cette formation n'existe pas",'warning');
	echo "<script>window.location ='$link_menu/resultat-quiz/$url[1]/$module->id/$quiz1->id';</script>";
}



?>
<title>Quiz - <?= $module->titre ?></title>

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
			<h3 class=" c-font-tlhin" style="color: yellow;">Quiz - <?= $module->titre ?></h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<?php 
if ($formation->fermeture == 0) { ?>
<p class='alert alert-warning' ><b>Ce quiz n'est pas disponible</b></p>
<?php 
} else { ?>
<div class="c-content-box c-size-md">
	<div class="container">
			<div class="col-sm-9">
		    	<div class="c-content-panel" style="padding: 10px;">
					<div class="row c-boxrder-top container">
						<form action="" method="POST" role="form">
							<?php foreach (Query::liste_prepare_asc('questions_quiz', $url[3], 'id_quiz') as $key => $question) : ?>
							<div class="form-group">
							   	<label  class="col-md-12 control-label" style="font-size: 16px;"><b><?= $question->titre ?></b></label>
							   	<div class="col-md-12">
							   		<div class="form-group" style="font-size: 16px;">

							   			<?php if (!empty($question->rep1)) : ?>
							   			<input type="radio" value="<?= $question->rep1 ?>" name="rep<?= $key ?>"required=""> <?= $question->rep1 ?></br>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>

							   			<?php if (empty($question->rep1)) : ?>
							   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
							   			<?php endif; ?>

							   			<?php if (!empty($question->rep2)) : ?>
								   		<input type="radio" value="<?= $question->rep2 ?>" name="rep<?= $key ?>"  required=""> <?= $question->rep2 ?></br>
								   		<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>

								   		<?php if (empty($question->rep2)) : ?>
								   		<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>

								   		<?php if (!empty($question->rep3)) : ?>
								   			<input type="radio" value="<?= $question->rep3 ?>" name="rep<?= $key ?>"  required=""> <?= $question->rep3 ?></br>
								   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>

								   		<?php if (empty($question->rep3)) : ?>
								   			<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>

								   		<?php if (!empty($question->rep4)) : ?>
								   		<input type="radio" value="<?= $question->rep4 ?>" name="rep<?= $key ?>"  required=""> <?= $question->rep4 ?>
								   		<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>

								   		<?php if (empty($question->rep4)) : ?>
								   		<input type="hidden" value="<?= $question->id ?>" name="id<?= $key ?>">
								   		<?php endif; ?>
							   		</div>
							  	</div>
							</div>
						
						<?php endforeach ?>
						<?php $count = Query::count_prepare('questions_quiz', $url[3], 'id_quiz'); ?>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
						</div>
						</form>

						 <?php
						if (isset($_POST['submit'])) {
							$i = 0;
							    // selectionner la question en cours
							$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM questions_quiz WHERE id_module=? ORDER BY date_post ASC");
							$req->execute(array($module->id));

							$count1 = Quiz::verif_module($module->id, $_SESSION['id_user']);

							    // verifier si n passe deja ce module
							 //    $requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM reponse_quiz WHERE id_module=? AND id_participant=?");
								// $requette->execute(array($module->id,$_SESSION['id_user']));
								// // si il nya pas de question repond
								// $count1=$requette->rowCount();

							if ($count1 == 0) {
									 //parcoirir le nobre de question
								while ($i < $count and $donne = $req->fetch()) {
								    	// verifie la bonne reponse
									if ($_POST['rep' . $i] == $donne['bonne_reponse']) {
										$response = 1;
									} else {
										$response = 0;
									}
								    	
								    	//ajouter la reponse
									Quiz::reponse_quiz($_SESSION['id_user'], $module->id, $_POST['id' . $i], $_POST['rep' . $i], $response);
									$i++;
								}
							} else {
									 
									 // supprimer les ancienne donnes
								$requette = class_bdd::connexion_bdd()->prepare("DELETE FROM reponse_quiz WHERE id_participant=? AND id_module=?");
								$requette->execute(array($_SESSION['id_user'], $module->id));

										//parcoirir le nobre de question
								while ($i < $count and $donne = $req->fetch()) {
								    	// verifie la bonne reponse
									if ($_POST['rep' . $i] == $donne['bonne_reponse']) {
										$response = 1;
									} else {
										$response = 0;
									}
								    	// modifier les reponses
									Quiz::reponse_quiz($_SESSION['id_user'], $module->id, $_POST['id' . $i], $_POST['rep' . $i], $response);
									$i++;
								}
							}

							$redirect = "$link_menu/resultat-quiz/$url[1]/$module->id/$quiz1->id";
							echo "<script>window.location ='$redirect';</script>";

						}
						?>
					</div>
				</div>
			  
			</div>
			<div class="col-sm-3">
				<h4 style="background-color:#25a8b4; padding: 10px; color: white; "><b> <i class="fa fa-file-o"></i> Modules</b></h4>
				 <?php include('partials/modules.php'); ?>
		    </div>

	</div>
</div>
<?php 
} ?>

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
