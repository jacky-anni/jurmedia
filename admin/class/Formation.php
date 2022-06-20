<?php
	class Formation
	{
		private $titre;
		private $description;
		private $date_debut;
		private $date_fin;
		private $presentation;
		private $type;
		private $certificat;

		function __construct($titre,$description,$date_debut,$date_fin,$presentation,$type,$certificat)
		{
			$titre=htmlspecialchars($titre);
			$description=htmlspecialchars($description);
			$date_debut=htmlspecialchars($date_debut);
			$date_fin=htmlspecialchars($date_fin);
			$type=htmlspecialchars($type);
			$certificat=htmlspecialchars($certificat);

			$this->titre=$titre;
			$this->description=$description;
			$this->date_debut=$date_debut;
			$this->date_fin=$date_fin;
			$this->presentation=$presentation;
			$this->type=$type;
			$this->certificat=$certificat;

		}

		// ajouter formation
		public function ajouter()
		{

			if (!empty($this->titre) AND !empty($this->date_debut)  AND !empty($this->description) AND !empty($this->date_fin) AND !empty($this->presentation) AND !empty($this->type)) {
				// verifier l'existence
				$formation=Query::affiche('formation',$this->titre,'titre');
				if (!$formation) {
					if($this->date_debut<$this->date_fin){
						 $count= Query::count_query('formation');
						 $id1=$count+1;
						 $id=rand(1000,1999).$id1;

						$req=class_bdd::connexion_bdd()->prepare('INSERT INTO formation(id,titre,description,date_debut,date_fin,presentation,type,certificat,posteur,etat,date_post) VALUES(?,?,?,?,?,?,?,?,?,?,NOW())');
						$req->execute(array($id,$this->titre,$this->description,$this->date_debut,$this->date_fin,$this->presentation,$this->type,$this->certificat,$_SESSION['id'],'Hors ligne'));

						Fonctions::set_flash('Formation enregistrée','success');
						echo "<script>window.location ='?page=ajouter-formation'</script>";
						// header("Location:?page=ajouter-formation");
					}else{
						echo "<p class='alert alert-danger'>La date de début doit etre inférieur à la date de fin.</p>";
					}
				}else{
					echo "<p class='alert alert-danger'>Cette formation existe déjà.</p>";
				}

			}else{
				echo "<p class='alert alert-danger'>Tous les champs doivent etre remplis.</p>";
			}
			 
		}


		public static function statut()
		{
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET etat=? WHERE id=?");
			$requette->execute(array($_GET['statut'],$_GET['formations']));
			Fonctions::set_flash('Changement de statut effectué avec succès','success');
			$formations=$_GET['formations'];

			//rechercher formation
			$formations=Query::affiche('formation',$formations,'id');

			header("Location:?page=formation&formations=$formations->id");
		}

		public static function fermeture_quiz()
		{
			$formations=$_GET['formations'];
			$formations=Query::affiche('formation',$formations,'id');
			if($formations){
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET fermeture=? WHERE id=?");
				$requette->execute(array($_GET['fermeture'],$_GET['formations']));
				// selctionner la formation
				if($formation->fermeture==1){
					Fonctions::set_flash("La formation est ouverte ouverte",'success');
					header("Location:?page=formation&formations=$formations->id");
				}else{
					Fonctions::set_flash("la formation est fermée",'success');
					header("Location:?page=formation&formations=$formations->id");
				}
			}else{
				Fonctions::set_flash("Cette formation n'existe pas ",'danger');
				header("Location:?page=formations");
			}
		}


		public function modifier()
		{
			$formations=$_GET['formations'];
			if (isset($this->titre)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET titre=? WHERE id=?");
				$requette->execute(array($this->titre,$_GET['formations']));
			}

			if (isset($this->description)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET description=? WHERE id=?");
				$requette->execute(array($this->description,$_GET['formations']));
			}

			if (isset($this->date_debut)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET date_debut=? WHERE id=?");
				$requette->execute(array($this->date_debut,$_GET['formations']));
			}

			if (isset($this->date_fin)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET date_fin=? WHERE id=?");
				$requette->execute(array($this->date_fin,$_GET['formations']));
			}

			if (isset($this->presentation)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET presentation=? WHERE id=?");
				$requette->execute(array($this->presentation,$_GET['formations']));
			}

			if (isset($this->type)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET type=? WHERE id=?");
				$requette->execute(array($this->type,$_GET['formations']));
			}

			if (isset($this->certificat)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE formation SET certificat=? WHERE id=?");
				$requette->execute(array($this->certificat,$_GET['formations']));
			}

			Fonctions::set_flash('Formations modifiée avec succès','success');
				header("Location:?page=formations");
		}

		public static function formation_suivie_verif($id_formation,$id_participant){
			$req1=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_formation=? AND id_participant=?");
			$req1->execute(array($id_formation,$id_participant));
			$data=$req1->rowCount();
			return $data;
		}

		public static function suivie($id_formation,$id_participant)
		{
			// verifier si on a deja inscrit pour cette formation
			$req1=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_formation=? AND id_participant=?");
			$req1->execute(array($id_formation,$id_participant));
			$data=$req1->rowCount();
			// s'il n'existe pas.
			if ($data==0) {
				$req=class_bdd::connexion_bdd()->prepare('INSERT INTO formation_suivie(id_formation,id_participant,date_post) VALUES(?,?,NOW())');
				$req->execute(array($id_formation,$id_participant));
			}
		}



	}
?>