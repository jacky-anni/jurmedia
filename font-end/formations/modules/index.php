<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php Fonctions::redirect(); ?>
<!DOCTYPE html>
<html>
<?php 
$formation = Query::affiche('formation', $url[1], 'id');
if (!$formation) {
	Fonctions::set_flash("Cette formation n'existe pas", 'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
?>
<title>Liste des modules - <?= $formation->titre ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php'); ?>
    <?php include('font-end/layout/logo_and_search.php'); ?>
    <?php include('font-end/layout/menu.php'); ?>
    <?php include('font-end/layout/user_bar.php'); ?>
</header>
<div class="c-layout-page">
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #191970;">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Liste des modules</h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<?php Formation::suivie($formation->id, $_SESSION['id_user']) ?>

<div class="c-content-box c-size-md">
	<div class="container">
		<div class="row c-page-faq-2">

		<?php $module_test = Query::count_prepare('module_formation', $formation->id, 'id_formation'); ?>


		<?php if($module_test >= 1) { ?>
		    <div class="col-sm-12">
			    <?php include('partials/modules.php'); ?>
			    <div class="alert alert-success alert-sm alert-dismissible" role="alert">
					 <a class="c-font-slim" href="<?= $link_menu ?>/releve-note/<?= $formation->id ?>">Voir les résultats ? </a>.
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
				</div>
			</div>
		<?php }else{ ?>
		<p class='alert alert-danger'><b>Cette formation n'est pas encore disponible</b></p>
		Date début : <?= Fonctions::format_date($formation->date_debut); ?>

		<?php } ?>
		</div>
	</div>
</div>

<style type="text/css">
	ul li
	{
		list-style-type: none;
	}
</style>

<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script>
	function myFunction() {
	  alert("Terminer le module précédent pour avoir accès à ce fichier");
	  
	}
</script>


</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
