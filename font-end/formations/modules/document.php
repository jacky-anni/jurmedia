<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Document</title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">

<?php
	Fonctions::vue_element($_SESSION['id_user'],$url[2],'document');
	$redirect="$link_menu/admin/dist/document/$url[1]";
	echo "<script>window.location ='$redirect';</script>";
?>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>



