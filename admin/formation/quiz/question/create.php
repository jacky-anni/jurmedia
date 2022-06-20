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
                <?php
                  if(isset($_POST['enregistrer'])){
                    extract($_POST);
                    Quiz::ajouter_question($_GET['quiz'],$_GET['module'],$titre,$rep1,$rep2,$rep3,$rep4,$bonne_reponse);
                  }
                ?>
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
                          <small class="" style="margin-left: 25px; font-weight: bold;"> <a href="?page=questions&id=<?= $formation->id ?>&module=<?= $module->id ?>&quiz=<?= $quiz->id ?>"> <i class="fa fa-eye"></i> Voir la liste des questions du quiz</a></small>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active">
                          <div class="box-body">
                            <form action="#" method="post" role="form" data-parsley-validate action="">
                              <div class="col-md-12">
                                <label>Le titre de la question</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['titre']))echo $_POST['titre']; ?>" data-parsley-maxlength="250" name="titre" placeholder="Le titre de la question" required="">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label>Réponse 1</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['rep1']))echo $_POST['rep1']; ?>" data-parsley-maxlength="250" name="rep1" placeholder="a) possiblité 1">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label>Réponse 2</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['rep2']))echo $_POST['rep2']; ?>" data-parsley-maxlength="250" name="rep2" placeholder="b) possiblité 2">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label>Réponse 3</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['rep3']))echo $_POST['rep3']; ?>" data-parsley-maxlength="250" name="rep3" placeholder="c) possiblité 3">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label>Réponse 4</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['rep4']))echo $_POST['rep4']; ?>" data-parsley-maxlength="250" name="rep4" placeholder="d) possiblité 4">
                                </div>
                              </div>

                              <div class="col-md-12">
                                <label>Bonne réponse</label>
                                <div class="form-group">
                                  <input type="text" class="form-control" value="<?php if(isset($_POST['bonne_reponse']))echo $_POST['bonne_reponse']; ?>" data-parsley-maxlength="250" name="bonne_reponse" placeholder="Indiquez la bonne réponse">
                                </div>
                              </div>
                             

                              <div class="box-footer clearfix">
                                <button type="submit" name="enregistrer" class="pull-right btn btn-lg btn-primary"> Enregistrer
                                  <i class="fa fa-arrow-circle-right"></i></button>
                              </div>
                            </form>
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
