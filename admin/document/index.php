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
          <!-- /.box-header -->
           <div class="box-footer box-comments">
                  <a  href="" data-toggle="modal" data-target="#document"> <button  class="btn btn-primary " style="margin: 2px; float: right;"><span class="fa fa-user"></span> Ajouter un document</button></a>
              </div>

              <?php include('document/create.php'); ?>

          <div class="box-body">
            <table id="example" class="table table-strip" style="width:100%">
              <thead>
              <tr>
                <th style="width: 80%;"></th>
                 <th></th>
              </tr>
              </thead>
              <tbody>
                <?php foreach (Query::liste('document') as $key => $document) : ?>
                 <tr>
                     <td>
                       <ul class="products-list product-list-in-box">
                          <li class="item">
                            <div class="product-img">
                              <img src="dist/img/icon/icons8_PDF_50px.png" alt="Product Image">
                            </div>
                            <div class="product-info" style="margin-top: 15px;">
                              <a href="dist/document/<?= $document->document ?>" target="_blank" class="product-title" ><?= $document->nom ?></a>
                            </div>
                           </li>
                          
                       </ul>
                     </td>
                     <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $document->id ?>11"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#<?= $document->id ?>12"><b> <i class="fa fa-edit"></i>  Supprimer</b></button>
                     </td>
                   </tr>

                    <?php include('document/edit.php'); ?>
                    <?php include('document/destroy.php'); ?>
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

<script type="text/javascript">
  $(document).ready( function() {
    $('#example').dataTable( {
      "oLanguage": {
        "oPaginate": {
          "sNext": "Suivant",
          "sPrevious": "Précedent"
        },
      },
      "bFilter": true,
      "aLengthMenu": [[50, 100, 200,300,400, -1], [50, 100, 200,300,400,"Tous"]],

    } );
  } );
</script>

</body>
</html>
