<?php
	
	/**
	 * 
	 */
	class Quiz
	{
		private $titre;
		private $module;
		
		function __construct($titre,$module)
		{
			$titre=ucfirst(htmlspecialchars($titre));
			$module=htmlspecialchars($module);

			// initialisation
			$this->titre=$titre;
			$this->module=$module;

		}

		public function ajouter()
		{
			if (!empty($this->titre)) {

			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM quiz WHERE nom=? AND id_module=?");
			$req->execute(array($this->titre,$this->module));

			$quizFound=$req->rowCount();
			if (!$quizFound) {
				$count= Query::count_query('quiz');
				 $id=rand(1000,1999).$count;
				 $requette=class_bdd::connexion_bdd()->prepare("INSERT INTO quiz(id,nom,id_module,etat,posteur,date_post)VALUES (?,?,?,?,?,NOW())");
				$requette->execute(array($id,$this->titre,$this->module,0,$_SESSION['id']));

				Fonctions::set_flash('Quiz enregistré','success');
				$redirect=$_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$redirect';</script>";

			}else{
				Fonctions::set_flash('Ce qiz existe déjà','danger');
				$redirect=$_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$redirect';</script>";
			}

			}else{
				echo "<p class='alert alert-danger'>Le champ titre est obligatoire.</p>";
				$redirect=$_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$redirect';</script>";
			}
			
		}



		public static function ajouter_question($id_quiz,$id_module,$titre,$rep1,$rep2,$rep3,$rep4,$bonne_reponse)
		{
			if (!empty($titre)) {
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM questions_quiz WHERE titre=? AND id_module=?");
				$req->execute(array($titre,$_GET['module']));
				$questionFound=$req->rowCount();
				// verifier si la question existe
				if (!$questionFound) {
					$count= Query::count_query('questions_quiz');
					$id=rand(1000,1999).$count;
					// verifier si c'est un questionnaire d'introduction

					if ($titre=='Questionnaire introductif') {
						if (!empty($bonne_reponse)) {
							if ($bonne_reponse==$rep1 || $bonne_reponse==$rep2 || $bonne_reponse==$rep3 || $bonne_reponse==$rep4){
								$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO questions_quiz(id,id_quiz,id_module,	titre,rep1,rep2,rep3,rep4,bonne_reponse,date_post)VALUES (?,?,?,?,?,?,?,?,?,NOW())");
								$requette->execute(array($id,$id_quiz,$id_module,$titre,$rep1,$rep2,$rep3,$rep4,$bonne_reponse));
								Fonctions::set_flash('Question enregistré','success');
								$redirect=$_SERVER['REQUEST_URI'];
								echo "<script>window.location ='$redirect';</script>";

								}else{
								echo "<p class='alert alert-danger'> La réponse ne correspont à aucune evenuelle réponse.</p>";
								}

						}else{
							echo "<p class='alert alert-danger'>Le champ (la bonne réponse) est obligatoire.</p>";
						}
					}else{
						$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO questions_quiz(id,id_quiz,id_module,	titre,rep1,rep2,rep3,rep4,bonne_reponse,date_post)VALUES (?,?,?,?,?,?,?,?,?,NOW())");
						$requette->execute(array($id,$id_quiz,$id_module,$titre,$rep1,$rep2,$rep3,$rep4,$bonne_reponse));
						Fonctions::set_flash('Question enregistré','success');
						$redirect=$_SERVER['REQUEST_URI'];
						echo "<script>window.location ='$redirect';</script>";
					}


				}else{
					echo "<p class='alert alert-danger'>Cette question existe déjà.</p>";
				}
					
				// si la question existe
				}else{
					echo "le champ réponse est obligatoire";
				}
	    }

	    public function modifier($id)
		{

			if (isset($this->titre)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE quiz SET nom=? WHERE id=?");
				$requette->execute(array($this->titre,$id));
			}

			Fonctions::set_flash('Quiz modifié','success');
			$redirect=$_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";
			
		}


		public static function modifier_question($id,$id_quiz,$id_module,$titre,$rep1,$rep2,$rep3,$rep4,$bonne_reponse)
		{


			// if ($titre=='Questionnaire introductif') {
			// 	if (!empty($bonne_reponse)) {
			// 		if ($bonne_reponse==$rep1 || $bonne_reponse==$rep2 || $bonne_reponse==$rep3 || $bonne_reponse==$rep4){
			// 			$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET bonne_reponse=? WHERE id=?");
			// 		$requette->execute(array($bonne_reponse,$id));

			// 			}else{
			// 			echo "<p class='alert alert-danger'> La réponse ne correspont à aucune evenuelle réponse.</p>";
			// 			}

			// 	}else{
			// 		echo "<p class='alert alert-danger'>Le champ (la bonne réponse) est obligatoire.</p>";
			// 	}
			// }else{
			// 	$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET bonne_reponse=? WHERE id=?");
			// 	$requette->execute(array($bonne_reponse,$id));
			// }



			// if (isset($bonne_reponse)) {
			// 	if ($bonne_reponse==$rep1 || $bonne_reponse==$rep2 || $bonne_reponse==$rep3 || $bonne_reponse==$rep4){
			// 		$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET bonne_reponse=? WHERE id=?");
			// 		$requette->execute(array($bonne_reponse,$id));

			// 	}else
			// 	{
			// 		Fonctions::set_flash('La réponse ne correspont à aucune evenuelle réponse','danger');
			// 		$redirect=$_SERVER['REQUEST_URI'];
			// 		echo "<script>window.location ='$redirect';</script>";
			// 	}
			// }


			if (isset($titre)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET titre=? WHERE id=?");
				$requette->execute(array($titre,$id));
			}

			if (isset($rep1)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET rep1=? WHERE id=?");
				$requette->execute(array($rep1,$id));
			}

			if (isset($rep2)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET rep2=? WHERE id=?");
				$requette->execute(array($rep2,$id));
			}

			if (isset($rep3)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET rep3=? WHERE id=?");
				$requette->execute(array($rep3,$id));
			}

			if (isset($rep4)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET rep4=? WHERE id=?");
				$requette->execute(array($rep4,$id));
			}

			if (isset($bonne_reponse)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE questions_quiz SET bonne_reponse=? WHERE id=?");
				$requette->execute(array($bonne_reponse,$id));
			}

			Fonctions::set_flash('Question  modifiée avec succès','success');
			$redirect=$_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";
	
		}

		public static function reponse_quiz($id_user,$id_module,$question,$choix,$reponse){
			$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO reponse_quiz(id_participant,id_module,id_question,choix,reponse,date_post)VALUES (?,?,?,?,?,NOW())");
			$requette->execute(array($id_user,$id_module,$question,$choix,$reponse));
			
		}
		
		public static function verif_module($id_module,$id_user){

			 $requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM reponse_quiz WHERE id_module=? AND id_participant=?");
			$requette->execute(array($id_module,$id_user));
			// si il nya pas de question repond
			return $count1=$requette->rowCount();
		}


		public static function resultat_quiz_vrai($id_user,$id_module){
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM reponse_quiz WHERE id_participant=? AND id_module=? AND reponse=?");
			$req->execute(array($id_user,$id_module,1));
			return $reponse_vrai=$req->rowCount();
		}

		// verifier les reponses 
		public static function reponse($id_user,$id_module,$id_question){
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM reponse_quiz WHERE id_participant=? AND id_module=? AND id_question=?");
			$req->execute(array($id_user,$id_module,$id_question));
			$data=$req->fetch(PDO::FETCH_OBJ);
			return $data;
		}

		public static function resultat_quiz($id_user,$id_module){
			$question_total= Query::count_prepare('questions_quiz',$id_module,'id_module');

			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM reponse_quiz WHERE id_participant=? AND id_module=? AND reponse=?");
			$req->execute(array($id_user,$id_module,1));
			$reponse_vrai=$req->rowCount();
			// verifier le quiz
			$quiz_test=Query::affiche('quiz',$id_module,'id_module');
			if ($question_total>0) {
				return number_format($reponse=$reponse_vrai*100/$question_total,2) ;
			}
			
		}

		public static function sondage($id_user,$sexe,$gwoup,$mwayen,$enterese,$kondisyon,$vote,$rezon_vote,$sitiyasyon,$rezon_sitiyasyon_vote){


			if (!isset($vote)) {
					$vote='';
				}

				if (!isset($sitiyasyon)) {
					$sitiyasyon='';
				}

				if (!isset($rezon_vote)) {
					$rezon_vote='';
				}

				if (!isset($rezon_sitiyasyon_vote)) {
					$rezon_sitiyasyon_vote='';
				}

				// verifier si on a deja remplis ce form
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM sondage WHERE id_participant=?");
				$req->execute(array($id_user));
				$count=$req->rowCount();
				if ($count==0) {
					$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO sondage(id_participant,1_sexe,2_group_laj,3_mwayen_enfomasyon,4_enteresman,5_kondisyon,5_1_repons_vote,rezon_5_1,6_stiyasyon,rezon_6,date_post)VALUES (?,?,?,?,?,?,?,?,?,?,NOW())");
					$requette->execute(array($id_user,$sexe,$gwoup,$mwayen,$enterese,$kondisyon,$vote,$rezon_vote,$sitiyasyon,$rezon_sitiyasyon_vote));
					Fonctions::set_flash('Questionnaire validé avec succès','success');
					$redirect=$_SERVER['REQUEST_URI'];
					echo "<script>window.location ='$redirect';</script>";
				}else{
					echo "<p class='alert alert-danger'> Vous avez déjà rempli ce formulaire</p>";
				}
		}


		public static function pass_module($id_user,$id_formation){
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant_resultat_module WHERE id_participant=? AND id_formation=?");
			$req->execute(array($id_user,$id_formation));
			return $count = $req->rowCount();
		}

		public static function select_quiz($id_module){
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM quiz WHERE etat=? AND id_module=?");
			$req->execute(array(1,$id_module));
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public static function statut($statut,$id_module){

			$id=$_GET['id'];
			$module=$_GET['module'];
			$formations=Query::affiche('formation',$id,'id');
			$modules=Query::affiche('module_formation',$module,'id');

			if($formations AND $modules){
				$req=class_bdd::connexion_bdd()->prepare("UPDATE quiz SET etat=? WHERE id_module=?");
				$req->execute(array($statut,$id_module));
				Fonctions::set_flash("Statut changé avec succès",'success');
				header("Location:?page=module&id=$formations->id&module=$modules->id");
			}else{
				Fonctions::set_flash("Un problème s'est produit, Réesayer",'danger');
				header("Location:?page=formations");
			}

			// ?page=module&id=18041&module=19081


			

			

			
		}

	}


?>