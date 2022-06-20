<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php Fonctions::redirect();?>
<!DOCTYPE html>
<html lang="en"  >
<?php 
// selectionner la formation
	$formation=Query::affiche('formation',$url[1],'id');
	if (!$formation) {
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}

?>
<title>Résultat - <?= $formation->titre ?></title>
<meta property="og:url"           content="http://www.ocidhaiti.org/ocid/releve-note/<?= $formation->id  ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?= $formation->titre; ?>" />
<meta property="og:description"   content="Résultat Quiz" />
<meta property="og:image"         content="<?= $link ?>/assets/base/img/layout/formation-template.jpg" />
</head>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>
<div class="c-layout-page">
<?php include('font-end/layout/banner.php');?>
<?php banner('Formation'); ?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #181870;">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Résultat Quiz</h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<div class="c-content-panel container">
	<div class="c-label"></div>
		<div class="c-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><b> <i class="fa fa-file"></i> Résultats</b></div>
						<!-- Table -->
						<table  class="table table-bordered responsive">
							<tbody>
							<?php foreach (Module::liste($url[1]) as $module ): ?>
								<?php 
								// recher les quiz
									$quiz_test= Query::affiche('quiz',$module->id,'id_module');
									// calcu;e des notes
									$note= Quiz::resultat_quiz($_SESSION['id_user'],$module->id);
								 ?>
								<tr>
									<td style="max-width: 200px;">
									<?php if($note>=60){echo "<img class='icon' src='$link/assets/base/img/layout/icon/icons8_Ok_24px_2.png'/>";}else{
										echo "<img class='icon' src='$link/assets/base/img/layout/icon/icons8_Cancel_24px_2.png'/>";
									}
									?>
									 <?= $module->titre ?>
									 </td>
									 <?php if (isset($quiz_test->nom)): ?>
									<td style="background-color: #181870; color: <?php if($note>=60){echo "white";}else{echo "red";} ?>; font-weight: bold;">
										<?= $note ?>
									</td>
								<?php endif ?>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>

						<div style="padding: 10px;"></br>
							N.B: Pour valider cette formation, on doit obtenir 60/100 pour chaque module . 
						</div>
						
					</div>
					<div class="col-md-6">
						<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>">
							<button class="btn btn-primary"  style="margin-bottom: 10px;"> <i class="fa fa-long-arrow-left"></i> Voir les modules</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

		// echo ;
	// Quiz::pass_module($_SESSION['id_user'],$formation->id)."/".Module::count($formation->id);

	// Quiz::pass_module($_SESSION['id_user'],$formation->id);

	// $module_total = Module::count($formation->id);


	// foreach (Module::user_module_pass($formation->id) as $key => $form) {

	// 	echo $form->prenom." - ";
	// 	echo $count_user= Quiz::pass_module($form->id_participant,$formation->id)." - ";

	// 	if($module_total==$count_user){
	// 		echo $key."Li ok bay setifika li"."</br>";
	// 	}else{
	// 		echo $key."ou poko bon non"."</br>";
	// 	}

	// }

	// $totalFinal = 0;
	// foreach (Query::liste('participant') as $participant){

	// 	foreach (Module::liste($url[1]) as $module ){
	// 		$quiz_test= Query::affiche('quiz',$module->id,'id_module');
	// 		$note= Quiz::resultat_quiz($participant->id,$module->id);
	// 		$totalFinal += $note;
	// 		// echo $participant->prenom."</br>".$note."</br>";
			

	// 		continue;
	// 	}

	// 	echo $participant->prenom." / " .$totalFinal."</br>";

	// }



	// foreach (Module::liste($url[1]) as $module ){
	// 	// recher les quiz
	// 	$quiz_test= Query::affiche('quiz',$module->id,'id_module');
	// 	// calcu;e des notes


	// 	$note= Quiz::resultat_quiz($_SESSION['id_user'],$module->id);

	// 	echo $note;
	// }
							


	// foreach (Module::user_module_pass($formation->id) as $key => $form) {

		
	// 	echo $form->prenom." - ";
	// 	echo $count_user= Quiz::pass_module($form->id_participant,$formation->id)." - ";

	// 	if($module_total==$count_user){
	// 		echo $key."Li ok bay setifika li"."</br>";
	// 	}else{
	// 		echo $key."ou poko bon non"."</br>";
	// 	}

	// }



	// foreach (Query::liste_prepare('participant_resultat_module',$formation->id,'id_formation') as  $form) {

	// 	$count_user= Quiz::pass_module($form->id_participant,$formation->id)."</br>";

	// 	$participant= Query::affiche('participant',$form->id_participant,'id');

	// 	if ($participant->nom==$participant->nom) {

	// 		echo $participant->prenom."</br>";
	// 		echo $count_user."</br>";
	// 		continue;
	// 	}

	// 	$totalFinal += $note;
	// }


	?>

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
