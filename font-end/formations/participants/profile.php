<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Utilisateur.php'); ?>
<?php Fonctions::redirect(); ?>
<!DOCTYPE html>
<html lang="en">
<title>Formation | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
	<?php $user = Query::affiche('participant', $_SESSION['id_user'], 'id'); ?>
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php'); ?>
    <?php include('font-end/layout/logo_and_search.php'); ?>
    <?php include('font-end/layout/menu.php'); ?>
    <?php include('font-end/layout/user_bar.php'); ?>
</header>
<div class="c-layout-page">
	<?php include('font-end/layout/banner.php'); ?>
	<?php banner('Page de profile'); ?>

<div class="container">

	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">
			<?php include('admin/includes/flash.php'); ?>
			<div class="col-md-4 c-margin-b-20 c-margin-t-10">
				<center class="list-group-item col-md-12">
  
					<div class="col-md-12">
					<h4 class="c-font-uppercase c-font-bold"><?= Fonctions::user()->nom_complet ?><h4><hr/>
						<div class="c-content-ver-nav" style="text-align: left;">
							<ul class="c-menu c-arrow-dot1 c-theme">
							<li><a href="<?= $link_menu ?>/tableau-de-bord"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
								<li><a href="<?= $link_menu ?>/formations ?> "><i class="fa fa-graduation-cap"></i> Mes formations</a></li>
								<li><a href="<?= $link_menu ?>/deconnexion"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
							</ul>
						</div>
					</div>
					
			</div>
			<div class="col-md-8">
				<div class="c-content-tab-1 c-theme c-margin-t-30">
					<div class="clearfix">
						<ul class="nav nav-tabs  c-font-bold">
							<li class="active"><a href="#tab_1_1_content" data-toggle="tab"><i class="fa fa-user"></i>  Informations Personnelles</a></li>
							<li><a href="#tab_1_2_content"  data-toggle="tab"> <i class="fa fa-lock"></i> changer mot de passe</a></li>
						</ul>
					</div>
					<div class="tab-content c-bordered c-padding-lg">
						<div class="tab-pane active" id="tab_1_1_content">
							<form action="" method="post" role="form" data-parsley-validate action="">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<h4 class="text-primary"><b><?= $user->nom_organisation ?></b></h4>
											<small><b><?= $user->sigle ?></b></small>
											 <hr>
											<div class="form-group col-md-12">
													<label class="">Nom complet</label>
													<input type="text" name="nom" value="<?= $user->nom_complet ?>" class="form-control" placeholder="Jacky Anizaire" required="">
												</div>
			
											<div class="form-group col-md-12">
												<label class="">Sexe </label>
												<select name="sexe" class="form-control"  required="">
													 <option value="">Choisir votre sexe</option>
										            <option value="Homme" <?php if ($user->sexe == 'Homme') {
																																												echo "selected";
																																											} ?> >Homme</option>
										            <option value="Femme" <?php if ($user->sexe == 'Femme') {
																																												echo "selected";
																																											} ?>>Femme</option>
												</select>
											</div>

												<div class="form-group col-md-6">
													<label class="">Commune de residence</label>
													<input type="text" name="commune" value="<?= $user->commune_residence ?>" class="form-control" placeholder="Port-Margot" required="">
												</div>
											<div class="col-md-6">
												<label class="">Département</label>
												<select name="departement" class="form-control"  required="">
													 <option value="">Choisir un département</option>
										            <option value="Nord" <?php if ($user->departement == 'Nord') {
																																											echo "selected";
																																										} ?> >Nord</option>

										            <option value="Nord-Est" <?php if ($user->departement == 'Nord-Est') {
																																															echo "selected";
																																														} ?>>Nord-Est</option>

										            <option value="Nord-Ouest" <?php if ($user->departement == 'Nord-Ouest') {
																																																	echo "selected";
																																																} ?>>Nord-Ouest</option>

										            <option value="Sud" <?php if ($user->departement == 'Sud') {
																																										echo "selected";
																																									} ?>>Sud</option>

										            <option value="Sud-Est" <?php if ($user->departement == 'Sud-Est') {
																																														echo "selected";
																																													} ?>>Sud-Est</option>

										            <option value="Ouest" <?php if ($user->departement == 'Ouest') {
																																												echo "selected";
																																											} ?>>Ouest</option>

										            <option value="Centre" <?php if ($user->departement == 'Centre') {
																																													echo "selected";
																																												} ?>>Centre</option>

										            <option value="Artibonite" <?php if ($user->departement == 'Artibonite') {
																																																	echo "selected";
																																																} ?>>Artibonite</option>

										            <option value="Nippes" <?php if ($user->departement == 'Nippes') {
																																													echo "selected";
																																												} ?>>Nippes</option>
										            <option value="Grand-Anse" <?php if ($user->departement == 'Grand-Anse') {
																																																	echo "selected";
																																																} ?>>Grand-Anse</option>
												</select>
											</div>
										</div>
									</div>
								</div>

									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Téléphone</label>
													<input type="text" name="telephone" value="<?= $user->telephone ?>" class="form-control" placeholder="+5094872 0022" required="">
												</div>
												<div class="form-group col-md-6">
													<label class="">Téléphone Whatsapp</label>
													<input type="text" name="telephone2" value="<?= $user->telephone_whatsapp ?>" class="form-control" placeholder="+5093349-90" required="">
												</div>
											</div>
										</div>

											<div class="col-md-12">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Profession</label>
													<input type="text" name="profession" value="<?= $user->professsion ?>" class="form-control" placeholder="+5094872 0022" required="">
												</div>
												<div class="form-group col-md-6">
													<label class="">Votre fonction dans l'lorganisation</label>
													<input type="text" name="fonction" value="<?= $user->fonction ?>" class="form-control" placeholder="+5093349-90" required="">
												</div>
											</div>
										</div>
									</div>
										<div class="row">
									</div>
								
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="modifier" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold btn-sm"> <i class="fa fa-edit"></i> <b>Modifier</b></button>
									</div>
								</div>
							</form>

						</div>
						<div class="tab-pane" id="tab_1_2_content">
							<form action="" method="POST" role="form" data-parsley-validate action="">
								<div class="row">
								<div class="form-group col-md-12">
										<label class="">Mot de passe actuel </label>
										<input type="password" placeholder="actuel mot de passe" data-parsley-trigger="keypress"  class="form-control" name="password_actuel" id="password1"  required="">
									</div>
									
								<div class="form-group col-md-12">
									<label class="control-label">Entrer  un mot passe</label>
									<input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress"  class="form-control" data-parsley-maxlength="250" name="password" id="password2" data-parsley-minlength="6"  required="">
								</div>
								<div class="col-md-12">
									<label class="control-label">Répéter le mot de passe</label>
									<input type="password" data-parsley-equalto="#password2" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250"  required=""></br>
								</div>

								<div class="row">
									<div class="form-group col-md-12">
										<button type="submit" name="changer"  class="btn btn-primary"> <i class="fa fa-edit"></i> Changer</button>
									</div>
								</div>

									
								</div>
							</form>
						</div>
					</div>
				</div>
		</div>
			<?php 
		if (isset($_POST['modifier'])) {
			extract($_POST);
			$participant = Participant::modifier_profil($nom, $sexe, $commune, $departement, $telephone, $telephone2, $profession, $fonction);
		}

		if (isset($_POST['changer'])) {
			extract($_POST);
			Participant::modifier_password($password_actuel, $password, $password_confirmation);
		}
		?>

		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->
	<!-- END: PAGE CONTENT -->
	</div>
</div>
</div>

	<style type="text/css">
		label{
			font-size: 13px;
		}
	</style>



<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
