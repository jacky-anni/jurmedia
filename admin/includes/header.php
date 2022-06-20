<?php ini_set('display_errors','1'); ?>
<header class="main-header">
  <!-- Logo -->
  <a href="?page=home" class="logo" style="background-color:#30c4d2;">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b> Admin</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation" style="background-color:#30c4d2;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?= Fonctions::utilisateur()->prenom ?>  <?= Fonctions::utilisateur()->nom ?><span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header" style="background-color:#30c4d2;">
              <img src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" class="img-circle" alt="User Image">
              <p>
                <?= Fonctions::utilisateur()->prenom?> <?= Fonctions::utilisateur()->nom ?>
               <!--  <small></small> -->
              </p>
            </li>
            <!-- Menu Body -->
<!--             <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="?page=profile&id=<?= $_SESSION['id'] ?>" class="btn btn-default btn-flat"> <i class="fa fa-user"></i> Profile</a>
              </div>

                <div class="pull-right">
                <a href="class/Deconnexion.php" class="btn btn-default btn-flat"> <i class="fa fa-sign-out"></i> Déconnexion</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
   
      </ul>
    </div>
  </nav>
</header>

<script type="text/javascript">
  
</script>