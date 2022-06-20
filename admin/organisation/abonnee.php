
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
          </div>
          <!-- /.box-header -->
            
          <div class="box-body">

            <div class="box-footer box-comments">
                   <button id="exportButton" class="btn btn-danger clearfix" style="margin: 2px;"><span class="fa fa-file-excel-o"></span> Exporter sur excel</button>

                   <button id="exportButton" style="float: right;" class="btn btn-primary clearfix"  data-toggle="modal" data-target="#modal-default" style="margin: 2px;"><span class="fa fa-plus"></span> Ajouter un (e) abonné(e)</button>
                   <?php include('create_abonne.php'); ?>
              </div>

            <table id="example" class="table table-striped table-bordered exportTable" style="width:100%">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th style="width: 10%;"></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach (Query::liste('abonnee') as $abonne): ?>
              <tr>
                <td><?= $abonne->nom ?></td>
                <td><?= $abonne->prenom ?></td>
                <td><?= $abonne->email ?></td>
                <td style="width: 10%;"><button class="btn btn-danger" data-toggle="modal" data-target="#<?= $abonne->id ?>"><i class="fa fa-trash"></i>  Supprimer</button></td>
              </tr>
              <?php include('destroy_abonne.php'); ?>
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

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: ".exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Nom: { type: String },
                        Prénom: { type: Number },
                        Email: { type: String },
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Nom"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Prénom"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Email"
                                        },
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: String, value: item.Nom },
                                        { type: String, value: item.Prénom },
                                        { type: String, value: item.Email },
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "liste des abonnées"
                });
            });
        });
    });
</script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>
</body>
</html>
