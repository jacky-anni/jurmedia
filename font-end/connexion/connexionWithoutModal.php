<?php include('font-end/layout/head.php'); ?>
 <?php head("Connexion", "Observatoire Citoyen pour l’Institutionnalisation de la Démocratie", ""); ?>
<!DOCTYPE html>
<html lang="en"  >
<?php include('admin/class/Participant.php'); ?>
<title>Connexion</title>
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
<?php banner(''); ?>



<div id="feature-16-1" class="c-content-feature-16 c-bg-img-center" style="background-image: url(<?= $link ?>/assets/base/img/slide/12.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-5 col-xs-12">
				<div class="c-feature-16-container c-bg-white c-bg-opacity-6">
					<div class="c-feature-16-line c-theme-bg"></div>
					<h2 class="c-feature-16-title c-font-bold c-font-uppercase">Connectez-vous</h2>
					<h6 id="success1" style="font-size: 14px;"></h5>
					<?php include('admin/includes/flash.php'); ?>
					<form action="connexion.php" method="POST" action="" id="frmbox1" onsubmit="return formSubmit1();">
						<div class="form-group">
							<label for="login-email" class="hide">Email</label>
							<input type="email" name="email" class="form-control input-lg c-square" id="login-email" placeholder="Email" data-parsley-trigger="keypress" required="">
						</div>
						<div class="form-group">
							<label for="login-password" class="hide">Password</label>
							<input type="password" class="form-control input-lg c-square" id="login-password" placeholder="Password" name="password" required="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square btn-block c-btn-login"> <i class="fa fa-sign-in"></i> Se connecter</button>
						</div>

						 <div class="modal-footer c-no-border">                
							<a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot"><b>Mot de passe oublié ?</b> </a>
						</div>
					</form>
					
				</div>
				
			</div>
		</div>
	</div>
</div><!-- END: CONTENT/FEATURES/FEATURES-16-1 -->
 	
 </div>

 <div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Récupération de mot de passe</h3>
                <p>Pour récupérer votre mot de passe, veuillez saisir votre adresse e-mail</p>
                <form role="form" data-parsley-validate action="" action="" method="POST">
                    <div class="form-group">
                        <label for="forget-email" class="hide">Email</label>
                        <input type="email" class="form-control input-lg c-square" id="forget-email" placeholder="Adresse email" name="email" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="valider" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->

	<?php 
if (isset($_POST['valider'])) {
	extract($_POST);
	Participant::reset_password_mail($email);
	// $url=$_SERVER['REQUEST_URI'];
	// Fonctions::set_flash("Un email envoyé sur $email ",'success');
	// echo "<script>window.location ='$url';</script>";
}

?>

	<script type="text/javascript">
		function formSubmit1(){
			$.ajax({
				type: 'POST',
				url: 'font-end/connexion/connexion.php',
				data: $('#frmbox1').serialize(),
				success: function(response){
					$('#success1').html(response);
				}
			});
			var form= document.getElementById('frmbox1').reset();
			return false;
		}
	</script>



</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
    </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>