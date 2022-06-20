<?php include('font-end/layout/head.php'); ?>
 <?php head("A propos ","Observatoire Citoyen pour l’Institutionnalisation de la Démocratie",""); ?>
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
<?php banner("A propos de l'OCID"); ?>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-8 wow animate fadeInLeft">						
					<!-- Begin: Title 1 component -->
					<div class="c-content-title-1">
						<h3 class="c-font-uppercase c-font-bold">A Propos</h3>
						<div class="c-line-left c-theme-bg"></div>
					</div>
					<!-- End-->
					<p>L’Observatoire Citoyen pour l’Institutionnalisation de la Démocratie (OCID) est un consortium d’organisations de la société civile formé de l’Initiative de la Société Civile (ISC), du Centre Œcuménique de Droits Humains (CEDH) et de JURIMEDIA. </p>

					<p>Il œuvre depuis sa création en janvier 2015 pour la consolidation de la démocratie en Haïti et, en particulier, pour l’instauration d’un système électoral garantissant aux citoyens et citoyennes haïtiens la possibilité de pouvoir choisir librement et démocratiquement leurs dirigeants. </p></br>

					<div>
						<h2>Mission</h2>
						<p>Promouvoir la participation de la société civile haïtienne au renforcement de la gouvernance démocratique. </p>
					</div></br>

					<div>
						<h2>Domaines d’intervention : </h2>
					</div>

					<ul class="c-content-list-1 c-theme">
					 	<li>Le monitoring de la participation citoyenne ; </li>
					 	<li>Le suivi des institutions et des processus politiques ; </li>
					 	<li>L’observation de  la compétition politique (élections); </li>
					 	<li>Le plaidoyer en faveur de politiques publiques cohérentes, justes et efficaces.</li>
					</ul></br>


					<div>
						<h2>Valeurs : </h2>
					</div>

					<ul class="c-content-list-1 c-theme">
					 	<li>Responsabilité et vigilance citoyenne ; </li>
					 	<li> 	Exercice des libertés démocratiques et défense des droits de la personne ;  </li>
					 	<li>Indépendance et esprit critique ;  </li>
					 	<li>Recherche du bien commun, engagement civique. </li>
					</ul>
				</div>
				<div class="col-md-4">
				<div class="c-body col-md-12">
					<div class="c-section">
						<h3>Contacts</h3>
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
