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
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><b> <i class="fa fa-plus"></i>  Nouvelle video (<?= Query::count_prepare('video',$_SESSION['id'],'posteur'); ?>)</b></button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead><tr><th class="hidden"></th></tr>
              </thead>
              <tbody>
               <?php foreach( array_chunk( Query::liste_prepare ('video',$_SESSION['id'],'posteur'), 3) as $video): ?>
              <tr>

                <div class="row">
                <td>
                  <?php foreach($video as $video): ?>
                    <div class="col-md-4">
                       <h4 class="media-heading">
                          <div class="embed-responsive embed-responsive-16by9">
                           <?= $video->lien ?>
                          </div>
                          <div class="well col-md-12" style="background-color: #438eb9;">
                            <h4 class="white  smaller lighter" style=" color: white; line-height: 27px; "><?= $video->nom ?></h4>
                            <span class="pull-right" style="font-size: 12px; color: white;"> Publiée le : <?= $video->date_post ?></span>
                          </div>
                          <div style="margin-top: -20px;">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $video->id;?>"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                          <a href="#<?= $video->id;?>1"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
                          </div>
                        </h4>
                    </div>
                    <?php include('edit.php') ?>
                    <?php include('destroy.php') ?>
                  <?php endforeach;  ?>
                </td>
              </div>
                
              </tr>
            <?php endforeach;  ?>


              </tbody>
            </table>
            <?php include('create.php') ?>
            
            

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
