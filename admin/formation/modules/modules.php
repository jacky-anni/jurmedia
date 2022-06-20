 <ul class="todo-list">
  <?php foreach (Module::liste($_GET['id']) as $key => $module ): ?>
  <li>
    <!-- drag handle -->
    <span class="handle">
          <i class="fa fa-ellipsis-v"></i>
          <i class="fa fa-ellipsis-v"></i>
        </span>
    <!-- checkbox -->
    <!-- todo text -->
    <span class="text"><?= $module->titre ?></span></br>
    <!-- Emphasis label -->
    <small class="" style="margin-left: 25px;"> <?= $module->description ?></small>
    <!-- General tools such as edit or delete-->
    <div class="tools">
      <a href="?page=module&id=<?= $formation->id ?>&module=<?= $module->id ?>">
        <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Voir plus....</button>
      </a>
      <a href="" data-toggle="modal" data-target="#<?= $module->id ?>">
        <button class="btn btn-default btn-sm"><i class="fa fa-edit"></i>  Modifier</button>
      </a>
      
      <a href="#<?= $module->id;?>1"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
      
    </div>
  </li>
   <?php include('destroy.php'); ?>
    <?php include('edit.php'); ?>
  <?php endforeach; ?>

</ul>