<?php
	
	/**
	 * 
	 */
	class Document
	{
		private $description;
		private $reference;
		private $document;
		
		function __construct($description,$reference,$document)
		{
			$description=ucfirst(htmlspecialchars($description));
			$reference=htmlspecialchars($reference);
			$document=htmlspecialchars($document);

			// initialisation
			$this->description=$description;
			$this->reference=$reference;
			$this->document=$document;

			// initialisation de la base de donnée
			$this->bdd=class_bdd::connexion_bdd();

		}

		public function ajouter()
		{
			
			if (!empty($this->document)) {
				$nom_document=time().Query::Count_query('document');
				copy($_FILES['document']['tmp_name'], 'dist/document/'.$nom_document.".pdf");
			}
			
				$requette=$this->bdd->prepare("INSERT INTO document(nom,document,reference,posteur,date_post)VALUES (?,?,?,?,NOW())");
				$requette->execute(array($this->description,$nom_document.".pdf",$this->reference,$_SESSION['id']));
				Fonctions::set_flash('Document enregistré avec succès !','success');
				$redirect=$_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$redirect';</script>";
		}


		public function modifier($id)
		{
			if (isset($this->description)) {
				
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE document SET nom=? WHERE id=?");
				$requette->execute(array($this->description,$id));
			}

			if (isset($this->document) AND !empty($this->document)) {
				$nom_document=$_FILES['document']['name'];
				copy($_FILES['document']['tmp_name'], 'dist/document/'.$nom_document);

				$requette=class_bdd::connexion_bdd()->prepare("UPDATE document SET document=? WHERE id=?");
				$requette->execute(array($this->document,$id));
			}

			Fonctions::set_flash('Document modifié avec succès','success');
			$redirect=$_SERVER['REQUEST_URI'];
			echo "<script>window.location ='$redirect';</script>";
		}



	}

?>