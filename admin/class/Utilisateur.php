<?php
/**
 	c'est la classe de connexion 
 */
 // demarer la session
class utilisateur
{
	// declaration des variables
	private $nom;
	private $prenom;
	private $email;
	private $droit;
	private $fonction;
	// declaration des mots de passe
	private $mdp;


	// constructeur
	public function __construct($nom,$prenom,$email,$droit,$fonction,$mdp,$equipe)
	{
		// securite des variable 
		$nom=ucfirst(htmlspecialchars($nom));
		$prenom=ucfirst(htmlspecialchars($prenom));
		$email=htmlspecialchars($email);
		$droit=ucfirst(htmlspecialchars($droit));
		// initialisation des variables
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->droit=$droit;
		$this->fonction=$fonction;
		$this->mdp=$mdp;
		$this->equipe=$equipe;
		// initialisation de la base de donnée
		$this->bdd=class_bdd::connexion_bdd();


	}

	// methode pour connecter un utilisateur
	public static function authentifier($email,$mdp)
	{

		if (!empty($email) AND !empty($mdp)) {
			// verification des donnes
			$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM utilisateur WHERE email=? AND mdp=?");
			$requette->execute(array($email,sha1($mdp)));
			//lister des donnes
			$utilisateur=$requette->fetch();
			// selectionner l'enregistrement
			$verification=$requette->rowCount();
			if ($verification==1) {
				//selection des donnees
				$_SESSION['id']=$utilisateur['id'];
				$_SESSION['nom']=$utilisateur['nom'];
				$_SESSION['prenom']=$utilisateur['prenom'];
				$_SESSION['email']=$utilisateur['email'];
				$_SESSION['droit']=$utilisateur['droit'];
				$_SESSION['mdp']=$utilisateur['mdp'];
				$_SESSION['photo']=$utilisateur['photo'];

				if ($_SESSION['redirec_url_admin']) {
					$url=$_SESSION['redirec_url_admin'];
					echo "<script>window.location ='$url'</script>";
					// header("Location:$url");
				}else{
					Fonctions::set_flash('Vous etes connecté (e)','success');
					echo "<script>window.location ='?page=home'</script>";
					// header("Location:?page=home");
				}
				$_SESSION['redirec_url_admin']=null;
			
			    // header("Location:?page=home");	
			}
			else
			{
				Fonctions::set_flash('Email ou Mot de passe incorrect !','danger');
				echo "<script>window.location ='./?page=login'</script>";
				// header("Location:./?page=login");
			}
		}else{
			echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
		}

	}


	// modifier photo
		public static function upload($photo,$id)
		{
			//selectionner l'utilisateur en cours 
			$user=Query::affiche('utilisateur',$id,'id');
			// supprmer l'ancienne photo
			Query::supprimer_fichier_one('../../dist/img/user/'.$user->photo);

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE utilisateur SET photo=? WHERE id=?");
			$requette->execute(array($photo,$id));
			Fonctions::set_flash('Photo modifié avec succès','success');
			// echo "<script>window.location ='Location:?page=profile&id=$id'</script>";
		}

		public static function test()
		{
			echo "Biwwwwwww";
		}


