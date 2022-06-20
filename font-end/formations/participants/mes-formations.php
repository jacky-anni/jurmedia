<?php include('font-end/layout/head.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<?php Fonctions::redirect();?>
<title>Mes formations | <?= $org->sigle ?></title>

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
	<?php banner('Mes formations'); ?>

<div class="container">
	<div class="c-layout-sidebar-menu c-theme ">
	<!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
		<?php include('font-end/layout/menu_user.php'); ?>
	</div>
	<div class="c-layout-sidebar-content ">
		<h3>Liste de mes formations</h3>
		<div class="c-content-title-1">
			<div class="c-line-left"></div>
		</div>
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="c-content-product-2 c-bg-white">
						<div class="col-md-8">
							<?php include('font-end/participants/formations_suivies.php') ?>
						</div>
					</div>
				</div>
			</div> 

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
