<?php include('includes/head.php'); ?>
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

  <?php 
      if($_SESSION['droit']!='Administrateur'){
        Fonctions::set_flash("Vous n'avez pas le droit sur cette page",'danger');
        header("Location:?page=home");
      }

    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
     <?php include('includes/flash.php'); ?>
    <!-- create user -->

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
      <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs" style="font-size:18px; font-weight:bold;">
                <li class="active"><a href="#tab_1" data-toggle="tab">Utilisateurs du site</a></li>
                <li><a href="#tab_2" data-toggle="tab">Formateurs</a></li>
              </ul>
              <div class="box-header">
                  <a href="?page=Ajouter-utilisateur">
                    <button class="btn btn-primary" style="float: right;"><b> <i class="fa fa-user-plus"></i> Ajouter un utilisateur</b></button>
                  </a>
                </div>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <table id="example" class="table table-striped table-bordered" style="width:100%">

                  <tbody>
                    <?php foreach (Query::liste_not_egale () as $utilisateur): ?>
                    <tr>
                      <td style="text-align: left; font-weight: bold;">
                            <img src="dist/img/user/<?= $utilisateur->photo ?>" style="width: 50px;" class="img-responsive img-thumbnail" alt="">
                        <?= $utilisateur->prenom ?>  <?= $utilisateur->nom ?>
                        </td>
                        <td>
                          <center>
                            <a href="?page=profile&id=<?= $utilisateur->id_user ?>" class="btn btn-success btn-sm"><b> <i class="fa fa-user"></i> Profile</b></a>
                            
                            <a href="?page=Modifer-utilisateur&id=<?= $utilisateur->id_user ?>" class="btn btn-primary btn-sm"><b> <i class="fa fa-edit"></i> Modifier</b></a>

                             <a href="#<?= $utilisateur->id_user ?>" class="btn btn-danger btn-sm" role="button" data-toggle="modal"><b> <i class="fa fa-trash"></i> Supprimer</b></a>
                          </center>
                          <?php include('destroy_user.php'); ?>
                        </td>
              
                    </tr>
                     <?php endforeach ?>
                  </tbody>
                </table>


                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">

                  <tbody>
                    <?php foreach (Query::liste_prepare('utilisateur','Intervenant','droit') as $utilisateur): ?>
                    <tr>
                      <td style="text-align: left; font-weight: bold;">
                            <img src="dist/img/user/<?= $utilisateur->photo ?>" style="width: 50px;" class="img-responsive img-thumbnail" alt="">
                        <?= $utilisateur->prenom ?>  <?= $utilisateur->nom ?>
                        </td>
                        <td><?= $utilisateur->droit ?></td>
                        <td>
                          <center>
                            <a href="?page=profile&id=<?= $utilisateur->id ?>" class="btn btn-success btn-sm"><b> <i class="fa fa-user"></i> Profile</b></a>
                            
                           <a href="?page=Modifer-utilisateur&id=<?= $utilisateur->id ?>" class="btn btn-primary btn-sm"><b> <i class="fa fa-edit"></i> Modifier</b></a>

                          <a href="#<?= $utilisateur->id ?>" class="btn btn-danger btn-sm" role="button" data-toggle="modal"><b> <i class="fa fa-trash"></i> Supprimer</b></a>
                          </center>
                          <?php include('destroy.php'); ?>
                        </td>
              
                    </tr>
                     <?php endforeach ?>
                  </tbody>
                </table>
                </div><!-- /.tab-pane -->
              </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
          </div><!-- /.col -->
        <div class="col-md-12">
          <div class="box">
          <div class="box-header">
            <a href="?page=Ajouter-utilisateur">
              <button class="btn btn-primary" style="float: right;"><b> <i class="fa fa-user-plus"></i> Ajouter un utilisateur</b></button>
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
              
            
              </div>
              
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

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!-- ./wrapper -->

</body>
</html>