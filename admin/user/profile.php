<?php include('includes/head.php');?>
<?php require 'class/Utilisateur.php'; ?>
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

     <?php
      // utilisateur en question
        $utilisateur=Query::affiche('utilisateur',$_GET['id'],'id');
        if (!$utilisateur) {

          echo "Ou pa la";
          header("Location:?page=Page-introuvable");
        }

        $cv=Query::affiche('cv',$_GET['id'],'id_user');
      
    ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
      <div class="box-body box-profile">
          <div class="box-body">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="">
                <div class="">
                  <img class="profile-user-img img-responsive img-circle" src="dist/img/user/<?= $utilisateur->photo ?>" alt="User profile picture">
                    
                  <h3 class="profile-username text-center" style="font-weight: bold;"><?= $utilisateur->prenom ?>  <?= $utilisateur->nom ?></h3>
                  <p class="text-muted text-center"><?php if($cv){echo $cv->titre;}else{echo $utilisateur->droit;} ?></p>


                  <ul class="list-group list-group-unbordered">
                  
                  </ul>

                  <center class="list-group-item alert alert-success">
                    <label>Ajouter une photo</label>
                      <input type="file" name="upload_image" accept="image/*" id="upload_image" class=" btn-block" />
                      <div id="uploaded_image"></div>
                  </center>
                   
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <?php if($cv->equipe==1 OR $cv->intervenant==1): ?>
                <li class="active"><a href="#activity" data-toggle="tab">Mon identité</a></li>
              <?php endif ?>

              <li class="<?php if($cv->equipe==0 AND $cv->intervenant==0){echo "active";} ?>"><a href="#timeline" data-toggle="tab">Infos de connexion</a></li>
            </ul>
            <div class="tab-content">
              <?php if ($cv->equipe==1 OR $cv->intervenant==1): ?>
                <div class="active tab-pane" id="activity">
                  <div class="row">
                    <form action="" method="POST">

                      <div class="col-md-6">
                      <div class="form-group">
                        <label>Titre</label>
                        <input type="text" value="<?= $cv->titre ?>" class="form-control" name="titre" id="exampleInputEmail1" placeholder="Ing. Informatiques" >
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Téléphones</label>
                        <input type="text" value="<?= $cv->telephones ?>" class="form-control" name="tels" id="exampleInputEmail1" placeholder="+5094872-9922" >
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="<?= $cv->email ?>" placeholder="anizairejacky@gmail.com" class="form-control" name="email" id="exampleInputEmail1">
                      </div>
                    </div>

                   

                    <div class="col-md-12">
                      <label>Biographie</label>
                        <textarea id="editor1" name="bio" style="height: 300px;" rows="15" cols="100" required=""><?php if(isset($cv->biographie))echo $cv->biographie; ?></textarea>
                    </div>

                    <div class="col-md-12">
                      <div class="box-footer">
                        <center>
                          <button type="submit" name="modifier_bio" style="float: right;" class="btn btn-primary btn-lg"><b> <i class="fa fa-save"></i> Enregistrer</b></button>
                        </center>
                      </div>
                    </div>
                    </form>
                    
                  </div>
                </div>
              <?php endif ?>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php if($cv->equipe==0 AND $cv->intervenant==0){echo "active";} ?>" id="timeline">
                <form  method="POST" role="form" data-parsley-validate action="">
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" value="<?= $utilisateur->nom ?>" class="form-control" name="nom" id="exampleInputEmail1" placeholder="Anizaire" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" value="<?= $utilisateur->prenom ?>" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Jacky" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" value="<?= $utilisateur->email ?>" name="email" class="form-control" id="exampleInputPassword1" placeholder="anizairejacky@gmail.com" required="">
                  </div>
                </div>
                  <div class="col-md-12">
                     <div class="form-group">
                      <label for="exampleInputPassword1">Mot de passe</label>
                      <input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress"  class="form-control" name="password" id="password1" >
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Répeter le mot de passe</label>
                      <input type="password" data-parsley-equalto="#password1" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" >
                    </div>
                  </div>
                </div>

                <div class="box-footer">
                  <center>
                    <button type="submit" name="modifier" style="float: right;" class="btn btn-primary btn-lg"><b> <i class="fa fa-edit"></i> Modifier</b></button>
                  </center>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
            <?php
              
              if (isset($_POST['modifier'])) {
                //class utilisateur
                extract($_POST);
                  if (empty($droit)) {
                   $droit='';
                 }
                
                 Utilisateur::modifier_profile($nom,$prenom,$email,$droit,$password);
              }elseif (isset($_POST['modifier_bio'])) {
                extract($_POST);
                Utilisateur::modifier_identite($titre,$tels,$email,$bio);
                 
              }
            ?>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

        </div>
               


             <div class="info-box">
                <div id="uploadimageModal" class="modal" role="dialog"  style="width: auto;">
                  <div>
                    <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="font-weight: bold;">Rogner votre photo</h4>
                          </div>
                          <div class="modal-body">
                            <center>
                              <div class="row" style="height: 50%;">
                                <div class="col-md-8 text-center">
                                  <div id="image_demo" style="width: 100%;"></div>
                                </div>
                                <div class="col-md-4" >
                              </div>
                            </div>
                            </center>
                          </div></br></br></br></br>
                          <div class="modal-footer">
                            <button class="btn btn-success crop_image"> <i class="fa fa-crop"></i>  Enregistrer </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

        </div>
      </div>

      <?php 
        $_SESSION['upload']=rand(10000000,100000000000000);

        $_SESSION['user']=$_GET['id'];
       ?>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include('includes/footer.php'); ?>
  <?php include('includes/tools.php'); ?>
  <?php include('includes/partials/_ckEditor.php'); ?>

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

<script>  
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:310,
      height:310,
      type:'square' //circle
    },
    boundary:{
      width:310,
      height:310,
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"user/upload/profile.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          setTimeout(function() {
            window.location.href="?page=profile&id=<?= $_GET['id'] ?>";
          }, 100)
          $('#uploadimageModal').modal('hide');
          // window.location.href="?page=profile&id=<?= $_GET['id'] ?>";
          // $('#uploaded_image').html(data);

         
        }
      });
    })
  });

});  
</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
