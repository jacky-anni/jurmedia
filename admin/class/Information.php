<?php
	/**
	 * 
	 */
	class Information
	{
		private $nom;
		private $sigle;
		private $email;
		private $adresse;
		private $tel;
		private $presentation;
		private $site_web;
		private $facebook;
		private $twitter;
		private $instagram;
		private $lendIn;
		private $youtube;
		

		function __construct($nom,$sigle,$email,$adresse,$tel,$presentation,$site_web,$facebook,$twitter,$instagram,$lendIn,$youtube)
		{
			$nom=htmlspecialchars($nom);
			$sigle=htmlspecialchars($sigle);
			$email=htmlspecialchars($email);
			$adresse=htmlspecialchars($adresse);
			$tel=htmlspecialchars($tel);
			$site_web=htmlspecialchars($site_web);
			$facebook=htmlspecialchars($facebook);
			$twitter=htmlspecialchars($twitter);
			$youtube=htmlspecialchars($youtube);


			$this->nom=$nom;
			$this->sigle=$sigle;
			$this->email=$email;
			$this->adresse=$adresse;
			$this->tel=$tel;
			$this->presentation=$presentation;
			$this->site_web=$site_web;
			$this->facebook=$facebook;
			$this->twitter=$twitter;
			$this->instagram=$instagram;
			$this->lendIn=$lendIn;
			$this->youtube=$youtube;

			// initialisation de la baSse de donnée
			// $this->bdd=class_bdd::connexion_bdd();
		}


		public function modifier()
		{

			 if (isset($this->nom)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET nom=? WHERE id=?");
				$requette->execute(array($this->nom,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->sigle)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET sigle=? WHERE id=?");
				$requette->execute(array($this->sigle,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->email)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET email=? WHERE id=?");
				$requette->execute(array($this->email,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->adresse)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET adresse=? WHERE id=?");
				$requette->execute(array($this->adresse,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->tel)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET telephone=? WHERE id=?");
				$requette->execute(array($this->tel,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->presentation)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET presentation=? WHERE id=?");
				$requette->execute(array($this->presentation,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->site_web)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET site_web=? WHERE id=?");
				$requette->execute(array($this->site_web,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->facebook)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET lien_facebook=? WHERE id=?");
				$requette->execute(array($this->facebook,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->twitter)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET lien_twitter=? WHERE id=?");
				$requette->execute(array($this->twitter,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->instagram)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET lien_instagram=? WHERE id=?");
				$requette->execute(array($this->instagram,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->lendIn)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET 	lien_lendIn=? WHERE id=?");
				$requette->execute(array($this->lendIn,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}

			if (isset($this->youtube)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE organisation SET lien_youtube=? WHERE id=?");
				$requette->execute(array($this->youtube,1));

				Fonctions::set_flash('Informations modifiées avec succès','success');
				header("Location:?page=information-de-base");
			}
		}

	}
?>