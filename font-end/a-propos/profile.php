<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php 
	$intervant= Query::affiche('cv',$url[1],'id_user');
	$user= Query::affiche('utilisateur',$url[1],'id');
	if (!$intervant) {
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
?>
 <?php head($user->prenom." ".$user->nom ,"Observatoire Citoyen pour l’Institutionnalisation de la Démocratie","$link_admin/dist/img/user/$user->photo"); ?>
<!DOCTYPE html>
<html lang="en">
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
	<?php banner("Profil de <b> $user->prenom  $user->nom </b>" ); ?>
	<?php include('admin/includes/flash.php'); ?>
	<div class="container">
		<div class="c-layout-sidebar-content " style="background-color: white;">
			<div class="row">

				<div class="col-md-4">

					<div class="col-md-12">
			  		<div class="c-content-blog-post-card-1 c-option-2">		
			  			<div class="c-media c-content-overlay">
			  				<img class="c-overlay-object img-responsive img-responsive img-thumbnail col-md-12" src="<?= $link_admin ?>/dist/img/user/<?= $user->photo ?>" alt="">
			  			</div>
			  			<div class="c-body">
				  			<div class="c-title c-font-uppercase c-font-bold" style="margin-top: -20px; font-weight: bold; text-align: center; font-size: 20px; color: red;">
				  				<?= $user->prenom ?>  <?= $user->nom ?>
				  			</div>
				  			<?php $cv=Query::affiche('cv',$user->id,'id_user');?>
				  			<div class="c-author" style="margin-top: -10px; text-align: center;">
				  				<span class="c-font-upperckkase"><?= $cv->titre ?></span>
				  			</div>
		                </div>
	                </div>
			  	</div>

				</div>


				<div class="col-md-8">
				<!-- 	<div class="c-content-overlay">
						<div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?= $link ?>/assets/base/img/layout/formation-template.jpg);"></div>
					</div> -->
					
					<div class="c-content-blog-post-1-view">
						<div class="c-content-blog-post-1">
							<div class="c-desc" style="line-height: 25px; font-size: 15px;">
								<?= $cv->biographie ?>
							</div>
						</div>
					</div>



				</div>

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
