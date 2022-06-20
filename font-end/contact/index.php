<?php include('font-end/layout/head.php'); ?>
 <?php head("Contact","Observatoire Citoyen pour l’Institutionnalisation de la Démocratie",""); ?>
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
<?php banner("Contact"); ?>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<div class="c-content-feedback-1 c-option-1">
			<div class="row">
				<div class="col-md-4">
						<div class="c-body col-md-12">
							<div class="c-section">
								<h1></h1>
							</div>
							<div class="c-section">
								<div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">Adresse</div>
								<p><?= $org->adresse ?></p>
							</div>
							<div class="c-section">
								<div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">Téléphones</div>
								<p><?= $org->telephone ?></p>
							</div>

							<div class="c-section">
								<div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">Email</div>
								<p><?= $org->email ?></p>
							</div>

							<div class="c-section">
								<div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">Site Web</div>
								<p><a href="<?= $org->site_web ?>" target="_blank"><?= $org->site_web ?></a></p>
							</div><hr>
						</div>
					<div class="c-container c-bg-grey-1 c-bg-img-bottom-right">
						<div class="c-content-title-1">
							<div class="c-section">
							<ul class="c-content-iconlist-1 c-theme">
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="c-contact">
						<div class="c-content-title-1">
							<h3  class="c-font-uppercase c-font-bold">Contactez-nous</h3>
							<div class="c-line-left"></div>
							<p class="c-font-lowercase">Si vous avez des questions n'hesitez pas à nous contactez..</p>
						</div>
						<form action="#">
							<div class="form-group">
                        		<input type="text" placeholder="Votre nom" class="form-control c-square c-theme input-lg">
                        	</div>
                        	<div class="form-group">
                        		<input type="text" placeholder="Votre email" class="form-control c-square c-theme input-lg">
                        	</div>
                        	<div class="form-group">
                        		<input type="text" placeholder="Sujet" class="form-control c-square c-theme input-lg">
                        	</div>
		                   	<div class="form-group">
                        	   	<textarea rows="8" name="message" placeholder="Ecrivez votre mesaage ici ...." class="form-control c-theme c-square input-lg"></textarea>
		                    </div>
		                    <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Envoyez</button> 
	                   	</form>
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
