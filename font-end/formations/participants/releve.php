<?php
session_start();
ob_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
require('admin/class/bdd/bdd.php');
require('font-end/assets/plugins/fpdf/fpdf.php');
require('font-end/layout/config.php');
require 'admin/class/Module.php';
require 'admin/class/Formation.php';
require 'admin/class/Quiz.php';

// ajouter les fonctions identiques
require 'admin/class/Fonctions.php';
// module des requettes 
require 'admin/class/Query.php';

class MyPdf extends FPDF
{

    function header()
    {
        $url = '';
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
        }


        // rechercher la formation
        $formation = Query::affiche('formation', $url[1], 'id');
        // selsctionner le participant
        $participant = Query::affiche('participant', $url[2], 'id');

        if (!$participant) {
            $this->SetFont('times', 'B', 20);
            $this->Cell(0, 151, '' . utf8_decode("Cet étudiant n'existe pas "), 0, 0, 'C');
            $this->Ln(10);
        } else {
            if ($formation->id == 18041) {
                $this->image('font-end/assets/base/img/dossier/releve.jpg', 10, 11, 198);
            } else {
                $this->image('font-end/assets/base/img/dossier/releve.png', 10, 11, 198);
            }

            $this->SetTextColor(249, 96, 52);
            $this->SetFont('times', 'B', 18);
            $this->Cell(0, 120, '' . utf8_decode(" " . $participant->prenom . " " . $participant->nom), 0, 0, 'C');
        }
    }


    function headerTable()
    {
        $url = '';
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
        }


        // rechercher la formation
        $formation = Query::affiche('formation', $url[1], 'id');
        $this->SetFont('Times', 'b', 12);
        $this->Ln(85);

        $this->Cell(1, 0);
        $this->Cell(170, 6, utf8_decode('Modules'), 1, 0, 'L');

        $this->Cell(25, 6, 'Note sur 100', 1, 0, 'L');
        $this->Ln();
    }

    function viewTable()
    {
        $url = '';
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
        }

        $formation = Query::affiche('formation', $url[1], 'id');
        $this->SetFont('Times', '', 13);
        $this->SetTextColor(0, 0, 0);
        // selctionner les modules
        foreach (Module::liste($url[1]) as $module) {
            // selectionner les quiz
            $quiz_test = Query::affiche('quiz', $module->id, 'id_module');
            // calcu;e des notes
            $note = Quiz::resultat_quiz($url[2], $module->id);
            // module note
            if ($module->titre != 'Introduction') {
                $this->Cell(1, 0);
                $this->Cell(170, 6, iconv('UTF-8', 'windows-1252', $module->titre), 1, 0, 'L');
            // couleur les note 
                if (!isset($quiz_test->nom)) {
                    $note = '';
                }

                $this->Cell(25, 6, $note, 1, 0, 'L');
                $this->Ln();
            }


        }

    }


}

$nom = 'releve de notes' . ".pdf";
$pdf = new MyPdf();
$pdf->AddPage('P', 'Letter', 0);
$pdf->SetFont('Arial', 'B', 16);
$pdf->headerTable();
// $pdf->White();
$pdf->viewTable();
$pdf->Output('I', $nom);

?>
