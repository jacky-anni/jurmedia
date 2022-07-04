<?php include('font-end/layout/head.php'); ?>
 <?php head("Validez compte", "Observatoire Citoyen pour l’Institutionnalisation de la Démocratie", ""); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Application android</title>
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
<?php banner(''); ?>

<div id="feature-16-1" class="c-content-feature-16 c-bg-img-center" style="background-image: url(<?= $link ?>/assets/base/img/layout/Actions-de-formation.jpeg)">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-5 col-xs-12">
				<div class="c-feature-16-container c-bg-white c-bg-opacity-6">
					<div class="c-feature-16-line c-theme-bg"></div>
					<h6 id="success1" style="font-size: 14px;"></h5>
					<p>
						Vous voulez avoir notre application android ? 
					</p>
					<a href="<?= $link ?>/app/JURIMEDIA.apk">
						<button class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square btn-block c-btn-login"> <i class="fa fa-download"></i> Télécharger  </button>
					</a>
					
				</div>
			</div>
		</div>
	</div>
</div><!-- END: CONTENT/FEATURES/FEATURES-16-1 -->
 </div>
</div><!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->

	<?php 
if (isset($_POST['valider'])) {
	extract($_POST);
	Participant::valider_or_no($email);
}

?>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
    </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>