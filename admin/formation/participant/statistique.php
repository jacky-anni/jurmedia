<?php 
 include('includes/head.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        
</head>
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
          <div class="">
          <!-- /.box-header -->
          <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
           <div class="box-header">


            <?php 
             $formations=Query::affiche('formation',$_GET['formations'],'id');
              $count_totoal= Query::count_prepare('formation_suivie',$formations->id,'id_formation');
              if($count_totoal>=1){
             ?>
             
            
          </div>
          <div class="box-body">

            <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formations->id ?>" style="color: white;"><?= $formations->titre ?></a></span>

                  <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Statistiques sur les participants</span>
                </div>
            <!-- /.info-box-content -->
          </div>



             <div class="box-footer box-comments">
                <a href="?page=participants&formations=<?= $_GET['formations']; ?>"> <button  class="btn btn-primary " style="margin: 2px;"><span class="fa fa-user"></span> Participants</button></a>

                <button class="btn btn-primary  hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> <b>Imprimer</b> </button>
              </div>

               <div class="box-header with-border">
                <h3 class="box-title alert alert-info bg-navy-active color-palette" style="width: 100%; font-weight: bold;"> <i class="fa fa-user"></i> Répartition par niveau</h3>
              </div></br>

                <div class="col-md-12">

                   <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li style="font-size: 16px;"><i class="fa fa-square" style="color: #1d3764;"></i> Primaire (<?= Formation::formation_repartition('niveau','Primaire',$_GET['formations']); ?>) </li>

                        <li style="font-size: 16px;"><i class="fa fa-square" style="color: #1d3764;"></i> Secondaire (<?= Formation::formation_repartition('niveau','Secondaire',$_GET['formations']); ?>) </li> </li>
                        <li style="font-size: 16px;"><i class="fa fa-square" style="color: #1d3764;"></i>  Universitaire (<?= Formation::formation_repartition('niveau','Universitaire',$_GET['formations']); ?>) </li>
                      </ul>
                    </div>

                    <div class="col-md-6">
                      <div class="box-body">
                        <div id="bar-chart" style="height: 300px;"></div>
                      </div>
                    </div>
                    <!-- /.box-body-->
                  </div>
          <!-- /.box -->

         
          <!-- /.box -->


           <div class="box-header with-border">
                <h3 class="box-title alert alert-info bg-navy-active color-palette" style="width: 100%; font-weight: bold;"> <i class="fa fa-bar-chart"></i> Répartition par departement</h3>
              </div></br>


              <div class="row" style="margin: 20px; background-color: white:">
                <div class="col-md-3">
                    <ul class="chart-legend clearfix">
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Nord (<?= Formation::formation_repartition('departement','Nord',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Nord-Est (<?= Formation::formation_repartition('departement','Nord-Est',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Nord-Ouest  (<?= Formation::formation_repartition('departement','Nord-Ouest',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Ouest (<?= Formation::formation_repartition('departement','Ouest',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Sud (<?= Formation::formation_repartition('departement','Sud',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Sud-Est (<?= Formation::formation_repartition('departement','Sud-Est',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Artibonite (<?= Formation::formation_repartition('departement','Artibonite',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Nippes (<?= Formation::formation_repartition('departement','Nippes',$_GET['formations']); ?>)</li>
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Grand-Anse (<?= Formation::formation_repartition('departement','Grand-Anse',$_GET['formations']); ?>)</li>
                      
                      <li style="font-size: 16px;"><i class="fa fa-square" style="color: black;"></i> Centre  (<?= Formation::formation_repartition('departement','Centre',$_GET['formations']); ?>)</li>
                    </ul>
                  </div>

                  <div class="col-md-9">
                  <div class="box-body">
                    <div id="bar2" style="height: 300px;"></div>
                  </div>
                </div>
              </div>








        </div>
      </div>





             

                
    </div>




            
                
                <!-- /.col -->
              </div>

          </div>
          <!-- /.box-body -->
        <?php }else{
          echo "Pas de participant de pour cete formation";
        } ?>
        </div>

        </div>
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
   <div class="hidden-print">
    
   </div>
  <?php include('includes/tools.php'); ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="bower_components/Flot/jquery.flot.categories.js"></script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>


<script>
  $(function () {



    var bar_data = {
      data : [['Primaire', <?= number_format(Formation::formation_repartition('niveau','Primaire',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>], ['Secondaire', <?= number_format(Formation::formation_repartition('niveau','Secondaire',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>], ['Universitaire', <?= number_format(Formation::formation_repartition('niveau','Universitaire',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>]],
      color: '#1e3864'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })




    var bar2 = {
      data : [
      ['Nord', <?= number_format(Formation::formation_repartition('departement','Nord',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Nord-Est', <?= number_format(Formation::formation_repartition('departement','Nord-Est',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Nord-Ouest', <?= number_format(Formation::formation_repartition('departement','Nord-Ouest',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Ouest', <?= number_format(Formation::formation_repartition('departement','Ouest',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Sud', <?= number_format(Formation::formation_repartition('departement','Sud',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?> ] , 

      ['Sud-Est', <?= number_format(Formation::formation_repartition('departement','Sud-Est',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Artibonite', <?= number_format(Formation::formation_repartition('departement','Artibonite',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Nippes', <?= number_format(Formation::formation_repartition('departement','Nippes',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Grand-Anse', <?= number_format(Formation::formation_repartition('departement','Grand-Anse',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 

      ['Centre', <?= number_format(Formation::formation_repartition('departement','Centre',$_GET['formations'])*100/Query::count_prepare('formation_suivie',$_GET['formations'],'id_formation'),2) ?>] , 



      ],
      color: '#8c1b04'
    }
    $.plot('#bar2', [bar2], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })


    
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>


<script>
  $(function () {

  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>



 <script type="text/javascript">
    function myFunction() {
        window.print();
    }
  </script>
</body>
</html>
<!-- <style type="text/css">
  .list ul li {
    float: left;
    margin-right: 8px;
  }
</style> -->