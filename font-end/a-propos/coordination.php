<?php include('font-end/layout/head.php'); ?>
 <?php head("Coordination","Observatoire Citoyen pour l’Institutionnalisation de la Démocratie",""); ?>
<!DOCTYPE html>
<html lang="en"  >
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
<?php banner("Coordination"); ?>

<!-- BEGIN: CONTENT/MISC/TEAM-3 -->
<div class="c-content-box c-size-md c-bg-grey-1">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-team-1-slider" data-slider="owl" data-items="3">
			<!-- End-->
			<div class="row">
            <?php foreach (Query::liste_not_egale () as $utilisateur): ?>
				<div class="col-md-4 col-sm-6 c-margin-b-30">
					<div class="c-content-person-1 c-option-2">
			  			<div class="c-caption c-content-overlay">
			  				<div class="c-overlay-wrapper">
				  				<div class="c-overlay-content">
					  				<a href="<?= $link_menu ?>/profile-comite/<?= $utilisateur->id_user ?>"><i class="icon-link"></i></a>
					  				<a href="<?= $link_admin ?>/dist/img/user/<?= $utilisateur->photo ?>" data-lightbox="fancybox" data-fancybox-group="gallery-4">
					  					<i class="icon-magnifier"></i>
					  				</a>
					  			</div>
			  				</div>
			  				<img class="c-overlay-object img-responsive" width='100%' src="<?= $link_admin ?>/dist/img/user/<?= $utilisateur->photo ?>" alt="">
			  			</div>
			  			<div class="c-body">
				  			<div class="c-head">
				  				<div class="c-name c-font-uppercase c-font-bold"><a href="<?= $link_menu ?>/profile-comite/<?= $utilisateur->id_user ?>"><?= $utilisateur->prenom ?> <?= $utilisateur->nom ?></a></div>
				  			</div>
				  			<div class="c-position">
                              <?= $utilisateur->fonction ?>
				  			</div>
					  		<p>
					  			
			                </p>
		                </div>
	                </div>
				</div>
                <?php endforeach ?>
	
			
	        <!-- End-->
	    </div>
	    <!-- End-->
	</div>
</div><!-- END: CONTENT/MISC/TEAM-3 -->







<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
