<?php

class Participant
{
	public static function authentifier($email, $password)
	{

			// verifier si l'email est valide 
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				// verifier l'email et le mot de passe 
			$requette = class_bdd::connexion_bdd()->prepare("SELECT * FROM participant WHERE email=? AND mdp=?");
			$requette->execute(array($email, sha1($password)));
			$userFound = $requette->rowCount();
			if ($userFound == 1) {
					// verifier si le compte est active
				$user = $requette->fetch(PDO::FETCH_OBJ);
					// verifier si le compte est active
				$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM participant WHERE id=? AND active=?");
				$req->execute(array($user->id, 1));
				$userActive = $req->rowCount();

				if ($userActive) {
					require '../../font-end/layout/config.php';
					session_start();
					$_SESSION['id_user'] = $user->id;
						// selectionner nom
					$_SESSION['nom'] = $user->nom_complet;
						// // selectionner email
					$_SESSION['email'] = $user->email;

					if ($_SESSION['redirec_url']) {
						$url = $_SESSION['redirec_url'];
					} else {
						$url = "$link_menu/tableau-de-bord";
					}
					$_SESSION['redirec_url'] = null;

					echo "<script>window.location ='$url';</script>";


				} else {
					echo "<p class='alert alert-danger'>Ce compte n'est pas activé, un email de confirmation a envoyé sur $user->email</p>";
				}

			} else {
					// si les donnees ne sont pas correct
				echo "<p class='alert alert-danger'>Email ou mot de passe incorrect</p>";
			}
		} else {
				// si les donnees ne sont pas correct
			echo "<p class='alert alert-danger'>L'email n'est pa valide</p>";
		}

	}

		// modifier profil
	public static function modifier_profil($nom, $sexe, $commune, $departement, $telephone, $telephone2, $profession, $fonction)
	{
		require './font-end/layout/config.php';
		if (isset($nom)) {
				// modifer nom
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET nom_complet=? WHERE id=?");
			$requette->execute(array($nom, $_SESSION['id_user']));
		}

		
		if (isset($commune)) {
			// modifer commune
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET commune_residence=? WHERE id=?");
			$requette->execute(array($commune, $_SESSION['id_user']));
		}

		if (isset($sexe)) {
			// modifer commune
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET sexe=? WHERE id=?");
			$requette->execute(array($sexe, $_SESSION['id_user']));
		}


		if (isset($departement)) {
				// modifer departement
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET departement=? WHERE id=?");
			$requette->execute(array($departement, $_SESSION['id_user']));
		}


		if (isset($telephone)) {
				// modifer niveau
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET telephone=? WHERE id=?");
			$requette->execute(array($telephone, $_SESSION['id_user']));
		}

		if (isset($telephone2)) {
			// modifer niveau
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET telephone_whatsapp=? WHERE id=?");
			$requette->execute(array($telephone2, $_SESSION['id_user']));
		}

		if (isset($profession)) {
			// modifer niveau
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET professsion=? WHERE id=?");
			$requette->execute(array($profession, $_SESSION['id_user']));
		}

		if (isset($fonction)) {
			// modifer niveau
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET fonction=? WHERE id=?");
			$requette->execute(array($fonction, $_SESSION['id_user']));
		}



		Fonctions::set_flash('Profil modifié', 'success');
		echo "<script>window.location ='$link_menu/profile';</script>";
	}

		// modifier la photo de profil
		// modifier photo
	public static function upload($photo, $id)
	{
			//selectionner l'utilisateur en cours 
		$user = Query::affiche('participant', $id, 'id');
			// // supprmer l'ancienne photo
		Query::supprimer_fichier_one('../../dist/img/user/participant/' . $user->photo);

		$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET photo=? WHERE id=?");
		$requette->execute(array($photo, $id));
		Fonctions::set_flash('Photo de profil modifiée', 'success');
		echo "<script>window.location ='$link_menu/profile';</script>";

	}

		// modifier le mot de passe
	public static function modifier_password($password_actuel, $password, $password_confirmation)
	{
			// include config
		require './font-end/layout/config.php';
			// selection le mot de passe en cours
		$password_actuel = Query::affiche('participant', sha1($password_actuel), 'mdp');
			// verifier si on a un bon de passe
		if ($password_actuel) {
				// verifier si les mots de passe sont les memes
			if ($password == $password_confirmation) {
					// mettre a jour le mot de passe
				$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET mdp=? WHERE id=?");
				$requette->execute(array(sha1($password), $_SESSION['id_user']));
				$url = $_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Votre mot de passe a été modifié", 'success');
				echo "<script>window.location ='$url';</script>";
			} else {
					// si les mots de passe ne sont pas les memes
				$url = $_SESSION['redirec_url'];
				Fonctions::set_flash("Les mots de passe ne sont identiques", 'danger');
				echo "<script>window.location ='$url';</script>";
			}

		} else {
				// si le mot de passe actuel n'est pas correct
			$url = $_SESSION['redirec_url'];
			Fonctions::set_flash("Le mot de passe actuel n'est pas correct", 'danger');
			echo "<script>window.location ='$url';</script>";
		}
	}

		// reset password
	public static function reset_password_mail($email)
	{
		require 'font-end/layout/config.php';
			// selectionner le participant
		$user = Query::affiche('participant', $email, 'email');
		if (!$user) {
			$url = $_SERVER['REQUEST_URI'];
			Fonctions::set_flash("Cet email n'existe pas.", 'danger');
			echo "<script>window.location ='$url';</script>";
		}
			// selectionner l'organisation en question
		$org = Query::affiche('organisation', 1, 'id');
			// token
			$token = sha1($user->email) . sha1($user->id);
		// $token = sha1($user->email) . $user->mdp;
			// sujet de l'email
		$Subject = "Reinitialisation de mot de passe";
			// outil de configuration
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$link_mail = "$link_menu/reset-password/$token/$user->id/edit";
	        // le message
		$Msg = "
				<head>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'>
					<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
					<meta content='width=device-width, initial-scale=1.0' name='viewport'/>
					<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
				</head>

				<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
				    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
				        <!-- LOGO -->
				        <tr>
				            <td bgcolor='#26a8b4' align='center'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#26a8b4' align='center' style='padding: 0px 10px 0px 10px;'>
				              
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
				                        
				                            <p style='margin: 20px; font-size:17px; line-height:23px; margin-top:-20px;'>
				                            Salut $user->nom_complet,<br/>
				                            si vous n'avez pas fait cette demande, ignorez simplement cet e-mail. Sinon, veuillez cliquer sur le bouton ci-dessous pour changer votre mot de passe</p>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left'>
				                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                                <tr>
				                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>

				                                        <table border='0' cellspacing='0' cellpadding='0'>
				                                            <tr>
				                                                <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='$link_mail' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; background-color: #26a8b4; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #26a8b4; display: inline-block;'>Reinitialiser</a></td>
				                                            </tr>
				                                        </table>

				                                    </td>
				                                </tr>
				                            </table>
				                        </td>
				                    </tr> <!-- COPY -->


				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
				                            <p style='margin: 20px; font-size:17px;'>L'equipe de l'OCID</p>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				    </table>
				</body>";
				// envoyer email
		require_once "/home/jurimedi/php";
		$from = "Sandra Sender <team@jurimedia.org>";
		$to = "Ramona Recipient <anizairejacky@gmail.com>";
		$subject = "Hi!";
		$body = "Hi,\n\nHow are you?";

		$host = "mail.jurimedia.org";
		$username = "team@jurimedia.org";
		$password = "jurimedia2022";

		$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject
		);
		$smtp = Mail::factory(
			'smtp',
			array(
				'host' => $host,
				'auth' => true,
				'username' => $username,
				'password' => $password
			)
		);

		$mail = $smtp->send($to, $headers, $body);


		if (PEAR::isError($mail)) {
			echo ("<p>" . $mail->getMessage() . "</p>");
		} else {
			echo ("<p>Message successfully sent!</p>");
		}
				
				






		// $SendMessage = mail($user->email, $Subject, $Msg, $headers);
		// if ($SendMessage == true) {
		// 	$url = $_SERVER['REQUEST_URI'];
		// 	Fonctions::set_flash("Un message de restauration envoyé sur $user->email", 'success');
		// 	echo "<script>window.location ='$url';</script>";
		// } else {
		// 	echo "";
		// }
	}

		// modifier le mot de passe
	public static function reset_password($token_user, $id, $password, $password_confirmation)
	{
			// include config
		require './font-end/layout/config.php';
		$user = Query::affiche('participant', $id, 'id');
		if (!$user) {
				// echo "<p class='alert alert-danger'>Cette email n'existe pas.</p>";
			$url = $_SERVER['REQUEST_URI'];
			Fonctions::set_flash("Cet email n'existe pas.", 'danger');
			echo "<script>window.location ='$url';</script>";
		}

		// gereation de token
		$token = sha1($user->email) . sha1($user->id);

		if ($token_user != $token) {
			$url = $_SERVER['REQUEST_URI'];
			Fonctions::set_flash("Une erreur s'est produite", 'danger');
			echo "<script>window.location ='$url';</script>";
		}

		if ($password == $password_confirmation) {

				//verifier l'email
			if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
				$requette = class_bdd::connexion_bdd()->prepare("UPDATE participant SET mdp=?, active= ? WHERE email=?");
				$requette->execute(array(sha1($password), 1, $user->email));
				Fonctions::set_flash("Votre mot de passe a été modifié avec succès", 'success');
				echo "<script>window.location ='$link_menu/connexion';</script>";

			} else {
				// si le mot de passe actuel n'est pas correct
				$url = $_SERVER['REQUEST_URI'];
				Fonctions::set_flash("L'adresse email n'est pas valide", 'danger');
				echo "<script>window.location ='$url';</script>";
			}

		} else {
				// si le mot de passe actuel n'est pas correct
			$url = $_SERVER['REQUEST_URI'];
			Fonctions::set_flash("Les mots de passe ne sont pas identiques", 'danger');
			echo "<script>window.location ='$url';</script>";
		}

	}


		// valider participant par admin
	public static function valider_or_no($email)
	{
		require 'font-end/layout/config.php';
			// rechercher le participant 
		$participant = Query::affiche('participants_temp', $email, 'email');
			// rechercher la formation
		if ($participant) {
				// selectionner l'organisation en question
			$org = Query::affiche('organisation', 1, 'id');
			$token = sha1($participant->email) . sha1($participant->id);
			$link_mail = "$link_menu/validation-de-compte/$token/$participant->id/edit?action=validate";
			$url = $_SERVER['REQUEST_URI'];
			$Msg ="<head>
			<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
			<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'>
			<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
			<meta content='width=device-width, initial-scale=1.0' name='viewport'/>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
		</head>

		<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>

				<tr>
					<td bgcolor='#26a8b4' align='center' style='padding: 0px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
									<img src='$org->site_web/$link_admin/dist/img/logo/$org->logo' width='125'  style='display: block; border: 0px;' />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
									<p style='margin: 20px; font-size:17px; line-height:23px;'>
									Salut $participant->nom_complet ,<br/>
									Nous sommes ravis de vous voir commencer. Tout d'abord, vous devez confirmer votre compte. Appuyez simplement sur le bouton ci-dessous.</p>
								</td>
							</tr>
							<tr>
								<td bgcolor='#ffffff' align='left'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0'>
										<tr>
											<td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>

												<table border='0' cellspacing='0' cellpadding='0'>
													<tr>
														<td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='$link_mail' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; background-color: #26a8b4; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #26a8b4; display: inline-block;'>Confirmer votre compte</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr> <!-- COPY -->


							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<p style='margin: 20px; font-size:17px;'><b><i>L'equipe de l'OCID<i/></b></p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>";
			Fonctions::set_flash("Email de confirmation envoyé sur " . $email, 'success');

			// Fonctions::set_flash("Voici le link " . $link_mail, 'success');
					//==========================================================================================
						// envoyer l'email 
					// sujet de l'email
			$Subject = "Validation de compte";
					// outil de configuration
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

			// echo $Msg;
					
			// le message
			//envoyer email
			$SendMessage = mail($participant->email, $Subject, $Msg, $headers);
			if ($SendMessage == true) {
				$url = $_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$url';</script>";
			} else {
				echo "";
			}

			$url = $_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$url';</script>";

		} else {
			$url = $_SERVER['REQUEST_URI'];
			Fonctions::set_flash("ce compte n'existe pas", 'danger');
			echo "<script>window.location ='$url';</script>";
		}

	}

	public static function validate($participant,$action) {
		$check = Query::affiche('participant', $participant->email,'email');
		if(!$check){
			$token = sha1($participant->email) . sha1($participant->id);
			$req = class_bdd::connexion_bdd()->prepare("INSERT INTO participant(id,nom_complet,sexe,departement,commune_residence,email,telephone,telephone_whatsapp,professsion,fonction,nom_organisation,sigle,active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$req->execute(array($participant->id,$participant->nom_complet,$participant->sexe,$participant->departement,$participant->commune_residence,$participant->email,$participant->telephone,$participant->telephone_whatsapp,$participant->professsion,$participant->fonction,$participant->nom_organisation,$participant->sigle,1));
			Fonctions::set_flash("Compte validé avec succès", 'success');

			if($action==0){
				require 'font-end/layout/config.php';
				$link_rediret = "$link_menu/reset-password/$token/$participant->id/edit&action=validate";
			}else{
				$link_rediret = $_SERVER['REQUEST_URI'];
			}
			echo "<script>window.location ='$link_rediret';</script>";
		}else{
			if($action==0){
				Fonctions::set_flash("ce compte à déjà validé, connectez-vous ", 'danger');
				$link_rediret = "$link_menu/connexion";
			}else{
				Fonctions::set_flash("ce compte à déjà validé", 'danger');
				$link_rediret = $_SERVER['REQUEST_URI'];
			}
		}
	}


	// public static function ajouter_participant($nom, $sexe,$email, $commune, $departement, $telephone, $telephone2, $profession, $fonction) {
	// 	$check = Query::affiche('participant', $participant->email,'email');
	// 	if(!$check){
	// 		$token = sha1($participant->email) . sha1($participant->id);
	// 		$req = class_bdd::connexion_bdd()->prepare("INSERT INTO participant(id,nom_complet,sexe,departement,commune_residence,email,telephone,telephone_whatsapp,professsion,fonction,nom_organisation,sigle,active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
	// 		$req->execute(array($participant->id,$participant->nom_complet,$participant->sexe,$participant->departement,$participant->commune_residence,$participant->email,$participant->telephone,$participant->telephone_whatsapp,$participant->professsion,$participant->fonction,$participant->nom_organisation,$participant->sigle,1));
	// 		Fonctions::set_flash("Compte validé avec succès", 'success');

			
	// 	}else{
			
	// 	}
	// }

 }
?>