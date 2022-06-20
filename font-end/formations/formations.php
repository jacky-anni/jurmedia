
<?php include('admin/class/Formation.php'); ?>
<?php foreach (Query::liste_prepare('formation', 'En ligne', 'etat') as $formations) : ?>
<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="padding: 5px;">
	<div class="row c-margin-b-40">
		<div class="c-content-product-2">
			<div class="col-md-4">
				<div class="c-content-overlay">
					<div class="c-bg-img-center c-overlay-object img-rounded" data-height="height" style="height: 230px; background-image: url(<?= $link ?>/assets/base/img/layout/formation-template.jpg);"></div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="c-info-list">
					<h3 class="c-title c-font-bold c-font-22">
						<a class="c-theme-link" href="<?= $link_menu ?>/formation/<?= $formations->id ?>" style="line-height: 29px;"><?= $formations->titre ?></a>
					</h3>
					<p><?= substr($formations->description, 0, 150) ?>...</p>
					
					<?php if ($formations->certificat == 'Oui') { ?>
						<p class="c-payment-type c-font-14 c-font-bold"> <i class="fa fa-certificate"></i> Certificat gratuit
						</p>
					<?php 
					} else { ?>
							<p class="c-payment-type c-font-14 c-font-bold"> <i class="fa fa-certificate"></i> Pas de certificat
						</p>
					<?php 
					} ?>
					<p><small style="color: #26a8b4;"><?php $suivie = Query::count_prepare('formation_suivie', $formations->id, 'id_formation'); ?> <?php if ($suivie < 1) {
						echo "$suivie Participant";
					} elseif ($suivie == 1) {
						echo "$suivie Personne suit cette formation";
					} else {
						echo "$suivie Personnes suivent cette formation";
					} ?></small></p>
					
				</div>
				<p class="c-price c-font-26 c-font-thin">
					<a href="<?= $link_menu ?>/formation/<?= $formations->id ?>">
						<button class="btn btn-sm c-theme-btn c-btn-bold"> <i class="fa fa-plus"></i> Voir</button>
					</a>

						<a href="<?= $link_menu ?>/cours/<?= $formations->id ?>">
							<button class="btn btn-primary btn-sm c-btn-bold"> <i class="fa fa-sign-in"></i> Suivre ce cours</button>
						</a>
					</p>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>