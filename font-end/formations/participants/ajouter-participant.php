<?php include('font-end/layout/head.php'); ?>
<?php Fonctions::redirect(); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Ajouter des participants | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php'); ?>
    <?php include('font-end/layout/logo_and_search.php'); ?>
    <?php include('font-end/layout/menu.php'); ?>
    <?php include('font-end/layout/user_bar.php'); ?>
</header>
<div class="c-layout-page">
	<?php include('font-end/layout/banner.php'); ?>
	<?php banner("Ajouter des participants"); ?>
    <?php $user = Query::affiche('participant', $_SESSION['id_user'], 'id'); ?>

<div class="container">
	<?php include('admin/includes/flash.php'); ?>
	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">
        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
	<div class="container">
        <div class="c-page-title c-pull-left">
            <h5 class="c-font-uppercase c-font-bold">Hello,  <?= $_SESSION['nom'] ?></h5>
            Vous pouvez ajouter 1 participant pour suivre les formations
        </div>
        </div><hr>

        <div class="col-md-12">
        <?php if($user->add_user == 0 && $user->resp == 1) { ?>
        <form action="" method="post" role="form" data-parsley-validate action=""  style="background-color:white; padding:10px;">
           
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="">Nom complet</label>
                        <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom'];} ?>" class="form-control" placeholder="Jacky Anizaire" required="">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="">Sexe </label>
                        <select name="sexe" class="form-control"  required="">
                                <option value="">Choisir votre sexe</option>
                            <option value="Homme" <?php if (isset($_POST['sexe']) == 'Homme') {
                        echo "selected";
                    } ?> >Homme</option>
                            <option value="Femme" <?php if (isset($_POST['sexe']) == 'Femme') {
                        echo "selected";
                    } ?>>Femme</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="">Département</label>
                        <select name="departement" class="form-control"  required="">
                                <option value="">Choisir un département</option>
                                <option value="Nord" <?php if (isset($_POST['departement']) == 'Nord') {
                            echo "selected";
                        } ?> >Nord</option>

                                <option value="Nord-Est" <?php if (isset($_POST['departement']) == 'Nord-Est') {
                                echo "selected";
                            } ?>>Nord-Est</option>

                                <option value="Nord-Ouest" <?php if (isset($_POST['departement']) == 'Nord-Ouest') {
                                echo "selected";
                            } ?>>Nord-Ouest</option>

                                <option value="Sud" <?php if (isset($_POST['departement']) == 'Sud') {
                            echo "selected";
                        } ?>>Sud</option>

                                <option value="Sud-Est" <?php if (isset($_POST['departement']) == 'Sud-Est') {
                                echo "selected";
                            } ?>>Sud-Est</option>

                                <option value="Ouest" <?php if (isset($_POST['departement']) == 'Ouest') {
                            echo "selected";
                        } ?>>Ouest</option>

                                <option value="Centre" <?php if (isset($_POST['departement']) == 'Centre') {
                            echo "selected";
                        } ?>>Centre</option>

                                <option value="Artibonite" <?php if (isset($_POST['departement']) == 'Artibonite') {
                                echo "selected";
                            } ?>>Artibonite</option>

                                <option value="Nippes" <?php if (isset($_POST['departement']) == 'Nippes') {
                            echo "selected";
                        } ?>>Nippes</option>
                                <option value="Grand-Anse" <?php if (isset($_POST['departement']) == 'Grand-Anse') {
                                echo "selected";
                            } ?>>Grand-Anse</option>
                        </select>
                    </div>
                </div>
             

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label class="">Commune de residence</label>
                                <input type="text" name="commune" value="<?php if (isset($_POST['commune'])) {
                                    echo $_POST['commune'];
                                } ?>" class="form-control" placeholder="Port-Margot" required="">
                            </div>
                         <div class="form-group col-md-6">
                                <label class="">Email</label>
                                <input type="email" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email'];} ?>" class="form-control" placeholder="anizairejacky@gmail.com" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Téléphone</label>
                                <input type="text" name="telephone" value="<?php if (isset($_POST['telephone'])) { echo $_POST['telephone'];} ?>" class="form-control" placeholder="+5094872 0022" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Téléphone Whatsapp</label>
                                <input type="text" name="telephone2" value="<?php if (isset($_POST['telephone2'])) {echo $_POST['telephone2'];} ?>" class="form-control" placeholder="+5093349-90" required="">
                            </div>

                             <div class="form-group col-md-6">
                                <label class="">Profession</label>
                                <input type="text" name="profession" value="<?php if (isset($_POST['profession'])) {echo $_POST['profession'];} ?>" class="form-control" placeholder="Ing informaticien" required="">
                            </div>

                             <div class="form-group col-md-6">
                                    <label class="">Fonction dans l'lorganisation</label>
                                        <input type="text" name="fonction" value="<?php if (isset($_POST['fonction'])) { echo $_POST['fonction'];} ?>" class="form-control" placeholder="President" required="">
                                    </div>
                                </div>
                        </div>
                    </div>
            
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="ajouter" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold btn-sm"> <i class="fa fa-user"></i> <b>Ajouter</b></button>
                </div>
            </div>
        </form>
         <?php }else{ ?>
         <p class="alert laert-danger"><b>Vous avez déjà ajouté un participant</b></p>
         <?php } ?>
        </div>
    </div>
       
		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->

		<?php
        if (isset($_POST['ajouter'])) {
            extract($_POST);
            $participant = Participant::ajouter_participant($nom, $sexe, $departement, $commune, $email, $telephone, $telephone2, $profession, $fonction);
        }
	    ?>

	<!-- END: PAGE CONTENT -->
	</div>
</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
