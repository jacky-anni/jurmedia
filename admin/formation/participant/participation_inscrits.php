<?php include('includes/head.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
<?php include('class/Participant.php') ?>

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
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-striped table-responsive table-bordered exportTable" style="width:100%">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach (Query::liste('participants_temp') as $participant) : ?>
              <?php $check = Query::count_prepare('participant', $participant->id, 'id'); ?>
              <tr>
                <td><?php if (!empty($participant->nom_complet)) {
                      echo $participant->nom_complet;
                    } ?></td>
                <td><?php if (!empty($participant->email)) {
                      echo $participant->email;
                    } ?></td>
                <td><?php if (!empty($participant->telephone)) {
                      echo $participant->telephone;
                    } ?></td>

                <td width="15%">
                <form action="" method="POST">
                <input type="hidden" name='id' value="<?= $participant->email ?>">
                <?php if ($check) {
                  $btn = "success";
                  $act = "disabled";
                  $ok = "Ok";
                } else {
                  $btn = "primary";
                  $act = "";
                  $ok = "Desac";
                } ?>
                  <button type="submit" name="submit" class="btn btn-<?= $btn ?> btn-sm" <?= $act ?> >
                    Activer <?= $ok ?>
                  </button>
                </form>
                </td>
              </tr>
            <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          </div>
          <!-- /.box-body -->
        </div>

        <?php 

        if (isset($_POST['submit'])) {
          $particpants = Query::affiche('participants_temp', $_POST['id'], 'email');
          if ($particpants) {
            Participant::validate($particpants, 1);
          } else {
            Fonctions::set_flash("Erreur , reesayer", 'danger');
            $link_rediret = $_SERVER['REQUEST_URI'];
          }

        }
        ?>

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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: { orthogonal: 'export' }
            }
        ]
    } );
} );
</script>
</body>
</html>
