<?php include('includes/head.php'); ?>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
    <?php include('includes/flash.php'); ?>
   
    <?php
      // utilisateur en question
    $utilisateur=Query::affiche('utilisateur',$_GET['id'],'id');

    $cv=Query::affiche('cv',$_GET['id'],'id_user');
    if (!$utilisateur) {
      header("Location:?page=Page-introuvable");
    }
      
    ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" role="form" data-parsley-validate action="">
              <div class="box-body">

                <div class="col-md-6">
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

                   <div class="form-group">
                    <label>Droit ou role attribué</label>
                    <select name="droit" required="" class="form-control">
                      <option value="" style="color: silver;">Attribué un droit</option>
                      <option value="Utilisateur" <?php if($utilisateur->droit=='Utilisateur'){echo "selected";} ?>>Utilisateur</option>

                      <option value="Administrateur" <?php if($utilisateur->droit=='Administrateur'){echo "selected";} ?>>Administrateur</option>

                      <!-- <option value="Intervenant" <?php if($utilisateur->droit=='Intervenant'){echo "selected";} ?>>Intervenant</option> -->
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fonction</label>
                    <input type="text" name="fonction" class="form-control" value="<?= $utilisateur->fonction ?>" id="exampleInputPassword1" placeholder="Membre du comité de pilotage" required>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress"  class="form-control" name="password" id="password1" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Répeter le mot de passe</label>
                    <input type="password" data-parsley-equalto="#password1" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" >
                  </div>

                   <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" <?php if($cv->equipe==1){echo "checked";} ?> name="equipe" value="1">
                        <b>Il s'agit d'un membre de l'équipe</b>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
                  <button type="submit" name="modifier" class="btn btn-primary btn-lg"><b> <i class="fa fa-edit"></i> Modifier</b></button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>

        <?php
          if (isset($_POST['modifier'])) {
            //class utilisateur
            require 'class/Utilisateur.php';
             extract($_POST);
             if (empty($droit)) {
               $droit='Administrateur';
             }

             if (empty($equipe)) {
               $equipe=0;
             }

             $Utilisateur=new Utilisateur($nom,$prenom,$email,$droit,$fonction,$password,$equipe);
             $Utilisateur->modifier();
          }
        ?>

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include('includes/footer.php'); ?>
  <?php include('includes/tools.php'); ?>
</div>
</div>
<!-- ./wrapper -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>