<?php session_start(); ?>
<?php
    // afficher les erreurs
ini_set('display_errors', 'on');
error_reporting(E_ALL);
    // selectionner la base de donne
require('admin/class/bdd/bdd.php');
    // ajouter les fonctions identiques
require 'admin/class/Fonctions.php';
    // module des requettes 
require 'admin/class/Query.php';
require 'font-end/layout/config.php';
$org = Query::affiche('organisation', 1, 'id');
ob_start();
?>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="OCID, société civile, Observatoire, Cuitoyen, Democratie, Haiti, Organisation, Droits Humians, Dwa Moun" />
		<?php
  function head($titre, $description, $photo)
  {
    $url_ =$_SERVER['REQUEST_URI'];
    echo "
			<title>$titre - OCID </title>	
			<meta name='keywords' $titre />
			<meta name='description' content=$description>
			<meta name='author' content='OCID'>
			<meta property='og:url'           content=$url_ />
			<meta property='og:type'          content='website' />
			<meta property='og:image'         content=$photo />
			</head>
			";
  }
  ?>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="Observatoire Citoyen pour L'intitutionnalisation de Democratie en Haiti" name="description" />
    <meta content="OCID" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="<?= $link ?>/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN: PAGE STYLES -->
    <link href="<?= $link ?>/assets/plugins/ilightbox/css/ilightbox.css" rel="stylesheet" type="text/css" />
    <!-- END: PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?= $link ?>/assets/demos/index/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $link_admin ?>/bower_components/parsley/parsley.css" />
    <!-- END THEME STYLES -->

    <!-- BEGIN: BASE PLUGINS  -->
    <link href="<?= $link ?>/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/slider-for-bootstrap/css/slider.css" rel="stylesheet" type="text/css"/>
</head>

