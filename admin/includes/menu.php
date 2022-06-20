  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= Fonctions::utilisateur()->prenom ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
     <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
       <!--  <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> -->
        <?php if ($_SESSION['droit'] == 'Administrateur') : ?>
            <li><a href="?page=utilisateurs"><i class="glyphicon glyphicon-user"></i> <span>Utilisateurs</span></a></li>

           <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-equalizer"></i>
              <span>OCID</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=information-de-base"><i class="fa fa-circle-o"></i> Informations de bases</a></li>
              <li><a href="?page=envoie-mail"><i class="fa fa-circle-o"></i> Envoyez des mails</a></li>
             <!--  <li><a href="?page=liste-des-abonnés"><i class="fa fa-circle-o"></i> Abonnés</a></li>
              <li><a href="?page=envoyez-info-lettre"><i class="fa fa-envelope"></i> Info lettres </a></li> -->
            </ul>
          </li>
        <?php endif; ?>

        <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-equalizer"></i>
              <span>Formations</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=ajouter-formation"><i class="fa fa-circle-o"></i> Ajouter une formation</a></li>
              <li><a href="?page=formations"><i class="fa fa-circle-o"></i> Liste des formations</a></li>
            </ul>
          </li>

        </ul>

       
    </section>
    <!-- /.sidebar -->
  </aside>