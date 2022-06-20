<?php
/**
 * 
 */
class Query
{

	//Count
	public static function count_query($table)
	{
		$req=class_bdd::connexion_bdd()->query("SELECT * FROM $table");
		$count=$req->rowCount();
		return $count;
	}

	// Count Prepare

	public static function count_prepare($table,$key,$identifiant)
	{
		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=?");
		$req->execute(array($key));
		$data=$req->rowCount();
		return $data;
	}


	// lister
		public static function liste ($table, $limit='', $order='')
		{
			if(empty($order)){
				$order ="ASC";
			}else{
				$order ="DESC";
			}

			if (empty($limit)) {
				$req=class_bdd::connexion_bdd()->query("SELECT * FROM $table ORDER BY date_post $order");
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}else{
				$req=class_bdd::connexion_bdd()->query("SELECT * FROM $table ORDER BY date_post $order LIMIT $limit");
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}
			
		}
		public static function liste_not_egale (){
			$req=class_bdd::connexion_bdd()->prepare("SELECT  * FROM utilisateur INNER JOIN cv ON utilisateur.id=cv.id_user  WHERE cv.equipe=? OR utilisateur.droit = ? OR utilisateur.droit = ?  ORDER BY utilisateur.date_post DESC");
			$req->execute(array(1,'Administrateur','Utilisateur'));
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		// liste prepare
		public static function liste_prepare($table,$key,$identifiant,$limit='',$order='')
		{
			if(empty($order)){
				$order ="ASC";
			}else{
				$order ="DESC";
			}

			if (empty($limit)) {
				$req=class_bdd::connexion_bdd()->prepare("SELECT  * FROM $table WHERE $identifiant=? ORDER BY date_post DESC");
				$req->execute(array($key));
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}else{
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=? ORDER BY date_post DESC LIMIT $limit");
				$req->execute(array($key));
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}
		}

		// liste prepare acendant
		public static function liste_prepare_asc($table,$key,$identifiant,$limit='')
		{
			if (empty($limit)) {
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=? ORDER BY date_post ASC");
				$req->execute(array($key));
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}else{
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=? ORDER BY date_post ASC LIMIT $limit");
				$req->execute(array($key));
				$data=$req->fetchAll(PDO::FETCH_OBJ);
				return $data;
			}
		}


		// lister prepare
		public static function affiche($table,$key,$identifiant)
		{
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=?");
			$req->execute(array($key));
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
			
		}


		// supprimer
		// methode suppression
		public static function supprimer($table,$id,$orther_key='')
		{
			if (empty($orther_key)) {
				$requette=class_bdd::connexion_bdd()->prepare("DELETE FROM $table WHERE id=?");
				$requette->execute(array($id));
			}else{
				$requette=class_bdd::connexion_bdd()->prepare("DELETE FROM $table WHERE $orther_key=?");
				$requette->execute(array($id));
			}
			
		}

		public static function supprimer_fichier_one($link){
			unlink($link);
		}

		public static function supprimer_fichier_many($table,$identifiant,$id,$link){
			$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM $table WHERE $identifiant=?");
			$requette->execute(array($id));
			while ($data=$requette->fetch(PDO::FETCH_OBJ)) {
				unlink($link.$data->nom);
				// echo $data->nom;
			}
		}


		public static function vue($id,$identifiant)
	{
		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM vue_element WHERE id_element=? AND element=?");
		$req->execute(array($id,$identifiant));
		$data=$req->rowCount();
		return $data;
	}

		
		


}