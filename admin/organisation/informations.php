<?php
  include('includes/head.php');
  require 'class/Information.php';
?>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
     <?php include('includes/flash.php'); ?>
    <!-- create user -->

    <!-- Main content -->
     
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php
               $org=Query::affiche('organisation',1,'id');
               if($org){ ?>

            <div class="row">
             <div class="col-md-12">
              <center><img class="profile-user-img img-responsive" style="padding: 8px; width: 200px;" src="dist/img/logo/<?= $org->logo?>" alt="User profile picture"></center>
                  <div class="box-body">
                    <form action="#" method="post" role="form" data-parsley-validate action="">
                      
                      <div class="row">
                         <div class="col-md-12">
                          <label>Le nom de l'organisation</label>
                           <div class="form-group">
                            <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200"  name="nom" placeholder="Réseau Civisme et Droits de la Personne" value="<?= $org->nom ?>" required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                          <label>Sigle</label>
                           <div class="form-group">
                            <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" name="sigle" value="<?= $org->sigle ?>"  placeholder="RECIDP" required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                          <label>Email</label>
                           <div class="form-group">
                            <input type="email" class="form-control" maxlength="200" data-parsley-maxlength="200" name="email" value="<?= $org->email ?>"  placeholder="recidp@gmail.com" required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                          <label>Adresse</label>
                           <div class="form-group">
                            <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" name="adresse" placeholder="#15, Ruelle Patience, Fondation, Cpa-Haitien, Haiti" value="<?= $org->adresse ?>"  required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                          <label>Télephones</label>
                           <div class="form-group">
                            <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" name="telephone" placeholder="+5094872-9922/ 3330-1524" value="<?= $org->telephone ?>"  required="">
                          </div>
                        </div>

                         <div class="col-md-12">
                          <label>Présentation de l'organisation</label>
                           <div class="form-group">
                            <textarea id="editor1" name="presentation" style="height: 300px;" rows="15" cols="100" required=""><?= $org->presentation ?></textarea>
                          </div>
                        </div>

                          <div class="col-md-6">
                            <label>Site web</label>
                             <div class="form-group">
                               <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" value="<?= $org->site_web ?>" name="site_web" placeholder="+5094872-9922/ 3330-1524" >
                            </div>
                          </div>


                          <div class="col-md-6">
                            <label>Lien page Facebook</label>
                             <div class="form-group">
                               <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" name="facebook" value="<?= $org->lien_facebook ?>" placeholder="https://facebook.com/recidp" >
                            </div>
                          </div>

                           <div class="col-md-6">
                            <label>Twitter</label>
                             <div class="form-group">
                               <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" value="<?= $org->lien_twitter ?>" name="twitter" placeholder="https://twitter.com/recidp" >
                            </div>
                          </div>

                            <div class="col-md-6">
                              <label>Instagram</label>
                               <div class="form-group">
                                 <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" value="<?= $org->lien_instagram ?>" name="instagram" placeholder="https://instagram.com/recidp" >
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label>Lenkedin</label>
                               <div class="form-group">
                                 <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" value="<?= $org->lien_lendIn ?>" name="lendInd" placeholder="https://lendInd.com/recidp" >
                              </div>
                            </div>

                           <div class="col-md-6">
                            <label>Lien de votre chaine youtube</label>
                             <div class="form-group">
                               <input type="text" class="form-control" maxlength="200" data-parsley-maxlength="200" name="youtube" value="<?= $org->lien_youtube ?>" placeholder="https://yutube/recidp" >
                            </div>
                          </div>
                      </div>

                      <div>
     


                      <div class="box-footer clearfix">
                        <button type="submit" name="enregistrer" class="pull-right btn btn-lg btn-primary"> Modifier
                          <i class="fa fa-arrow-circle-right"></i></button>
                      </div>
                    </form>

                    <?php
                      if (isset($_POST['enregistrer'])) {
                          extract($_POST);
                          $information=new Information($nom,$sigle,$email,$adresse,$telephone,$presentation,$site_web,$facebook,$twitter,$instagram,$lendInd,$youtube);
                          $information->modifier();
                      }
                    ?>

                  </div>
             </div>


            </div>
          <?php }else{
            echo "<b> Cette section est vide ! <b>";
          } ?>

        
          </div>
          <!-- /.box-body -->
        </div>
        </div>
      </div>

    </section>
  </div>
    <!-- /.content -->
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

<?php include ('includes/partials/_ckEditor.php'); ?>
</body>
</html>