<?php session_start(); ?>
<?php
 // afficher les erreurs
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
  require 'class/bdd/bdd.php';
  require 'class/Autoloader.php';
  require 'class/Fonctions.php';
  $org=Query::affiche('organisation',1,'id');
 ?>
<title>
<?php
  
  if (isset($_GET['page'])) {
    echo ucfirst(str_replace("-", " ", $_GET['page']))." - OCID";
  }else
  {
    echo "Connexion- OCID";
  }
?>
</title>
<link rel="icon" href="../font-end/images/logo.png" />
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <link rel="stylesheet" href="bower_components/parsley/parsley.css" />

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style="background-image: url('dist/img/autres/body-bg.jpg'); background-repeat: no-repeat;" >
    <div class="login-box"  style="opacity: 0.9;">
      <div class="login-box-body" style=" border-radius: 10px;" >
        
        <center>
          <img src="dist/img/logo/<?= $org->logo?>" style="max-width: 130px;"> <hr>
        </center>
        <?php include 'includes/flash.php'; ?>
        <h5 style="font-weight: bold; text-align: center;">CONNECTEZ-VOUS</h5>
        <form action="" id="loginForm" method="POST" data-parsley-validate role="form" >
          <div class="form-group has-feedback">
             <input type="email" data-parsley-type="email" placeholder="anizairejacky@gmail.com" name="email" value="" required="" class="form-control">

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
               <input type="password" data-parsley-trigger="keypress" required=""  name="password" id="password" placeholder="Votre mot de passe"  class="form-control">

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="text-center">
            <button type="submit" name="connexion"  class="btn btn-primary btn-block loginbtn"> <i class="fa fa-user"></i> Se Connecter</button>
        </div>
        </form>

      </div>
      <!-- /.login-box-body -->
    </div>
    <?php
      
      //traitement du formulaire 
      //si on renvie la page
      if (isset($_POST['connexion'])) {
        extract($_POST);
      
        Utilisateur::authentifier($email,$password);
      }
    ?>
</body>
</html>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/parsley/parsley.min.js"></script>
<script src="bower_components/parsley/fr.js"></script>
