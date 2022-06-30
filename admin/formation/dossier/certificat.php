<?php
session_start();
ob_start();
require '../font-end/assets/plugins/fpdf/fpdf.php';
require '../font-end/layout/config.php';
require 'class/Module.php';
require 'class/Formation.php';
require 'class/Quiz.php';
require 'class/bdd/bdd.php';
// ajouter les fonctions identiques
require 'class/Fonctions.php';
// module des requettes 
require 'class/Query.php';

class MyPdf extends FPDF
{


    function header()
    {

        // rechercher la formation
        $formation = Query::affiche('formation', $_GET['id'], 'id');
        // selsctionner le participant
        $participant = Query::affiche('participant',  $_GET['participant'], 'id');

        if (!$participant) {
            $this->SetFont('times', 'B', 20); 
             // $this->Cell(0,151,''.utf8_decode('kf'." ".kfk),0,0,'C');

            $this->Cell(0, 151, '' . utf8_decode("Cet étudiant n'existe pas "), 0, 0, 'C');
            $this->Ln(10);
        }

        // veridier si on passe tous les modules
        $module_total = Query::count_prepare('module_formation', $formation->id, 'id_formation');

        // verifier la quantite de quiz passe
        $module_total = Module::count($formation->id);
        $module_passe = Quiz::pass_module($_GET['participant'], $formation->id);

        if ($module_total == $module_passe && $participant) {

            $this->image('../font-end/assets/base/img/dossier/certificat.jpg', 0, 0, 280);
            $date_debut = Fonctions::format_date($formation->date_debut);
            $date_fin = Fonctions::format_date($formation->date_fin);
            $date = date('Y')."-".date('m')."-".date('d');
            $date_final = Fonctions::format_date($date);
            $formation = iconv("UTF-8", "CP1250//TRANSLIT", $formation->titre);
            $participant_ = iconv("UTF-8", "CP1250//TRANSLIT", $participant->nom_complet);



            $text = utf8_decode("Pour avoir complété avec succès le séminaire de formation sur le thème « ") . $formation . utf8_decode(" » offert en ligne par la JURIMEDIA du $date_debut au $date_fin");

            // $this->SetTextColor(249, 96, 52);
            
            // $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,\n\n sed do eiusmod tempor incididunt ";
            $this->SetFont('times', '', 14);
            $this->SetTextColor(0, 0, 0);
            if($participant->sexe=="Homme"){$statut = "monsieur";}else{$statut = "madame";}
            $this->Cell(0, 114, '' . utf8_decode("Décerné à ".$statut), 0, 0, 'C');
            $this->SetFont('times', 'B', 18);
            $this->ln(10);

            $this->SetTextColor(249, 96, 52);
            $this->Cell(0, 110, '' . utf8_decode($participant_), 0, 0, 'C');
            $this->ln(70);
            $this->SetFont('times', '', 16);
            $this->SetTextColor(0, 0, 0);
            $this->Multicell(250,8,$text,4,"C"); 
            $this->ln(10);
            $this->SetFont('times', 'I', 14);
            $this->Multicell(250,13, utf8_decode ("Fait à Cap-Haitien, le  $date_final "),4,"C"); 
            $this->Ln(10);
            
        } else {
            // $this->SetTextColor(249,96,52);
            $this->SetFont('times', 'B', 12);
            $this->Cell(0, 151, '' . utf8_decode(" Pas de certificat"), 0, 0, 'C');
        }
    }

}

$url = '';
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

 // $participant=Query::affiche('participant',$url[2],'id');
 // $nom=$participant->prenom." ".$participant->nom.".pdf";

$pdf = new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'Letter', 0);
$pdf->SetFont('Arial', 'B', 16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I');

?>
