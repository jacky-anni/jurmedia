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

if (!$module) {
		// Fonctions::set_flash("Cette formation n'existe pas",'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
if (isset($url[3])) {
	$video = Query::affiche('video', $url[3], 'id');
} else {
	$video = null;
}

?>
<title><?= $module->titre ?> - <?= $formation->titre ?></title>

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
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #181870; ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?> </h3>
			<h3 class=" c-font-tlhin" style="color: yellow;"><?= $module->titre ?></h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>



<div class="c-content-box c-size-md">
	<div class="container">
			<div class="col-sm-9">
		    	<div class="c-content-panel">
					<div class="c-bokdy">
						<div>
							<?php if ($video) : ?>
								<div class="embed-responsive embed-responsive-16by9" style="width: 100%;">
									<?= $video->lien ?>
									<?php Fonctions::vue_element($_SESSION['id_user'], $url[3], 'video'); ?>
							  	</div>
							  	<div class="c-lanbel" style="background-color: #181870; color: white; padding: 5px; font-size: 15px;"><b><?= $video->nom ?></b></div>
						  	<?php endif; ?>
						</div>

					  </br>

					  	<div class="c-content-tab-1 c-theme c-margin-t-30">
						<div class="clearfix">
							<ul class="nav nav-tabs c-font-uppercase c-font-bold">
								<li class="active"><a href="#tab_1_1_content" data-toggle="tab" style="font-size: 13px;">Contenue du module</a></li>
								<li><a href="#tab_1_2_content"  data-toggle="tab" style="font-size: 13px;">Q&R</a></li>
							</ul>
						</div>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1_1_content">
							<table class="table table-striped">
								<tbody></br>
									<?php $doc = Query::count_prepare('document', $module->id, 'reference'); ?>
									<?php $video_count = Query::count_prepare('video', $module->id, 'reference'); ?>
									<?php $quiz_count = Query::count_prepare('quiz', $module->id, 'id_module'); ?>

									<tr>
										<td style="background-color: #181870; color: white;"><?= $module->description ?></br><small style="color: yellow;"> <i class="fa fa-user"></i> <b><i><?= $module->intervenant ?></i></b> </small></td>
									</tr>


									<?php if ($doc >= 1) : ?>
										<?php foreach (Query::liste_prepare_asc('document', $module->id, 'reference') as $document) : ?>
											<tr>
												<td style="<?php if (Fonctions::count_element($_SESSION['id_user'], $document->id, 'document')) {
												echo "background-color: #e9facb;";
											} ?>"><a href="<?= $link_menu ?>/document/<?= $document->document ?>/<?= $document->id ?>" target="_blank"> <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if (Fonctions::count_element($_SESSION['id_user'], $document->id, 'document')) {
											echo "checked";
										} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_PDF_24px_1.png"></span>  <?= $document->nom ?> <span style="float: right;"></td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>

									<?php if ($video_count >= 1) : ?>
										<?php foreach (Query::liste_prepare_asc('video', $module->id, 'reference') as $video) : ?>
											<tr>
												<td style="<?php if (Fonctions::count_element($_SESSION['id_user'], $video->id, 'video')) {
														echo "background-color: #e9facb;";
													} ?>"><a href="<?= $link_menu ?>/cours-suivi/<?= $url[1] ?>/<?= $module->id ?>/<?= $video->id ?>" > <span style="float: left; margin-right: 7px;">  <input type="checkbox" <?php if (Fonctions::count_element($_SESSION['id_user'], $video->id, 'video')) {
													echo "checked";
												} ?>> <img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Circled_Play_24px_1.png"></span> <?= $video->nom ?></span></td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>

									<?php if ($quiz_count >= 1) : ?>
										<?php foreach (Quiz::select_quiz($module->id) as $quiz) : ?>
											<?php
												// verifier si on passe le test
										$count1 = Quiz::verif_module($module->id, $_SESSION['id_user']);
										if ($count1 == 0) {
											$quiz_link = "$link_menu/quiz/$url[1]/$module->id/$quiz->id";
										} else {
											$quiz_link = "$link_menu/resultat-quiz/$url[1]/$module->id/$quiz->id";
										}
										?>
											<tr>
												<td style="<?php if (Fonctions::count_element($_SESSION['id_user'], $quiz->id, 'quiz')) {
													echo "background-color: #e9facb;";
												} ?>"><a href="<?= $quiz_link ?>" > <span style="float: left; margin-right: 7px;"><input type="checkbox" <?php if (Fonctions::count_element($_SESSION['id_user'], $quiz->id, 'quiz')) {
													echo "checked";
												} ?>><img class="icon" src="<?= $link ?>/assets/base/img/layout/icon/icons8_Query_24px.png"></span>  <?= $quiz->nom ?></span></td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="tab_1_2_content">
							<hr/>
							 <div class="row">
							 	<center>
							 		<div class="col-sm-12">
									  <div id="fb-root"></div>
									   <script>(function(d, s, id) {
									      var js, fjs = d.getElementsByTagName(s)[0];
									      if (d.getElementById(id)) return;
									      js = d.createElement(s); js.id = id;
									      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=1895698754081471";
									      fjs.parentNode.insertBefore(js, fjs);
									    }(document, 'script', 'facebook-jssdk'));</script>						    
									    <div  class="fb-comments" data-href="<?= $link_conf ?><?= $_SERVER['REQUEST_URI']; ?>" data-numposts="10">
									    </div>
									</div>
							 	</center>
							 </div>
							
						</div>
					</div>
				</div>
					</div>
				</div>
			  
			</div>

			<div class="col-sm-3">
				<h4 style="background-color:#181870; padding: 10px; color: white; "><b> <i class="fa fa-file-o"></i> Modules</b></h4>
				 <?php include('partials/modules.php'); ?>
		    </div>
	</div>
</div>

<script>
	function myFunction() {
	  alert("Terminer le module précédent pour avoir accès a ce fichier");
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
