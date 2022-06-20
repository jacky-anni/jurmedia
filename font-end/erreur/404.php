<?php include('font-end/layout/head.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Formations | <?= $org->sigle ?></title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

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
	<?php banner(''); ?>

	<div class="container">
		<div class="c-layout-sidebar-content ">

			<div class="col-md-12">
					<div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="padding: 15px;">
						<div class="c-content-title-1">
							<h3 class="c-font-uppercase c-font-bold">Page Introuvable</h3>
							<div class="c-line-left"></div>
							<p>Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!</p>
							<form action="#">
								<div class="input-group input-group-lg c-square">
							      	<span class="input-group-btn">
							        	<button class="btn c-theme-btn c-btn-square c-font-bold" type="button">Aller à la page d'accueil</button>
							      	</span>
							    </div>
							</form>
							
						</div>
					</div>
				</div>
		
		
		</div>
	</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
