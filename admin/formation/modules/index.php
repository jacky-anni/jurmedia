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
    <section class="">
      <div class="box-body box-prfofile">
          <div class="box">
            <?php
                 $formation=Query::affiche('formation',$_GET['id'],'id');
                 if (!$formation->id) {
                  // si l'formation n'existe pas
                   header("Location:?page=modules");
                 }
              ?>
              <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formation->id ?>" style="color: white;"><?= $formation->titre ?></a></span>

                    <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Liste des modules</span>
                  </div>
              <!-- /.info-box-content -->
            </div>
          <div class="box-header">
            <a href="" data-toggle="modal" data-target="#modal-default">
              <button class="btn btn-primary pull-right"><b> <i class="fa fa-plus"></i>  Nouveau module</b></button>
            </a>
          </div>


          <?php include('create.php'); ?>
          <!-- /.box-header -->
          <div class="box-body">
          <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
             <div class="box-body">
                  <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                 <?php include('modules.php'); ?>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>
          <!-- /.box-body -->
        </div>

        </div>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
