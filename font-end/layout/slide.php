
<div id="feature-16-1" class="c-content-feature-16 c-bg-img-center" style="background-image: url(<?= $link ?>/assets/base/img/layout/Actions-de-formation.jpeg)">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-5 col-xs-12">
				<div class="c-feature-16-container c-bg-white c-bg-opacity-5">
					<div class="c-feature-16-line c-theme-bg"></div>
					<h2 class="c-feature-16-title c-font-bold c-font-uppercase">Formations des OCB</h2>
					<p class="c-feature-16-desc">
					Dans le cadre la célébration de son 21ème anniversaire ce 7 janvier 2022, la JURIMÉDIA, 
					organisme de défense des droits humains et de promotion de la gouvernance démocratique 
					évoluant en Haïti depuis deux décennies, se lance pour défi de partager gratuitement 
					une bonne partie de ses expériences avec une centaine d’associations ou d’organisations 
					communautaires de base (OCB) 
					</p>
					<?php if (!isset($_SESSION['id_user'])) : ?>
					<center>
					<a class=" btn-sm btn btn-success  c-btn-square " href="<?= $link_menu ?>/connexion" style="margin-bottom:10px;"> Connexion</a>
					
					</center>
					<?php endif ?>

					 <?php if (isset($_SESSION['id_user'])) : ?>
						<a class="c-feature-15-btn btn c-btn btn-sm btn btn-success  c-btn-square " href="<?= $link_menu ?>/tableau-de-bord"> <i class="fa fa-user"></i> Mon compte</a>
						<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- END: CONTENT/FEATURES/FEATURES-16-1 -->
