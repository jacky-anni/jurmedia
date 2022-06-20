<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Participant_Pol.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Formation | <?= $org->sigle ?></title>

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
	<?php banner("Confirmation d'inscription"); ?>

<div class="container">
	<?php include('admin/includes/flash.php'); ?>
	<div class="c-layout-sidebar-content ">
		 <div class="row c-margin-t-25">
			 <?php if (isset($url[1]) AND !isset($url[2]) AND !isset($url[3])): ?>
				 <div class="col-md-12">
				 	<div class="" data-height="height">
				 		<?php $user=Query::affiche('participant',$url[1],'id'); ?>
				 		<center>
				 			<div class="c-content-line-icon c-theme c-icon-comment" style="width: 40px; margin-bottom: -15px;"><img src="<?= $link ?>/assets/base/img/icon/icons8_Send_Email_50px.png"></div>
				 			<h3 class=" c-font-bold">Inscription réussie</h3>
							<p>Mail d'activation envoyé sur <b><?= $user->email ?></b></p>
				 		</center>
					</div>
					<?php if(!isset($_GET['action'])): ?>
					<center>
					<p><small>
					Une fois que vous aurez fini de valider votre compte, veuillez appuyer sur l'onglet télécharger. Puis,  imprimez le fichier, signez et faites signer par la personne responsable qui vous recommande. Enfin, connectez sur votre compte, numérisez ("scannez") le Formulaire signé et téléversez-le ("upload") sur la plateforme pour valider votre inscription. 
					Sachez que, sans cette validation, vous ne pourrez pas accéder aux cours.
					</small> </p>
					<a href="<?= $link_menu ?>/upload&user=<?= $user->id ?>" target="_blank"><i class="fa fa-download"></i> Télécharger le formulaire</a>
					
					</center>
					<?php endif ?>
					
				 </div>
			<?php endif ?>

			<?php if (isset($url[1]) AND isset($url[2]) AND isset($url[3]) AND isset($url[4])): ?>
				<?php Participant_Pol::activation($url[4],$url[3],$url[1],$url[2]); ?>
			<?php endif; ?>
		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->

	<!-- END: PAGE CONTENT -->
	</div>
</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
