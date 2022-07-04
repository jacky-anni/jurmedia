<?php

$url = '';
if (isset($_GET['url'])) {
	$url = explode('/', $_GET['url']);
}

switch ($url) {
	/*==================================================*/
	case '':
		require 'font-end/accueil/index.php';
		break;

	// connecter ;'utilisateur'
	case $url[0] == 'connexion':
		require 'font-end/connexion/connexionWithoutModal.php';
		break;

	// deonnecter l'utilisateur
	case $url[0] == 'deconnexion':
		require 'font-end/deconnexion/index.php';
		break;


		// validez compte
	case $url[0] == 'validez-compte':
		require 'font-end/formations/participants/validez-compte.php';
		break;

			// validez compte
	case $url[0] == 'validation-de-compte':
	require 'font-end/formations/participants/validation_compte_email.php';
	break;

	case $url[0] == 'ajouter-participant':
		require 'font-end/formations/participants/ajouter-participant.php';
		break;

	case $url[0] == 'telechargemet':
		require 'font-end/app/android.php';
		break;

		
	// reset password
	case $url[0] == 'reset-password':
		require 'font-end/formations/participants/restaurer-password.php';
		break;


		// activation de compte
	case $url[0] == 'activation':
		require 'font-end/formations/participants/mail_activation.php';
		break;
		// profile
	case $url[0] == 'profile':
		require 'font-end/formations/participants/profile.php';
		break;
		// tableau de bord
	case $url[0] == 'tableau-de-bord':
		require 'font-end/formations/participants/tableau-de-bord.php';
		break;

		// tableau de bord
	case $url[0] == 'mes-formations':
		require 'font-end/formations/participants/mes-formations.php';
		break;
	/*==================================================*/

	// A propos
	case $url[0] == 'a-propos':
		require 'font-end/a-propos/a-propos.php';
		break;
	/*==================================================*/


	case $url[0] == 'profile-comite':
		require 'font-end/a-propos/profile.php';
		break;

	// suivre le cours
	case $url[0] == 'cours':
		require 'font-end/formations/modules/index.php';
		break;

	// suivre le cours
	case $url[0] == 'cours-suivi':
		require 'font-end/formations/modules/show.php';
		break;

	// suivre le cours
	case $url[0] == 'document':
		require 'font-end/formations/modules/document.php';
		break;

	/*==================================================*/
	// conctact
	case $url[0] == 'contact':
		require 'font-end/contact/index.php';
		break;

	/*==================================================*/

	/*==================================================*/
		// liste des formations
	case $url[0] == 'formations':
		require 'font-end/formations/index.php';
		break;

		// afficher une formation
	case $url[0] == 'formation':
		require 'font-end/formations/show.php';
		break;
	/*==================================================*/

	// releve de note
	case $url[0] == 'releve-note':
		require 'font-end/formations/participants/releve_note.php';
		break;

	// A propos
	case $url[0] == 'dossiers':
		require 'font-end/formations/participants/dossiers.php';
		break;

	// certificat
	case $url[0] == 'certificat':
		require 'font-end/formations/participants/certificat.php';
		break;

		// attestation
	case $url[0] == 'attestation':
		require 'font-end/formations/participants/attestation.php';
		break;

		// releve de notes
	case $url[0] == 'releve-de-note':
		require 'font-end/formations/participants/releve.php';
		break;

		// note
	case $url[0] == 'note':
		require 'font-end/formations/participants/note.php';
		break;

	// quiz
	case $url[0] == 'quiz':
		require 'font-end/formations/modules/quiz.php';
		break;

	// questionnaire introductif
	case $url[0] == 'questionnaire-introductif':
		require 'font-end/formations/modules/sondage.php';
		break;

	// reultat quiz
	case $url[0] == 'resultat-quiz':
		require 'font-end/formations/modules/resulat-quiz.php';
		break;



	case $url[0] == 'profil-intervenant':
		require 'font-end/formations/modules/intervenant/show.php';
		break;


	// fin de l'inscription
	case $url[0] == 'upload':
		require 'font-end/formations/participants/impression.php';
		break;

	// fin de l'inscription
	case $url[0] == 'upload_':
		require 'font-end/formations/participants/upload.php';
		break;

	case $url[0] == 'formation-1':
		require 'font-end/formations/participants/inscription/form.php';
		break;



	default:
		require 'font-end/erreur/404.php';
		break;
}

// if ($url=='') {
// 	echo "Page Acceuil";
// }elseif ($url[2]) {
// 	echo "Liste des articles";
// }

