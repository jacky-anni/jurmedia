<?php $cours = Query::count_query('formation'); ?>
<?php $cours_suivie = Query::count_prepare('formation_suivie', $_SESSION['id_user'], 'id_participant'); ?>


<div class="c-content-box c-size-md" style="background-color:#181870; margin-bottom:10px;">
<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
	<div class="container">
	<div class="c-page-title c-pull-left">
		<h5 class="c-font-uppercase c-font-bold">Bienvenue <?= $_SESSION['nom'] ?></h5>
		<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
			<li><a href="https://chat.whatsapp.com/IniQDzWz7q26VmvH3pEG1j" target="_blank" style="color:black;"> <i class="fa fa-whatsapp"></i> Interegrez le group de la formation</a></li>  		
		</ul>
	</div>
	</div>
</div>

	<div class="container">
		<div class="c-content-bar-3">
			<div class="row">
				<div class="col-md-7"  style="margin-top:10px; margin-bottom:0px;">
					<p><a style="color:yellow; font-weight:bold;" href="<?= $link_menu ?>/formations"><?= $cours_suivie ?> / <?= $cours ?> formations</a></p>
					<div class="c-content-tidtle-1s" style="color:white;">
					<?php if($cours_suivie <= 0) {  ?>
						<span>Vous n'avez pas encore de formation sur votre compte</span>
					<?php }elseif($cours_suivie < $cours){ ?>
						<p> Il ya d'autres formations qui peuvent vous interresser  </p>
					<?php }else{echo "Vous suivez toutes les formations";} ?>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-2">
					<div class="c-content-v-center" style="height: 10px;">
						<div class="c-wrapper">
							<div class="c-body">
								<?php if ($cours_suivie <= 0) { ?>
									<a href="<?= $link_menu ?>/formations">
										<button type="button" class="btn btn-md c-btn-square c-btn-border-2x  c-btn-bold" style="background-color:white;" >Voir les formations</button>
									</a>
								<?php 
									} elseif ($cours_suivie < $cours) { ?>
										<a href="<?= $link_menu ?>/formations">
											<button type="button" class="btn btn-md c-btn-square c-btn-border-2x  c-btn-bold" style="background-color:white;" >Voir d'autres formations </button>
										</a>
									<?php 
									} else {
										echo "";
									} ?>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div> 
</div>

	
	<?php foreach (Query::liste_prepare_asc('formation_suivie', $_SESSION['id_user'], 'id_participant') as $formations) : ?>
	<?php 
	$formation = Query::affiche('formation', $formations->id_formation, 'id');
	// verifier la quantite de quiz passe
	$module_total = Module::count($formation->id);
	$module_passe = Quiz::pass_module($_SESSION['id_user'], $formation->id);

	if ($module_passe > $module_total) {
		$module_passe = $module_total;
	}

	// verifi si le modue passe est egal a 0
	if ($module_passe > 0) {
	// pourcentage de module passe;
		$note = number_format($module_passe / $module_total * 100);} else {$note = 0;}
?>
  <div class="container c-bg-grey-1">
  <div class="col-md-4">
	<div class="item">
		<div class="c-content-blog-post-card-1 c-option-2">		
			<div class="c-media c-content-overlay">
				<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>">
					<img class="c-overlay-object img-responsive" src="<?= $link ?>/assets/base/img/layout/formation-template.jpg" alt="">
				</a>
			</div>
			<div class="c-body">
				<div class="c-title c-font-bold">
					<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>" style="font-size: 15px; font-weight: bold; text-align: center;"><?= $formation->titre ?> </a>
				</div>
				<div class="c-author" >
					<center><small><span> Pour valider cette formation, on doit obtenir 60/100 pour chaque module  avant le  <?= Fonctions::format_date($formation->date_fin) ?></span></small></center>
				</div>

				<div class="c-panel">							
				<div class="c-comments" style="font-size:13px;">
				<a href="#">
				<i class="icon-speech"></i>
				<?= $module_passe ?>/<?= $module_total ?> <?php if ($module_total > 1) {
					echo "Modules";
				} else {
					echo "Modules";
				} ?>

				</a>
				</div>
				</div>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $note ?>%; background-color: #00a65a;">
					<?= $note ?>%
				</div>
			</div>

			<div class="c-panel" style="margin-bottom: -25px;">
				<ul class="c-tags c-theme-ul-bg">
					<li><a href="<?= $link_menu ?>/releve-note/<?= $formation->id ?>" style="color: black; font-weight: bold;">Notes</a></li>
					<?php if ($module_passe == $module_total && $formation->fermeture==0 && $module_total!=0) : ?>
						<li><a href="<?= $link_menu ?>/certificat/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?>" target="_blank" style="color: black; font-weight: bold;"> <i class="fa fa-certificate"></i> Certificat</a></li>
					<?php endif ?>
				</ul>							
			</div>
		</div><br>
	</div>
	</div>













</div>


  <?php endforeach; ?>
  </div>
  