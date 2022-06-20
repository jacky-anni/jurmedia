<?php
// session_start();
// session_destroy();
// header("Location:../?page=login");
session_start();
unset($_SESSION['id']);
header("Location:../?page=login");