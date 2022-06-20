<?php
// require('font-end/layout/config.php');

require('../../admin/class/Participant.php');
require('../../admin/class/bdd/bdd.php');
extract($_POST);
Participant::authentifier($email,$password);

?>