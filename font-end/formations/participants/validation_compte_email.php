<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Validation de compte | <?= $org->sigle ?></title>

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
	<?php banner("Validation de compte"); ?>

<div class="container">
	<?php include('admin/includes/flash.php'); ?>
	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">

        <?php
            if (isset($url[1]) and isset($url[2]) and isset($url[3])) {
                $participant = Query::affiche('participants_temp', $url[2], 'id');
                if ($participant) {
                    $token = sha1($participant->email) . sha1($participant->id);
                    if( $token == $url[1] ){
                        Participant::validate($participant,0);
                    }else{
                        echo "<p class='alert alert-danger'>Probleme de validation</p>";
                    }
                }else{
                    echo "<p class='alert alert-danger'>Ce compte n'exite pas</p>";
                }
            }else{
                echo "<p class='alert alert-danger'>Ce compte n'exite pas</p>";
            }
        ?>
		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->

		<?php
            if (isset($_POST['valider'])) {
                extract($_POST);
                Participant::reset_password($url[1], $url[2], $password, $password_confirmation);
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
