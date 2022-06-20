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
                 if (!$formation->id OR !$module->id) {
                  // si l'formation n'existe pas
                  Fonctions::set_flash("La formation ou le module n'existe pas ",'danger');
                  echo "<script>window.location ='?page=formation';</script>";
                 }

                 if(isset($_GET['statut'])){
                    Quiz::statut($_GET['statut'],$module->id);
                 }
              ?>
              <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formation->id ?>" style="color: white;"><?= $formation->titre ?></a></span>

                    <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Contenues:  <?= $module->titre ?></span>
                  </div>
              <!-- /.info-box-content -->
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-8">
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
                          <!-- checkbox -->
                          <!-- todo text -->
                          <span class="text" style="font-size: 17px;"><?= $module->titre ?></span></br>
                          <!-- Emphasis label -->
                          <small class="" style="margin-left: 25px;"> <?= $module->description ?></small>
                          <div class="input-group margin">
                             <?php include('video/create.php'); ?>
                            <?php include('document/create.php'); ?>
                            <?php include('intervenant/create.php'); ?>
                            <?php include('formation/quiz/create.php'); ?>
                            
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">   <i class="fa fa-plus"></i> <b>Ajouter un element</b>
                                <span class="fa fa-caret-down"></span></button>
                              <ul class="dropdown-menu">

                                 <li><a href="" data-toggle="modal" data-target="#intervenant"> <i class="fa fa-user"></i> Intervenant (<?= Query::count_prepare('enseignant',$module->id,'id_module') ?>)</a></li>

                                <li><a href="" data-toggle="modal" data-target="#document"> <i class="fa fa-file"></i> Documents (<?= Query::count_prepare('document',$module->id,'reference') ?>)</a></li>

                                <li><a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-film"></i>  Vidéos  (<?= Query::count_prepare('video',$module->id,'reference') ?>)</a></li>

                                  <li><a href="#" data-toggle="modal" data-target="#quiz"><i class="fa fa-comment"></i>  Quiz</a></li>

                               <!--  <li><a href="?page=quiz&id=<?= $formation->id ?>&module=<?= $module->id ?>"><i class="fa fa-comment"></i>  Quiz</a></li> -->
                              </ul>
                            </div>
                          </div>
                          <hr>
                            <div class="nav-tabs-custom">
                              <ul class="nav nav-tabs">

                                <li class="active"><a href="#tab_0" data-toggle="tab"> <i class="fa fa-user"></i> Intervenants  (<?= Query::count_prepare('enseignant',$module->id,'id_module') ?>)</a></li>
                                <li><a href="#tab_1" data-toggle="tab"> <i class="fa fa-file"></i> Documents  (<?= Query::count_prepare('document',$module->id,'reference') ?>)</a></li>
                                <li><a href="#tab_2" data-toggle="tab"> <i class="fa fa-film"></i>  Vidéos  (<?= Query::count_prepare('video',$module->id,'reference') ?>)</a></li>
                                <li><a href="#tab_4" data-toggle="tab"> <i class="fa fa-comment"></i>  Quiz  (<?= Query::count_prepare('quiz',$module->id,'id_module') ?>)</a></li>
                             

                              </ul>
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_0">
                                  <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                       <?php foreach(Query::liste_prepare ('enseignant',$module->id,'id_module') as $enseignant): ?>
                                        <?php $intervenant1=Query::affiche('utilisateur',$enseignant->id_user,'id'); ?>
                                        <?php $cv=Query::affiche('cv',$enseignant->id_user,'id_user'); ?>

                                          <li class="item">
                                            <div class="product-img">
                                              <img src="dist/img/user/<?= $intervenant1->photo ?>" class="img-responsive img-thumbnail" alt="Product Image">
                                            </div>
                                            <div class="product-info">
                                              <a href="" class="product-title"><?= $intervenant1->prenom ?>  <?= $intervenant1->nom ?> </a>

                                               <span class="product-description" style="padding: 5px;">
                                                <?php if(!empty($cv->titre)){echo $cv->titre;}else{echo "Pas de titre";} ?>
                                                </span>

                                                   <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?= $enseignant->id ?>1255"><b> <i class="fa fa-edit"></i>  Supprimer</b></button>
                                            </div>
                                           
                                           </li>
                                           <?php include('intervenant/destroy.php'); ?>
                                        <?php endforeach; ?>

                                      <!-- /.item -->
                                    </ul>
                                  </div>
                                </div>


                                <div class="tab-pane" id="tab_1">
                                  <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                       <?php foreach(Query::liste_prepare ('document',$_GET['module'],'reference') as $document): ?>

                                          <li class="item">
                                            <div class="product-img">
                                              <img src="dist/img/icon/icons8_PDF_50px.png" alt="Product Image">
                                            </div>
                                            <div class="product-info">
                                              <a href="dist/document/<?= $document->document ?>" class="product-title"><?= $document->nom ?> <?= $document->id ?></a>
                                              <span class="product-description" style="padding: 5px;">
                                                <?php
                                                  $count_doc=  Query::vue($document->id,'document');
                                                   if($count_doc>1)
                                                   {
                                                    echo "$count_doc visionnements";
                                                   }else{
                                                    echo "$count_doc visionnement";
                                                   }
                                                 ?>
                                                </span>

                                                   <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#<?= $document->id ?>11"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                                                   <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?= $document->id ?>12"><b> <i class="fa fa-edit"></i>  Supprimer</b></button>
                                            </div>
                                           
                                           </li>
                                           <?php include('document/edit.php'); ?>
                                           <?php include('document/destroy.php'); ?>
                                        <?php endforeach; ?>

                                      <!-- /.item -->
                                    </ul>
                                  </div>
                                </div>

                                <div class="tab-pane" id="tab_2">

                                  <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                       <?php foreach(Query::liste_prepare ('video',$_GET['module'],'reference') as $video): ?>

                                          <li class="item">
                                            <div class="product-img">
                                              <img src="dist/img/icon/icons8_Cinema__52px.png" class="img-responsive img-thumbnail" alt="Product Image" width="48px;">
                                            </div>
                                            <div class="product-info">
                                              <a href="#" class="product-title"><?= $video->nom ?></a>
                                              <span class="product-description" style="padding: 5px;">
                                                <?php
                                                  $count_video= Query::vue($video->id,'video');
                                                   if($count_video>1)
                                                   {
                                                    echo "$count_video visionnements";
                                                   }else{
                                                    echo "$count_video visionnement";
                                                   }
                                                 ?>
                                                </span>
                                                
                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#<?= $video->id ?>2538"><b> <i class="fa fa-eye"></i>  Voir</b></button>

                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $video->id;?>"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                                                <a href="#<?= $video->id;?>1"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>

                                            </div>
                                           
                                           </li>
                                            <?php include('video/destroy.php'); ?>
                                            <?php include('video/edit.php'); ?>
                                            <?php include('video/show.php'); ?>
                                        <?php endforeach; ?>

                                      <!-- /.item -->
                                    </ul>
                                  </div>
                                </div>

                                 <div class="tab-pane" id="tab_4">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <ul class="products-list product-list-in-box">
                                         <?php foreach(Query::liste_prepare ('quiz',$_GET['module'],'id_module') as $quiz): ?>

                                            <li class="item">
                                              <div class="product-img">
                                                <img src="dist/img/icon/icons8_Query_48px.png" alt="Product Image">
                                              </div>
                                              <div class="product-info">
                                                <a href="" class="product-title"><?= $quiz->nom ?></a>
                                                <span class="product-description" style="padding: 5px;">
                                                  <?php
                                                    $count_quiz=   Query::vue($quiz->id,'quiz');
                                                     if($count_quiz>1)
                                                     {
                                                      echo "$count_quiz visionnements";
                                                     }else{
                                                      echo "$count_quiz visionnement";
                                                     }
                                                   ?>
                                                  </span>

                                                    <a href="?page=quiz&id=<?= $formation->id ?>&module=<?= $module->id ?>&quiz=<?= $quiz->id ?>"  class="btn btn-primary btn-xs"><b> <i class="fa fa-edit"></i>  Ajouter des questions</b></a>

                                                    <?php if ($quiz->etat==1): ?>
                                                    <a href="<?php echo $_SERVER['REQUEST_URI']."&statut=0"; ?>" class="btn btn-warning btn-round btn-sm btn-xs"> <i class="fa fa-circle"></i>  Mettre privé</a>
                                                    <?php endif ?>

                                                     <?php if ($quiz->etat==0): ?>
                                                    <a href="<?php echo $_SERVER['REQUEST_URI']."&statut=1"; ?>" class="btn btn-info btn-round btn-sm btn-xs"> <i class="fa fa-circle-o"></i> Mettre public</a>
                                                    <?php endif ?>

                                                     <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#<?= $quiz->id ?>98"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                                                     <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?= $quiz->id ?>200"><b> <i class="fa fa-edit"></i>  Supprimer</b></button>
                                              </div>
                                             
                                             </li>
                                             <?php include('formation/quiz/edit.php'); ?>
                                             <?php include('formation/quiz/destroy.php'); ?>
                                          <?php endforeach; ?>

                                        <!-- /.item -->
                                      </ul>
                                    </div>
                                 </div>
                                </div>

                                <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                            </div>


                        </li>
                      </ul>
                    </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>

        <div class="col-md-4">
            <?php include('modules_slide.php'); ?>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
