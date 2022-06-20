
<nav class="c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-light-mobile" style="font-weight: 500; color: black;">
    <ul class="nav navbar-nav c-theme-nav"> 
      <li class=" c-menu-type-classic">
            <a href="<?= $link_menu ?>/" class="c-link">Accueil<span class="c-arrow c-toggler"></span></a>
        </li>
        <li class="c-menu-type-classic">
            <a href="<?= $link_menu ?>/formations" class="c-link">Formations<span class="c-arrow c-toggler"></span></a>
        </li>
      <li class=" c-menu-type-classic">
            <a href="<?= $link_menu ?>/contact" class="c-link">contact<span class="c-arrow c-toggler"></span></a>
        </li>
   
    <li class="c-cart-toggler-wrapper">
       <?php if (isset($_SESSION['id_user'])) : ?>
        <a  href="#" class="c-btn-icon c-cart-toggler">
          <span style="width: 40px; position: absolute; top: 3px;">
            <?php include('font-end/layout/user_image.php'); ?>
          </span>
     <!--     <span class="c-cart-number c-theme-bg">2</span> --></a>
       <?php endif; ?>
    </li>
   
 </ul>
</nav>


