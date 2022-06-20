<div class="c-sidebar-menu-toggler">
	<h6 class="c-title"></h6>
	<a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
		<span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
	</a>
</div>

<ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
	<li class="c-dropdown c-open">
		<a href="javascript:;" class="c-toggler">Menu de navigation<span class="c-arrow"></span></a>
		<ul class="c-dropdown-menu">
			<li class="<?php if($url[0]=='tableau-de-bord'){echo 'c-active';} ?>">
				<a href="<?= $link_menu ?>/tableau-de-bord"><i class="fa fa-dashboard"></i>  Tableau de bord</a>
			</li>
			<li class="<?php if($url[0]=='mes-formations'){echo 'c-active';} ?>">
				<a href="<?= $link_menu ?>/mes-formations"> <i class="fa fa-graduation-cap"></i>Formation (<?= Query::count_prepare('formation_suivie',$_SESSION['id_user'],'id_participant'); ?>)</a>
			</li>

			<li class="<?php if($url[0]=='certificats'){echo 'c-active';} ?>">
				<a href=""> <i class="fa fa-certificate"></i> Certificat(0)</a>
			</li>
			<!-- <li class="<?php if($url[0]=='modifer-le-mot-de-passe'){echo 'c-active';} ?>">
				<a href=""> <i class="fa fa-lock"></i>  Modifer le mot de passe</a>
			</li> -->

			
		</ul>
	</li>
</ul><!-- END: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->