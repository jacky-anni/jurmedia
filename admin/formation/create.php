<?php
  include('includes/head.php');
  require 'class/Formation.php';
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
       <?php 
          if (isset($_POST['enregistrer'])) {
            extract($_POST);
            if(empty($certificat))
            {
              $certificat='Non';
            }
            $formation= new Formation($titre,$description,$date_debut,$date_fin,$presentation,$type,$certificat);
            $formation->ajouter();

          }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body box-profile">
            <div class="row">
             <div class="col-md-12">
               <!-- quick email widget -->
                  <div class="box-body box-profile">
                    <form action="#" method="post" role="form" data-parsley-validate action="">
                      <div class="col-md-12">
                        <label>Le titre de la formation</label>
                        <div class="form-group">
                          <input type="text" class="form-control" value="<?php if(isset($_POST['titre']))echo $_POST['titre']; ?>" data-parsley-maxlength="250" name="titre" placeholder="Titre" required="">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label>Description de la formation</label>
                        <div class="form-group">
                          <textarea class="form-control"  name="description" placeholder="Descrire la formation dans une paragraphe" required=""><?php if(isset($_POST['description']))echo $_POST['description']; ?></textarea>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label>Date début</label>
                        <div class="form-group">
                          <input type="date" class="form-control" maxlength="230" value="<?php if(isset($_POST['date_debut']))echo $_POST['date_debut']; ?>" data-parsley-maxlength="230" name="date_debut" placeholder="Titre" required="">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label>Date de fin</label>
                        <div class="form-group">
                          <input type="date" class="form-control" maxlength="230" value="<?php if(isset($_POST['date_fin']))echo $_POST['date_fin']; ?>" data-parsley-maxlength="230" name="date_fin" placeholder="Titre" required="">
                        </div>
                      </div>
                     
                        <div class="col-md-12">
                          <label>Présentation de la formation</label>
                          <textarea id="editor1" name="presentation" style="height: 300px;" rows="15" cols="100" required=""><?php if(isset($_POST['presentation']))echo $_POST['presentation']; ?></textarea>
                        </div>

                       <div class="col-md-12"></br>
                         <div class="form-group">
                            <label>Type de formation</label>
                            <select name="type" required="" class="form-control">
                              <option value="" style="color: silver;">Ajouter un type</option>
                              <option value="1" <?php if(isset($_POST['type']) AND $_POST['type']==1){echo "selected";} ?>>public</option>
                              <option value="2" <?php if(isset($_POST['type']) AND $_POST['type']==2){echo "selected";} ?>>Public & validé par le staff</option>
                              <!-- <option value="Intervenant">Intervenant</option> -->
                            </select>
                          </div>

                        <div class="col-md-12">
                          <div class="checkbox">
                              <label>
                                <input type="checkbox" name="certificat" value="Oui"> <b>Certificat Inclus ?</b>
                              </label>
                            </div>
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
<script type="text/javascript">
  var editor = CKEDITOR.replace( 'editor1', {
    language: 'fr',
    toolbar: [
  { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
  { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
  { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
  { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
  { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
  { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
  { name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar' ] },
  { name: 'styles', items: [ 'Styles', 'Format' ] },
  { name: 'tools', items: [ 'Maximize' ] },
  { name: 'others', items: [ '-' ] },
]
});

  editor.on( 'required', function( evt ) {
    editor.showNotification( 'Ce champ est requis', 'warning' );
    evt.cancel();
} );
</script>
</body>
</html>