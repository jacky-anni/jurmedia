<?php
require('font-end/assets/plugins/fpdf/fpdf.php');
require 'admin/class/Module.php';
require 'admin/class/Formation.php';
require 'admin/class/Quiz.php';
require('admin/class/bdd/bdd.php');
// ajouter les fonctions identiques
require 'admin/class/Fonctions.php';
// module des requettes 
require 'admin/class/Query.php';




class MyPdf extends FPDF
{

    function header()
    {
        // $this->image('font-end/assets/plugins/fpdf/logo.png',15,10,190);
        $this->Ln(30);  
    }

    function headerTable()
    {
        $this->Ln(30);
        $this->SetFont('Times','b',12);
        $this->Cell(10,0);
        $this->Cell(140,6,utf8_decode('Modules'),1,0,'L');

        $this->Cell(25,6,'Note',1,0,'L');
        $this->Ln();
    }

    function viewTable()
    {
        $url='';
        if (isset($_GET['url'])) {
            $url=explode('/', $_GET['url']);
        }
        
        $formation=Query::affiche('formation',$url[1],'id');
        $this->SetFont('Times','',12);
        $this->SetTextColor(0,0,0);
        // selctionner les modules
        foreach (Module::liste($url[1]) as $module ){
            // selectionner les quiz
            $quiz_test= Query::affiche('quiz',$module->id,'id_module');
            // calcu;e des notes
            $note= Quiz::resultat_quiz($url[2],$module->id);
            // module note
            if($module->titre=='Introduction' ){
                $note="100";
            }




            $this->Cell(10,0);
            $this->Cell(140,6,utf8_decode($module->titre),1,0,'L');
            // couleur les note 
            if (!isset($quiz_test->nom)){
               $note='';
            }

              if ($note<60) {
                $this->SetTextColor(237,28,36);
                $this->Cell(25,6,$note,1,0,'L');
               }
               else
               {
                $this->Cell(25,6,$note,1,0,'L');
               }
            $this->Ln();
        }

    }


    function footer()
    {
        
    }


    


}

$nom='biwww'.".pdf";

$pdf=new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter',0);
$pdf->SetFont('Arial','B',16);
$pdf->headerTable();
// $pdf->White();
$pdf->viewTable();
$pdf->Output('I',$nom);
$pdf->Output();

?>