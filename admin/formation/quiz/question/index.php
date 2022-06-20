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
            <?php
                 $formation=Query::affiche('formation',$_GET['id'],'id');
                 $module=Query::affiche('module_formation',$_GET['module'],'id');
                 $quiz=Query::affiche('quiz',$_GET['quiz'],'id');
                 if (!$formation->id OR !$module->id OR !$quiz->id) {
                  // si l'formation n'existe pas
                  Fonctions::set_flash("Quelques chose ne marche pas",'danger');
                  echo "<script>window.location ='?page=formations';</script>";
                 }
              ?>
           <div class="box-footer box-comments">
            <h4> Titre de la formation :</h4>
              <div class="box-comment">
                <!-- User image -->
                    <div class="comment-text">
                          <span class="username" style="font-weight: bold; font-size: 18px;">
                            <?= $formation->titre ?>
                          </span><!-- /.username -->
                    </div>
                    <!-- /.comment-text -->
                  </div>
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12">
              <div class="box box-solid">
            <!-- /.box-header -->
                 <div class="box-body">
                      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                      <ul class="todo-list">
                        <li>
                          <!-- drag handle -->
                          <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                          </span>
                          <span class="text" style="font-size: 17px;"><?= $module->titre ?></span></br>
                          <!-- Emphasis label -->
                          <small class="" style="margin-left: 25px; font-weight: bold;"> <a href=""> <i class="fa fa-plus"></i> Ajouter une question</a></small>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active">
                          <div class="box-body">
                            <?php foreach(Query::liste_prepare_asc('questions_quiz',$_GET['quiz'],'id_quiz') as $question): ?>
                              <p>
                                <h5 style="font-weight: bold;"><?= $question->titre; ?></h5>
                                <ul class="todo-list">
                                  <li style="<?php if($question->rep1 == $question->bonne_reponse){echo " background-color: yellow; font-weight: bold;";} ?>" ><?= $question->rep1 ?></li>
                                  <li style="<?php if($question->rep2 == $question->bonne_reponse){echo " background-color: yellow; font-weight: bold;";} ?>"><?= $question->rep2 ?></li>
                                  <li style="<?php if($question->rep3 == $question->bonne_reponse){echo " background-color: yellow; font-weight: bold;";} ?>" ><?= $question->rep3 ?></li>
                                  <li style="<?php if($question->rep4 == $question->bonne_reponse){echo " background-color: yellow; font-weight: bold;";} ?>" ><?= $question->rep4 ?></li>
                                </ul>
                              </p>
                              <a href="?page=modifier-cette-question&id=<?= $formation->id ?>&module=<?= $module->id ?>&quiz=<?= $quiz->id ?>&question=<?= $question->id ?>"><button class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Modifier </button></a>

                              <a href="#<?= $question->id;?>"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a><hr/>
                              <?php include('destroy.php'); ?>
                            <?php endforeach ?>
                          </div>
                        </div>

                       </div>
                    </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>

       <!--  <div class="col-md-4">
            <?php include('modules_slide.php'); ?>
          </div>
          </div> -->
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
