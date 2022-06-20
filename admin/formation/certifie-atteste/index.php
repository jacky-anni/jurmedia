<?php include('includes/head.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
          <div class="box-header">
             <?php
            $formation = Query::affiche('formation', $_GET['id'], 'id');
            if (!$formation->id) {
                  // si l'formation n'existe pas
              Fonctions::set_flash("La formation ou le module n'existe pas ", 'danger');
              echo "<script>window.location ='?page=modules';</script>";
            }
            ?>
              <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formation->id ?>" style="color: white;"><?= $formation->titre ?></a></span>

                  <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Les participants qui subissent au moins un examen</span>
                </div>
            <!-- /.info-box-content -->
          </div>

        
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                      <th>
                          Nom
                      </th>
                      
                      <th>
                          Sexe
                      </th>

                       <th>
                          Departement
                      </th>

                        <th>
                          email
                      </th>

                        <th>
                          telephone
                      </th>

                       <th>
                          Organisation
                      </th>

                      <th>
                        Module
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
                 <tbody>

                  <?php foreach (Module::user_module_pass($formation->id) as $key => $form) : ?>
                    <?php 
                    $module_total = Module::count($formation->id);
                    $count_user = Quiz::pass_module($form->id_participant, $formation->id);
                    ?>
                  <tr>
                      <td>
                          <?= $form->nom_complet ?>
                      </td>

                         <td>
                          <?= $form->sexe ?>
                      </td>

                      <td>
                          <?= $form->departement ?>
                      </td>

                      <td>
                          <?= $form->email ?>
                      </td>

                      <td>
                          <?= $form->telephone ?>
                      </td>

                      <td>
                          <?= $form->nom_organisation ?>
                      </td>

                       <td>
                        <?php
                        echo $count_user . "/" . $module_total;
                          // $module_total==$count_user
                        ?>
                      </td>

                      <?php

                      $module_total = Module::count($formation->id);
                         // kantite quiz ou pase
                      $count_user = Quiz::pass_module($form->id_participant, $formation->id);

                          $link = "?page=certificat&id=$formation->id&participant=$form->id_participant";
                      ?>
                         
                    <?php if ($module_total == $count_user) : ?>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="<?= $link ?>" target="_blank">
                              <i class="fa fa-print">
                              </i>
                              Imprimer
                          </a>
                      </td>
                      <?php endif ?>

          
                  </tr>
         
                <?php endforeach; ?>

              </tbody>
            </table>
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
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- page script -->
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



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
