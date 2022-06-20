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
    <div class="row">
      <div class="col-md-12">
        <?php include('includes/flash.php'); ?>
      </div>
      
    </div>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
      <div class="box-body box-profile">
          
          <div class="box-body">
            <div class="col-md-6">
              <h5 id="success"></h5>
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                   jjjjjj
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <div class="comment-text">
                                <span class="username">
                              kkkkk
                                </span><!-- /.username -->
                          </div>
                          <!-- /.comment-text -->
                        </div>
                      </div>

                    <div class="panel-body">
                      <form action="" method="POST" id="frmbox" onsubmit="return formSubmit();">

                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label>Desription</label>
                                  <textarea class="form-control" maxlength="253" name="titre" required=""></textarea>
                              </div>
                            </div>
                          </div>

                           <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <button type="submit" class="btn btn-primary" name="enregistrer" ><i class="fa fa-plus"></i> Ajouter </button>
                              </div>
                            </div>
                        </div>
                      </form>
                     
                    </div>
                    
                  </div>
                  
                  <!-- /.box-body -->
                </div>

      </div>

      <div class="col-md-6">
        <div id="liste"></div>
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

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  function formSubmit(){
    $.ajax({
      type: 'POST',
      url: 'organisation/newsletter_tratitement.php',
      data: $('#frmbox').serialize(),
      success: function(response){
        $('#success').html(response);
      }
    });
    var form= document.getElementById('frmbox').reset();
    return false;
  }
</script>




<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
