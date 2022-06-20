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
          </div>
          <!-- /.box-header -->

          <?php
          $formations = Query::affiche('formation', $_GET['formations'], 'id');
          if (!$formations->id) {
              // si l'formations n'existe pas
            header("Location:?page=formations");
          }
          ?>
            
          <div class="box-body">

             <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formations->id ?>" style="color: white;"><?= $formations->titre ?></a></span>
                    <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Liste des participants</span>
                  </div>
              <!-- /.info-box-content -->
            </div>
                
            <div class="tablde-responsive">
            <table id="example" class="table table-striped table-responsive table-bordered exportTable" style="width:100%">
              <thead>
                <tr>
                  <td></td>
                  <th>Nom</th>
                  <th>Sexe</th>
                  <th>Commune</th>
                  <th>Département</th>
                  <th>Téléphone</th>
                  <th>Email</th>
                  <th>Téléphone Whatsapp</th>
                  <th>Profession </th>
                  <th>Fonction </th>
                  <th>Organisation </th>
             
                </tr>
              </thead>
              <tbody>
              <?php foreach (Query::liste_prepare('formation_suivie', $_GET['formations'], 'id_formation') as $formation) : ?>
                <?php $participant = Query::affiche('participant', $formation->id_participant, 'id'); ?>
              <tr>
                <td><img src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1214428300?k=20&m=1214428300&s=170667a&w=0&h=NPyJe8rXdOnLZDSSCdLvLWOtIeC9HjbWFIx8wg5nIks=" width="27px" class="user-image" alt="User Image"></td>
                <td> <?php if (!empty($participant->nom_complet)) {
                      echo $participant->nom_complet;
                    } ?></td>
                <td><?php if (!empty($participant->sexe)) {
                      echo $participant->sexe;
                    } ?></td>
                <td><?php if (!empty($participant->commune_residence	)) {
                      echo $participant->commune_residence	;
                    } ?></td>
                <td><?php if (!empty($participant->departement)) {
                      echo $participant->departement;
                    } ?></td>
                <td><?php if (!empty($participant->telephone)) {
                      echo $participant->telephone;
                    } ?></td>
                     <td><?php if (!empty($participant->email)) {
                      echo $participant->email;
                    } ?></td>
                     <td><?php if (!empty($participant->telephone_whatsapp	)) {
                      echo $participant->telephone_whatsapp	;
                    } ?></td>
                     <td><?php if (!empty($participant->professsion	)) {
                      echo $participant->professsion	;
                    } ?></td>
                     <td><?php if (!empty($participant->fonction	)) {
                      echo $participant->fonction	;
                    } ?></td>
                     <td><?php if (!empty($participant->nom_organisation	)) {
                      echo $participant->nom_organisation	;
                    } ?></td>
              </tr>
            <?php endforeach; ?>


              </tbody>
            </table>
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
