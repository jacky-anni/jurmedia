<?php include("admin/class/Module.php"); ?>
<div class="col">
	<div class="c-content-title-1 c-theme c-title-md c-margin-t-40" style="margin: 0px;">
		<h5 class="c-font-bold c-font-uppercase alert alert-success" style="background-color: #181870; color: white;">Intervenants</h5>
	</div>
	<div class="c-content-tab-1 c-theme c-margin-t-30">
			<div class="tab-content">
		    	<div class="tab-pane active" id="blog_recent_posts">
		    		<ul class="c-content-recent-posts-1">
		    		<?php foreach (Module::liste_intervenant($formation->id) as $enseignant) : ?>
		    			<li>
		    				<div class="c-image">
		    					<img src="<?= $link_admin ?>/dist/img/user/<?= $enseignant->photo ?>" alt="" class="img-responsive img-thumbnail">
		    				</div>
		    				<div class="c-post">
		    					<a href="<?= $link_menu ?>/profil-intervenant/<?= $enseignant->id ?>" class="c-title" style="font-weight: bold;">
		    					<?= $enseignant->prenom ?>  <?= $enseignant->nom ?> 
		    					</a>
		    					<?php $cv = Query::affiche('cv', $enseignant->id, 'id_user'); ?>
		    					<div class="c-date" style="font-size: 13px;"><?= $cv->titre ?></div>
		    				</div>
		    			</li>
		    		<?php endforeach ?>
		    		</ul>
		    	</div>
		  	</div>
	 </div>
</div>
	<h4 class="c-font-uppercase c-title" style="text-align: center; font-weight: bold;">Informations supplementaires</h4><hr/>

	<div class="col-md-12" style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div ><img src="<?= $link ?>/assets/base/img/icon/icons8_Guarantee_50px.png"></div>
			</div>
			<h4 style="font-weight: bold;">Certificat</h4>
			<p style="font-size: 15px;"> Si vous completez l'integralité de la formaton, vous obtiendrez un certificat. </p>
		</div>
	</div>

	<div class="col-md-12" style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div><img src="<?= $link ?>/assets/base/img/icon/icons8_Calendar_50px.png" style="width: 50px;"></div>
			</div>
			<h3 style="font-weight: bold;">Durée</h3>
			<p style="font-size: 15px;">Cette formation s'etendra sur une période de  <?= Fonctions::duree($formation->date_debut, $formation->date_fin) ?>, soit  du <?= Fonctions::format_date($formation->date_debut); ?> au <?= Fonctions::format_date($formation->date_fin); ?> </p>
		</div>
	</div>

 <?php if (!isset($_SESSION['id_user']) and $url[0] != 'inscription') { ?>
	<div class="col-md-12">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<a href="<?= $link_menu ?>/inscription/<?= $formation->id ?>" target="_blank">
				<a href="<?= $link_menu ?>/inscription/<?= $formation->id ?>"><button class="btn btn-success btn-block">S'inscrire</button></a>
			</a>
		</div>
	</div>
	<?php 
} ?>