	// methode pour ajouter un utilisateur
	public function ajouter()
	{
		// verification sur les champs
		if (!empty($this->nom)AND !empty($this->prenom) AND !empty($this->email) AND !empty($this->droit) AND !empty($this->mdp)) {
			 // verification si il existe un nom utilisateur
			 $verif=$this->bdd->prepare("SELECT * FROM utilisateur WHERE email=?");
			 $verif->execute(array($this->email));
			 $verification=$verif->rowCount();

			 // si il n'y a pas de nom
			 if ($verification==0) {
			 	// insertion des de l'utilisateur
			 	$id1=$verification+1;
				$id=rand(1000,1999).$id1;
			 	
				$requette=$this->bdd->prepare("INSERT INTO utilisateur(id,nom,prenom,email,droit,fonction,mdp,photo,date_post) VALUES(?,?,?,?,?,?,?,'user1.png',NOW())");
				$requette->execute(array($id,$this->nom,$this->prenom,$this->email,$this->droit,$this->fonction,sha1($this->mdp)));

				//verifie si c'est un intervenant
				if($this->droit=='Intervenant' AND $this->equipe!=1){
					// enregistrer les informations
						$requette=$this->bdd->prepare("INSERT INTO cv(id_user,titre,telephones,email,biographie,equipe,intervenant,date_post) VALUES(?,?,?,?,?,?,?,NOW())");
					$requette->execute(array($id,'','','','',0,1));

					// redirection
					Fonctions::set_flash('Utilisateur enregistré avec succès','success');
					echo "<script>window.location ='./?page=profile&id=$id'</script>";

				}elseif($this->equipe==1 AND $this->droit!='Intervenant'){
					// enregistrer les informations pour l'equipe de direction
					// inserer dans dans cv
					$requette=$this->bdd->prepare("INSERT INTO cv(id_user,titre,telephones,email,biographie,equipe,intervenant,date_post) VALUES(?,?,?,?,?,?,?,NOW())");
					$requette->execute(array($id,'','','','',1,0));

					// redirection
					Fonctions::set_flash('Utilisateur enregistré avec succès','success');
					echo "<script>window.location ='./?page=profile&id=$id'</script>";


				}elseif ($this->droit=='Intervenant' AND $this->equipe==1) {
					$requette=$this->bdd->prepare("INSERT INTO cv(id_user,titre,telephones,email,biographie,equipe,intervenant,date_post) VALUES(?,?,?,?,?,?,?,NOW())");
					$requette->execute(array($id,'','','','',1,1));

					// redirection
					Fonctions::set_flash('Utilisateur enregistré avec succès','success');
					echo "<script>window.location ='./?page=profile&id=$id'</script>";
				}else{
					// enregistrer le cv 
				$requette=$this->bdd->prepare("INSERT INTO cv(id_user,titre,telephones,email,biographie,equipe,intervenant,date_post) VALUES(?,?,?,?,?,?,?,NOW())");
					$requette->execute(array($id,'','','','',0,0));
					Fonctions::set_flash('Utilisateur enregistré avec succès','success');
					echo "<script>window.location ='./?page=profile&id=$id'</script>";
				}


				// redirection
					Fonctions::set_flash('Utilisateur enregistré avec succès','success');
					echo "<script>window.location ='./?page=Ajouter-utilisateur'</script>";
				
			 }
			 else
			 {
			 	Fonctions::set_flash('Cet utilisateur est déjà éxisté !','warning');
			 	header("Location:?page=Ajouter-utilisateur");
			 }

		}
		// si les champs ne sont pas vides
		else
		{
			Fonctions::set_flash('Tous les champs sont obligatoire','warning');
		}
	}


