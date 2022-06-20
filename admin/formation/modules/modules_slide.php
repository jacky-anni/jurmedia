 <ul class="todo-list">
 <?php foreach (Module::liste($_GET['id']) as $key => $module ): ?>

  <li>
    <!-- checkbox -->
    <!-- todo text -->
    <span class="text"><a href="?page=module&id=<?= $formation->id ?>&module=<?= $module->id ?>"><?= $module->titre ?></a></span></br>
    <!-- Emphasis label -->
    <small class="" style="margin-left: 25px;"> <?= $module->description ?></small>
    <!-- General tools such as edit or delete-->
  </li>
  <?php endforeach; ?></br>

  <center>
    <a href="?page=modules&id=<?= $formation->id ?>" class="btn btn-primary"> <i class="fa fa-eye"></i> Voir tous les modules</a>
  </center>

</ul>