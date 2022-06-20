<?php
require 'font-end/layout/config.php';
require 'admin/class/Fonctions.php';
session_start();
unset($_SESSION['id_user']);
Fonctions::set_flash('Vous êtes deconnecté (e)','success');
header("Location:$link_menu/connexion");