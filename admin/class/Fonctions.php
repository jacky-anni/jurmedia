<?php

class Fonctions
{

	// message flash
	public static function set_flash($message,$type='info')
	{
		$_SESSION['notification']['message']=$message;
		$_SESSION['notification']['type']=$type;
	}

	// utilisateur adminstrateur
	public static function utilisateur()
	{
		if (isset($_SESSION['id'])) {
			$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM utilisateur WHERE id=?");
			$requette->execute(array($_SESSION['id']));
			$user=$requette->fetch(PDO::FETCH_OBJ);
			return $user;
		}
	}

	//hestion de rediretion
	public static function redirect_admin()
	{
		if (!isset($_SESSION['id'])) {
			$_SESSION['redirec_url_admin']=$_SERVER['REQUEST_URI'];
		 	Fonctions::set_flash('Vous devez être connecté pour voir cette page','success');
		 	header("Location:?page=login");
		 }
	}

	// participant
	public static function user()
	{
		if (isset($_SESSION['id_user'])) {
			$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant WHERE id=?");
			$requette->execute(array($_SESSION['id_user']));
			$user=$requette->fetch(PDO::FETCH_OBJ);

			if($user->id==$_SESSION['id_user']){
				return $user;
			}else{
				require 'font-end/layout/config.php';
				self::redirect();
			}
			
		}
	}

	//hestion de rediretion
	public static function redirect()
	{
		require 'font-end/layout/config.php';
		if (!isset($_SESSION['id_user'])) {
			$_SESSION['redirec_url']=$_SERVER['REQUEST_URI'];
		 		Fonctions::set_flash('Vous devez être connecté pour voir cette page','success');
		 		echo "<script>window.location ='$link_menu/connexion';</script>";
		 }
	}

	// formatter date en francais.
	public static function format_date($date){
		 $dateMySQL = $date;
	      //objet DateTime correspondant :
		 try
			{
		      $date = new DateTime($dateMySQL);
		      $NomDuMois = array ("","Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
		      // $ok= $date->format('d-m-Y')."</br>";
		      $jour= $date->format('d');
		      $annee= $date->format('Y');
		      $mois= $date->format('n');
		      $date= $jour."  ".$NomDuMois[$mois]."  ".$annee;
		      return $date;
			}
		catch(Exception $PDO)
		{
			echo "<b>Cette date n'est pas valide</b>";
		}

	}

	// affichage de mois
	public static function mois($mois)
	{
		if ($mois>=1 && $mois <=12) {
			$NomDuMois = array ("","Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
			return $NomDuMois[$mois];
		}else{
			echo "<b>Cette date n'est pas valide</b>";
		}
		
	}

	// caluclul de jours restant
	public static function calcul_jour($table,$date1,$date2,$identifiant){
		 $requette=class_bdd::connexion_bdd()->prepare("SELECT DATEDIFF($date1,$date2) FROM $table WHERE id=?");
          $requette->execute(array($identifiant));
          $date_Passe=$requette->fetch();
         return $date_Passe["DATEDIFF($date1,$date2)"];
	}

	// gestion abonnee
	public static function abonnee($nom,$prenom,$email,$reference=''){
		if(!empty($email))
		{
				// si l'abonne existe
			$exist= Query::count_prepare('abonnee',$email,'email');
		    if (!$exist) {
		    	$count= Query::count_query('abonnee');
				 $id1=$count+1;
				 $id=rand(1000,1999).$id1;
		    	$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO abonnee (id,nom,prenom,email,date_post)VALUES(?,?,?,?,NOW())");
		    	$requette->execute(array($id,$nom,$prenom,$email));
		    	if(empty($reference)){
		    		Fonctions::set_flash('Abonnée()) enregistré (e)','success');
					header("Location:?page=liste-des-abonnés");
		    	}
		    }

		    if($exist AND !empty($reference)){
		    	$user= Query::affiche('abonnee',$email,'email');
		    	$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM abonnement WHERE id_abonnee=? AND reference= ?");
		    	$requette->execute(array($user->id,$reference));
		    	$check=$requette->rowCount();
		    	if (!$check) {
		    		$requette1=class_bdd::connexion_bdd()->prepare("INSERT INTO abonnement (id_abonnee,reference,date_post)VALUES(?,?,NOW())");
		    		$requette1->execute(array($user->id,$reference));
		    		echo "<script>alert('vous etes abonné (e)');</script>";
		    	}else{
		    		echo "<script>alert('Abonnement a déjà existé');</script>";
		    	}
		    }elseif ($exist AND empty($reference)) {
		    	echo "<script>alert('Cet utilisateur a déjà abonné (e)');</script>";
		    }
		}
		
	}

// envoie des mail
	public static function mail($name,$subject,$email_address,$message){
		// selectionner l'email
        if (!empty($name) AND !empty($subject) AND !empty($email_address) AND !empty($message)) {
        	$org=Query::affiche('organisation',1,'id');
            $email_address = $email_address;
            $message = $message;
                
            // Create the email and send the message
            $to = $org->email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
            $email_subject = $subject."Nouveau message de :  $name\n\n";
            $email_body = $message;
            $headers = "From: $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
            $headers .= "Reply-To: $email_address"; 
            mail($to,$email_subject,$email_body,$headers);
            echo '<h6 class="alert alert-success">Message envoyé avec succès</h6>';
            return true; 

            // // Create the email and send the message
            // $to = $org->email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
            // $subject = "$subject\n\n";
            // $email_address=$email_address;
            // $Msg = $message;
            // $headers = "From: $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
            // $headers .= "Reply-To: $email_address"; 
            // mail($to,$email_address,$subject,$Msg,$headers);
            // // mail($to,$email_subject,$email_body,$headers);
            // echo '<h6 class="alert alert-success">message envoyé avec succès</h6>';
            // return true;    
        }
        else
        {
            echo '<h6 class="alert alert-danger">Veuiller remplir tous les champs</h6>';
        }
	}

	// gestion dure entre 2 deux date
	public static function duree($date_debut,$date_fin){
		$date1 = new DateTime($date_debut);
		$date2 = new DateTime($date_fin);
		$interval = $date1->diff($date2);

		if($interval->y>1){echo $interval->y."  ans,  ";}elseif ($interval->y==1) {echo $interval->y."  an,  ";}

		if($interval->m>1){echo $interval->m."  mois,  ";}elseif ($interval->m==1) {echo $interval->m."  mois,  ";}

		if($interval->d>1){echo $interval->d."  jours  ";}elseif ($interval->d==1) {echo $interval->d."  jour  ";} 
	}


	// verifye si ou we publikasyon
	public static function count_element($id_participant,$id_element,$element){
		$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM vue_element WHERE id_participant=? AND id_element=? AND element=?");
		$requette->execute(array($id_participant,$id_element,$element));
		return $exist=$requette->rowCount();
	}

	public static function vue_element($id_participant,$id_element,$element){
		$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM vue_element WHERE id_participant=? AND id_element=? AND element=?");
		$requette->execute(array($id_participant,$id_element,$element));
		$exist=$requette->rowCount();
		if (!$exist) {
			$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO vue_element(id_participant,id_element,	element,date_post) VALUES(?,?,?,NOW())");
			$requette->execute(array($id_participant,$id_element,$element));
		}
	}

	public static function slug($text)
	{ 
		$text = iconv('utf-8', 'us-ascii//IGNORE', $text);
		// $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $text));
		return $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-’]+/', '-', $text)));
	}

}