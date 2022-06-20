<?php
  if (isset($_GET['page'])) {
  $page=$_GET['page'];
  }else
  {
    $page='login';
  }

  switch ($page) 
{
  case $page==='login':
    require 'login/index.php';
  break;
  // acceuil
  case $page==='home':
    require 'home/index.php';
  break;

//================================================
    // utilisateurs
  case $page==='utilisateurs':
     require 'user/index.php';
  break;

  // ajouter utilisateur
  case $page==='Ajouter-utilisateur':
     require 'user/create.php';
  break;

     // modifier utilisateur
  case $page==='Modifer-utilisateur':
     require 'user/edit.php';
  break;
  //==================================================


    // ajouter utilisateur
  case $page==='ajouter-formation':
     require 'formation/create.php';
  break;

  case $page==='formations':
     require 'formation/index.php';
  break;

    case $page==='modification-de-formation':
     require 'formation/edit.php';
  break;

  case $page==='formation':
     require 'formation/show.php';
  break;


  case $page==='profile':
      require 'user/profile.php';
  break;

  //==========================================================================

  // liste des modules 
   case $page==='modules':
       require 'formation/modules/index.php';
    break;

    // afficher un module 
     case $page==='module':
       require 'formation/modules/show.php';
    break;

  //============================================================================



case $page==='information-de-base':
     require 'organisation/informations.php';
break;


  //============================================================================

// participant 
case $page==='participants':
     require 'formation/participant/participation_inscrits.php';
break;

// participant 
case $page==='participants_':
     require 'formation/participant/participants.php';
break;

case $page==='les-participants':
     require 'formation/certifie-atteste/index.php';
break;




  //============================================================================
// liste des intervenants
  case $page==='intervenants':
     require 'formation/intervenant/index.php';
  break;

  //============================================================================

    case $page==='documents':
      require 'document/index.php';
    break;

  //============================================================================
// liste des Quiz
case $page==='quiz':
     require 'formation/quiz/question/create.php';
break;


// liste des question d'un quiz 
case $page==='questions':
     require 'formation/quiz/question/index.php';
break;

// modifier une question
case $page==='modifier-cette-question':
     require 'formation/quiz/question/edit.php';
break;



// Liste de tous les certificats
case $page==='participants-certifiés.':
     require 'formation/dossier/participant-certifiies.php';
break;


// liste des certificat par depatman imprimer
case $page==='certificat-all':
     require 'formation/dossier/certificat-all.php';
break;


// un certificat imprimer
case $page==='certificat':
     require 'formation/dossier/certificat.php';
break;




// listes des partiticipants qui obtienne leurs ertificats
case $page==='participants-certifiés':
     require 'formation/certifie-atteste/certificate-all.php';
break;

// listes des partiticipants qui obtienne leurs attestation
case $page==='participants-attestés':
     require 'formation/certifie-atteste/attestation-all.php';
break;

// liste des participants qui obtiennent leurs attestations 
case $page==='attestations':
     require 'formation/certifie-atteste/attestation-all_depatement.php';
break;
  //============================================================================

  // erreur 404
  default:
    require 'error/404.php';
  break;
}


?>