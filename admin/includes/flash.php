<?php
if (isset($_SESSION['notification']['message'])): ?>
	<div class="col-md-12" style="z-index: 1;">
	<div class="alert alert-<?= $_SESSION['notification']['type'] ?> ">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<h5><?= $_SESSION['notification']['message']; ?></h5>
	</div>
</div>
<?php $_SESSION['notification']=[]; ?>
<?php endif;
