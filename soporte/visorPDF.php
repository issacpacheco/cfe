<?php 
    
    require('fpdf\fpdf.php');

    //Conecto a la base de datos
    include('../conexion.php');


    class PDF extends FPDF
    {


    }
    $pdf=new FPDF();
    $pdf->Close('I','pdf/COT-Transmed.pdf');

?>