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
          <div class="box-header">
           <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><b> <i class="fa fa-plus"></i>  Nouvelle catégorie (<?= Query::count_prepare('categorie',$_SESSION['id'],'posteur'); ?>)</b></button>
          </div><hr>

          <div class="box-body">
          <?php include('create.php') ?>
            <ul class="todo-list">

                <?php foreach(Query::liste ('categorie') as $categorie): ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                          <i class="fa fa-ellipsis-v"></i>
                          <i class="fa fa-ellipsis-v"></i>
                        </span>
                    <!-- checkbox -->
                    <!-- todo text -->

                   
                    <span class="text" style="font-size:16px;"><?= $categorie->nom_categorie ?></span></br>
                    <!-- Emphasis label -->
                    <small class="" style="margin-left: 25px;"> <?= $categorie->description_categorie ?></small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $categorie->id;?>"><b> <i class="fa fa-edit"></i>  Modifier</b></button>
                      <a href="#<?= $categorie->id;?>1"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
                    </div>
                  </li>
                  
                    <?php include('edit.php') ?>
                    <?php include('destroy.php') ?>
                 
                  <?php endforeach; ?>

              </ul>
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
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