	// methode pour modifier un utilisateur
	public function modifier()
	{
		// verification si on clique sur le nom
		if (isset($this->nom)) {
			// modificaton du nom
			$requette=$this->bdd->prepare("UPDATE utilisateur SET nom=? WHERE id=?");
			$requette->execute(array($this->nom,$_GET['id']));
		}

		// verification si on clique sur le prenom
		if (isset($this->prenom)) {
			// modificaton du prenom
			$requette=$this->bdd->prepare("UPDATE utilisateur SET prenom=? WHERE id=?");
			$requette->execute(array($this->prenom,$_GET['id']));
			
		}

		// verification si on clique sur le nom d'utilisateur
		if (isset($this->email)) {
			// modificaton du nom d'utiisateur
			$requette=$this->bdd->prepare("UPDATE utilisateur SET email=? WHERE id=?");
			$requette->execute(array($this->email,$_GET['id']));
			
		}

		// verification si on clique sur le nom d'utilisateur
		if (isset($this->fonction)) {
			// modificaton du nom d'utiisateur
			$requette=$this->bdd->prepare("UPDATE utilisateur SET fonction=? WHERE id=?");
			$requette->execute(array($this->fonction,$_GET['id']));
			
		}

		// verification si on clique sur le droit
		if (isset($this->droit)) {
			// modificaton de le droit
			$requette=$this->bdd->prepare("UPDATE utilisateur SET droit=? WHERE id=?");
			$requette->execute(array($this->droit,$_GET['id']));
		}

		// verification si on clique sur le droit
		if (isset($this->mdp) AND !empty($this->mdp)) {
			// modificaton de le droit
			$requette=$this->bdd->prepare("UPDATE utilisateur SET mdp=? WHERE id=?");
			$requette->execute(array(sha1($this->mdp),$_GET['id']));
			Fonctions::set_flash('Modification effectuée avec succès !','success');
			header("Location:?page=login");
		}


		//verifie si c'est un intervenant
			if($this->droit=='Intervenant' AND $this->equipe!=1){
				// enregistrer les informations
				$requette=$this->bdd->prepare("UPDATE cv SET intervenant=? WHERE id_user=?");
				$requette->execute(array(1,$_GET['id']));

				$requette=$this->bdd->prepare("UPDATE cv SET equipe=? WHERE id_user=?");
				$requette->execute(array(0,$_GET['id']));


			}elseif($this->equipe==1 AND $this->droit!='Intervenant'){
				// enregistrer les informations pour l'equipe de direction
				// inserer dans dans cv

				$requette=$this->bdd->prepare("UPDATE cv SET equipe=? WHERE id_user=?");
				$requette->execute(array(1,$_GET['id']));

				$requette=$this->bdd->prepare("UPDATE cv SET intervenant=? WHERE id_user=?");
				$requette->execute(array(0,$_GET['id']));


			}elseif ($this->droit=='Intervenant' AND $this->equipe==1) {

				$requette=$this->bdd->prepare("UPDATE cv SET intervenant=? WHERE id_user=?");
				$requette->execute(array(1,$_GET['id']));

				$requette=$this->bdd->prepare("UPDATE cv SET equipe=? WHERE id_user=?");
				$requette->execute(array(1,$_GET['id']));
			}else{

				$requette=$this->bdd->prepare("UPDATE cv SET intervenant=? WHERE id_user=?");
				$requette->execute(array(0,$_GET['id']));

				$requette=$this->bdd->prepare("UPDATE cv SET equipe=? WHERE id_user=?");
				$requette->execute(array(0,$_GET['id']));

			}

		
			Fonctions::set_flash('Modification effectuée avec succès !','success');
			header("Location:?page=utilisateurs");
	}


	public static function modifier_profile($nom,$prenom,$email,$droit,$mdp)
	{
		//verification si on clique sur le nom
		if (isset($nom)) {
			// modificaton du nom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE utilisateur SET nom=? WHERE id=?");
			$requette->execute(array($nom,$_GET['id']));
		}

		// verification si on clique sur le prenom
		if (isset($prenom)) {
			// modificaton du prenom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE utilisateur SET prenom=? WHERE id=?");
			$requette->execute(array($prenom,$_GET['id']));
			
		}

		// verification si on clique sur le nom d'utilisateur
		if (isset($email)) {
			// modificaton du nom d'utiisateur
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE utilisateur SET email=? WHERE id=?");
			$requette->execute(array($email,$_GET['id']));
			
		}


		// verification si on clique sur le droit
		if (isset($mdp) AND !empty($mdp)) {
			// modificaton de le droit
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE utilisateur SET mdp=? WHERE id=?");
			$requette->execute(array(sha1($mdp),$_GET['id']));
			session_destroy();
			Fonctions::set_flash('Modification effectuée avec succès !','success');
			header("Location:?page=login");
		}
		$id=$_GET['id'];
		Fonctions::set_flash('Profile modifié !','success');
		header("Location:?page=profile&id=$id");
	}


	public static function modifier_identite($titre,$tel,$email,$bio){

		if (isset($titre)) {
			// modificaton du prenom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE cv SET titre=? WHERE id_user=?");
			$requette->execute(array($titre,$_GET['id']));
		}

		if (isset($tel)) {
			// modificaton du prenom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE cv SET telephones=? WHERE id_user=?");
			$requette->execute(array($tel,$_GET['id']));
		}

		if (isset($email)) {
			// modificaton du prenom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE cv SET email=? WHERE id_user=?");
			$requette->execute(array($email,$_GET['id']));
		}


		if (isset($bio)) {
			// modificaton du prenom
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE cv SET 	biographie=? WHERE id_user=?");
			$requette->execute(array($bio,$_GET['id']));
		}

		$id=$_GET['id'];
		Fonctions::set_flash('Modification effectuée','success');
		header("Location:?page=profile");
		header("Location:?page=profile&id=$id");

	}

	

}

?>
