<?php include('includes/head.php'); ?>
<?php include('class/Participant.php'); ?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
<?php include('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
    <!-- sidebar: style can be found in sidebar.less -->
   <?php include('includes/menu.php'); ?>
    <!-- /.sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
    <?php include('includes/flash.php'); ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-body box-profile">

          <div class="boxj">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr style="background-color: #3b8dbc; color: white;">
                  <th style="width: 10px">Formations</th>
                  <th>Ressources</th>
                </tr>
                <?php foreach (Query::liste('formation',5) as $formation): ?>
                <tr>
                  <td><?= $formation->titre ?></td>
                  <td>

                    <span class="badge bg-blue">  <a href="" style="color: white;"><?= Query::count_prepare('formation_suivie',$formation->id,'id_formation'); ?> Participants</a> </span>

                    <span class="badge bg-red">  <a href="" style="color: white;"><?= Query::count_prepare('module_formation',$formation->id,'id_formation'); ?> Modules</a> </span>

                  </td>
                </tr>
              <?php endforeach; ?>

              </table>
            </div>

          </div><hr/>
          <!-- /.box -->
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
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
