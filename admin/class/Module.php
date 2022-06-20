
<?php

/**
 * 
 */
class Module
{
	private $titre;
	private $description;
	private $intervenant;

	function __construct($titre, $description, $intervenant)
	{
		$titre = ucfirst(htmlspecialchars($titre));
		$description = htmlspecialchars($description);
		$intervenant = htmlspecialchars($intervenant);

			// initialisation
		$this->titre = $titre;
		$this->description = $description;
		$this->intervenant = $intervenant;

	}

	public function ajouter($id_formation)
	{

		if (!empty($this->titre)) {
			$count = Query::count_query('module_formation');
			$id = rand(1000, 1999) . $count;

			$requette = class_bdd::connexion_bdd()->prepare("INSERT INTO module_formation(id,titre,description,id_formation,id_posteur,intervenant,date_post)VALUES (?,?,?,?,?,?,NOW())");
			$requette->execute(array($id, $this->titre, $this->description, $id_formation, $_SESSION['id'], $this->intervenant));
			Fonctions::set_flash('Module enregistré avec succès', 'success');
			$redirect = $_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";

		} else {
			echo "<p class='alert alert-danger'>Le champ titre est obligatoire.</p>";
		}

	}

	public static function liste($formation)
	{
		$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM module_formation WHERE id_formation=? ORDER BY date_post ASC");
		$req->execute(array($formation));
		$data = $req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function modifier($id)
	{

		if (isset($this->titre)) {
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE module_formation SET titre=? WHERE id=?");
			$requette->execute(array($this->titre, $id));
		}

		if (isset($this->description)) {
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE module_formation SET description=? WHERE id=?");
			$requette->execute(array($this->description, $id));
		}

		if (isset($this->intervenant)) {
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE module_formation SET intervenant=? WHERE id=?");
			$requette->execute(array($this->intervenant, $id));
		}
		Fonctions::set_flash('Module modifié avec succès', 'success');
		$redirect = $_SERVER['REQUEST_URI'];
		echo "<script>window.location ='$redirect';</script>";
	}


		// le resultat des modules paase
	public static function module_passe_user($id_user, $id_module, $id_formation)
	{
			// cerifier si l'utilisareur passe deja ce module
		$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM participant_resultat_module WHERE id_participant=? AND id_module=? AND id_formation=?");
		$req->execute(array($id_user, $id_module, $id_formation));
		$count = $req->rowCount();
			// si l'utilissteur ne passe ps encore
		if ($count == 0) {
			$requette = class_bdd::connexion_bdd()->prepare("INSERT INTO participant_resultat_module(id_participant,id_module,id_formation,etat,date_post)VALUES (?,?,?,?,NOW())");
			$requette->execute(array($id_user, $id_module, $id_formation, 1));
		}
	}

		// quantite module passer
	public static function count($id_formation)
	{
		$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM module_formation WHERE id_formation=? AND titre!=?");
		$req->execute(array($id_formation, 'Introduction'));
		$data = $req->rowCount();
		return $data;
	}


	public static function user_module_pass($id_formation)
	{
		$req = class_bdd::connexion_bdd()->prepare("SELECT  DISTINCT nom_complet, email,id_participant,sexe,departement,telephone, nom_organisation FROM participant INNER JOIN participant_resultat_module ON participant.id=participant_resultat_module.id_participant WHERE id_formation=? ORDER BY nom_complet ASC");
		$req->execute(array($id_formation));
		$data = $req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}



		// ajouter un intervennat
	public static function add_intervenant($id_user, $id_module, $id_formation)
	{
		$req = class_bdd::connexion_bdd()->prepare("SELECT * FROM enseignant WHERE id_user=? AND id_module=? AND id_formation=?");
		$req->execute(array($id_user, $id_module, $id_formation));
		$count = $req->rowCount();

		if ($count != 1) {
			$requette = class_bdd::connexion_bdd()->prepare("INSERT INTO enseignant (id_user,id_module,id_formation,date_post) VALUES(?,?,?,NOW())");
			$requette->execute(array($id_user, $id_module, $id_formation));

			Fonctions::set_flash('intervenant ajouté avec succès', 'success');
			$redirect = $_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";

		} else {
			Fonctions::set_flash('Cet intervenant déjà ajouté pour cette module', 'danger');
			$redirect = $_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";

		}
	}

		//lister des intervenant

		// liste prepare acendant
	public static function liste_intervenant($id_formation, $limit = '')
	{
		if (empty($limit)) {
			$req = class_bdd::connexion_bdd()->prepare("SELECT DISTINCT  utilisateur.id,nom, prenom,photo FROM enseignant INNER JOIN utilisateur ON enseignant.id_user=utilisateur.id WHERE id_formation=? ORDER BY enseignant.date_post ASC");
			$req->execute(array($id_formation));
			$data = $req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		} else {
			$req = class_bdd::connexion_bdd()->prepare("SELECT DISTINCT  utilisateur.id,nom, prenom,photo FROM enseignant INNER JOIN utilisateur ON enseignant.id_user=utilisateur.id WHERE id_formation=? ORDER BY enseignant.date_post ASC LIMIT $limit");
			$req->execute(array($id_formation));
			$data = $req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}


	}







}

?>