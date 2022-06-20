<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>

			<p class="c-font-white c-font-thin c-opacity-09"><?= $formation->description ?></p>

			<h4 class=" c-font-tlhin" style="color: yellow;">
				<i><?php $suivie = Query::count_prepare('formation_suivie', $formation->id, 'id_formation'); ?> <?php if ($suivie < 1) {
				echo "$suivie Participant";
			} elseif ($suivie == 1) {
				echo "$suivie Personne suit cette formation";
			} else {
				echo "$suivie Personnes suivent cette formation";
			} ?></i></h4>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->