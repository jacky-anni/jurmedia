<?php include('includes/head.php');?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
<?php include('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
   <?php include('includes/menu.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
    <?php include('includes/flash.php'); ?>

    <!-- Main content -->
    <section class="content container-fluid"><br>

       <?php
          // selectionner le formations en question
            $formations=Query::affiche('formation',$_GET['formations'],'id');
             if (!$formations->id) {
              // si l'formations n'existe pas
              Fonctions::set_flash("Formations n'existe pas",'danger');
               header("Location:?page=formations");
             }
             // // utilisateur qui poste
             $user=Query::affiche('utilisateur',$formations->posteur,'id');
             // mettre online ou offeline 
              if (isset($_GET['formations']) AND isset($_GET['statut'])) {
                require 'class/Formation.php';
                Formation::statut();
              }

              // Ouvrir et fermer l'inscription
              if (isset($_GET['formations']) AND isset($_GET['fermeture'])) {
                require 'class/Formation.php';
                Formation::fermeture_quiz();
              }

              if (isset($_GET['update'])) {
                $formations=$_GET['formations'];
                header("Location:?page=Formations&formations=$formations");
              }
          ?>


       <div class="info-box bg-green">
            <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><?= $formations->titre ?></span>
                <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;"><?= $formation_= Query::count_prepare('formation_suivie',$formations->id,'id_formation') ?><?php if($formation_>1){echo " Participants";}else{echo " Participant";} ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>

      <div class="box box-primary">

        <div class="row">
          <div class="col-md-5">
            <div class="box-header with-border">
              <h4 class="box-title" style="font-size: 15px; font-weight: bold; color: red;">Informations supplémentaire</h4>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a ><b>Date de début</b>
                  <span class="pull-right text-red"> <?= Fonctions::format_date( $formations->date_debut ); ?></span></a>
                </li>

                <li><a ><b>Date de fin</b>
                  <span class="pull-right text-blue"> <?= Fonctions::format_date( $formations->date_fin ); ?></span></a>
                </li>

                <li><a ><b>Durée</b>
                  <span class="pull-right text-purpule"> <?= Fonctions::duree($formations->date_debut,$formations->date_fin) ?></span></a>
                </li>

              </ul>
            </div>
            <!-- /.footer -->
          </div>

          <div class="col-md-1">
            
          </div>

          <div class="col-md-5">
            <div class="box-header with-border">
              <h4 class="box-title" style="font-size: 15px; font-weight: bold; color: red;">Informations sur les participants</h4>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
              

                <li><a href="?page=participants"> <b>Participants eligibles</b>
                  <span class="pull-right text-red"> <?= Query::count_query('participants_temp') ?></span></a>
                </li>

                <li><a href="?page=participants_&formations=<?= $formations->id ?>"> <b>Participants</b>
                  <span class="pull-right text-red"> <?= Query::count_prepare('formation_suivie',$formations->id,'id_formation') ?></span></a>
                </li>
                

                 <li><a href="?page=modules&id=<?= $formations->id ?>"><b>Modules</b>
                  <span class="pull-right text-blue"> <?= $modules_= Query::count_prepare('module_formation',$formations->id,'id_formation') ?></span></a>
                </li>

                  <li><a href="?page=les-participants&id=<?= $formations->id ?>"><b>Ceux qui ont passé au moins un examen</b>
                    <span class="pull-right text-purpule"> <?= count(Module::user_module_pass($formations->id)) ?></span></a>
                  </li>

                 

            

              </ul>
            </div>
            <!-- /.footer -->
          </div>


          </div>
        <hr/>

      <div class="box-body box-profile">
        
       
          <div class="box-body">
            <div class="col-md-12">
                <!-- Box Comment -->
                <div class="box box-widget">
                <div class="box-body">
                  <p style="margin-top: -20px;"> <?= $formations->presentation ?></p>
                  <?php include('boutton.php'); ?>
                  <?php include('destroy.php'); ?>

                </div>
                <!-- /.box-body -->
              </div>
                <!-- /.box -->
      </div>

       <div>

    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include('includes/footer.php'); ?>
  <?php include('includes/tools.php'); ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
