
<footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
	  Anything you want
	</div>
	<!-- Default to the left -->
	Tous droits réservés &copy; 2020 Développé par :  <a href="">Jacky Anizaire</a>
</footer>


<?php if($_GET['page']!='Ajouter-une-photo' AND $_GET['page']!='photos-activités' AND $_GET['page']!='ajouter-une-photo-de-couverture' AND $_GET['page']!='ajouter-une-photo' AND $_GET['page']!='profile' ): ?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<?php endif ?>

<?php if($_GET['page']=='Créer-un-article' || $_GET['page']=='Modifier-article' ): ?>
<script src="dist/js/pages/dashboard.js"></script>
<?php endif ?>

<?php if($_GET['page']=='photos' || $_GET['page']=='Article' || $_GET['page']=='photo-activités'): ?>
<script src="bower_components/ligthbox/dist/js/lightbox-plus-jquery.min.js"></script>
<?php endif ?>
<!-- Bootstrap 3.3.7 -->

<!-- Slimscroll -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<script src="bower_components/parsley/parsley.min.js"></script>
<script src="bower_components/parsley/fr.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

