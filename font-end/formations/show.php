<?php include('font-end/layout/head.php'); ?>
<?php 
	$formation= Query::affiche('formation',$url[1],'id');
	if (!$formation) {
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}
?>
<?php head($formation->titre,"Formation gratuite en ligne","$link/assets/base/img/layout/formation-template.jpg"); ?>

<!DOCTYPE html>
<html lang="en"  >
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ec2fd1d2d5f810012b13181&product=inline-share-buttons' async='async'></script>
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
	<?php banner("Formation"); ?>
	<?php include('admin/includes/flash.php'); ?>
	<div class="container">
		<div class="c-layout-sidebar-content " style="background-color: white;">
			<div class="row">
				<div class="col-md-8">
					<h1 class="alert alert-info c-font-uppercase" style="margin-top: -5px; background-color: #181870; color: white; font-weight: bold; text-align: center;"><?= $formation->titre ?></h1>
					<div class="c-content-blog-post-1-view">
						<div class="c-content-blog-post-1">
							<div class="c-desc" style="line-height: 25px; font-size: 15px;">
								<?= $formation->presentation ?>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-4">
					<div>
						<div class="row c-margin-b-40 c-content-blog-post-card-1 c-option-2 c-bordered">
							<div class="c-content-product-2">
								<div class="col-md-12">
									<?php include('font-end/formations/bar_droit.php'); ?>
								</div>
							</div>
						</div>
					</div>


					<center>
						<h6>Partagez avec vos amis</h6>
							<div class="sharethis-inline-share-buttons" data-url="https://www.ocidhaiti.org/formation/<?= $formation->id  ?>" data-title="<?= $formation->titre ?>"></div></br>
					</center>

				</div>
			</div>
		</div>
	</div>

</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>

<style type="text/css">
	body {
		background-color: white;
	}
</style>
