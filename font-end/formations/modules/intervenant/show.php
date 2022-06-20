<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php 
	$intervant= Query::affiche('cv',$url[1],'id_user');
	$user= Query::affiche('utilisateur',$url[1],'id');
	if (!$intervant) {
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
?>
<!DOCTYPE html>
<html lang="en"  >

<head>
<title><?= $user->prenom ?>  <?= $user->nom ?></title>
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="http://www.ocidhaiti.org/ocid/profil-intervenant/<?= $user->id  ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?= $user->prenom; ?>" />
<meta property="og:description"   content="<?= $intervant->titre; ?>" />
<meta property="og:image"         content="<?= $link_admin ?>/dist/img/user/<?= $user->photo ?>" />
</head>

<!-- <title><?= $formation->titre ?></title>
<meta property="og:title" content="<?= $formation->titre; ?>">
<meta property="og:description" content="Formation gratuite">
<meta property="og:image" content="<?= $link ?>/assets/base/img/layout/formation-template.jpg">
<meta property="og:url" content="http://www.ocidhaiti.org/ocid/formation/<?= $formation->id  ?>"> -->


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
						</div><hr/>

						<h4 class="c-font-upperjcase c-title" style="text-align: center; font-weight: bold;">Cours ensignés</h4>

						<div class="tab-pane" id="blog_popular_posts">
				    		<ul class="c-content-recent-posts-1">
				    			<?php foreach(Query::liste_prepare('enseignant',$user->id,'id_user') as $enseigner): ?>
				    			<?php
				    				$formation= Query::affiche('formation',$enseigner->id_formation,'id');
				    				$module= Query::affiche('module_formation',$enseigner->id_module,'id');
				    			?>

				    			<li>
				    				<div class="c-image">
				    					<img src="<?= $link ?>/assets/base/img/layout/formation-template.jpg" class="img-responsive" style="height: 50px;" alt=""/>
				    				</div>
				    				<div class="c-post">
				    					<b> <a href="<?= $link_menu ?>/formation/<?= $formation->id ?>"><?= $formation->titre ?></a> </b>
				    					<div class="c-date"><?= $module->titre ?></div>
				    				</div>
				    			</li>
				    		<?php endforeach ?>


				    		</ul>
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
