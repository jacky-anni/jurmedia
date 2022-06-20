<?php session_start(); ?>
<?php
 // afficher les erreurs
    // ini_set('display_errors', 'on');
    // error_reporting(E_ALL);
    ob_start();
?>
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

   <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/ligthbox/dist/css/lightbox.min.css">
  <link rel="stylesheet" href="bower_components/parsley/parsley.css" />


  <?php if($_GET['page']=='Ajouter-une-photo' || $_GET['page']=='ajouter-une-photo' || $_GET['page']=='photos-activités' || $_GET['page']=='ajouter-une-photo-de-couverture' || $_GET['page']=='profile' ): ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bower_components/crop/croppie.js"></script>
  <link rel="stylesheet" href="bower_components/crop/bootstrap.min.css" />
  <link rel="stylesheet" href="bower_components/crop/croppie.css" />
  <?php endif ?>
</head>

<?php
 ob_start();
  require 'class/bdd/bdd.php';
  require 'class/Autoloader.php';
  require 'class/Fonctions.php';
 ?>
<title>
<?php
	if (isset($_GET['page'])) {echo ucfirst(str_replace("-", " ", ucfirst($_GET['page'])))." - OCID";}else{echo "Accueil - OCID";}?>
</title>
<!-- <link rel="icon" href="dist/img/logo/logo.jpg"> -->
<?php

// if (!Fonctions::utilisateur()) {
// 	header("Location:?page=login");
// }

Fonctions::redirect_admin();
?>
<link rel="icon" href="admin/dist/img/logo.png>" />