
<?php 


require('fpdf\fpdf.php');

//Conecto a la base de datos
include('../conexion.php');


class PDF extends FPDF
{


} 
        $ID = $_REQUEST['id'];
        $consulticket = "SELECT DISTINCTROW id_ticket, zona, ubicacion, licencia, celular, correo, descripcion, solicitante, DATE_FORMAT(fch_ini, '%m/%d/%Y') AS fecha, DATE_FORMAT(fch_ini, '%H:%i:%s') AS hora, NOM_SITIO, ticket.tipo, ticket.altura FROM trabajos LEFT JOIN servicios ON trabajos.id_trabajo = servicios.id LEFT JOIN ticket ON trabajos.id_ticket = ticket.id_tickets LEFT JOIN ubicaciones ON ticket.ciudad = ubicaciones.ID_UB WHERE id_ticket = '$ID'";
        $resulticket = $mysqli->query($consulticket);
        //Instaciamos la clase para genrear el documento pdf
        $pdf=new FPDF();

        //Agregamos la primera pagina al documento pdf
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',7);

        //Seteamos el inicio del margen superior en 25 pixeles

        /*$y_axis_initial = 25;*/

        //Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
        $pdf->SetFont('Arial','B',8);

        $pdf->Image('../img/Captura.jpg', 5, 5, 200);
        
       

        while($rowT = $resulticket->fetch_assoc())
        {
            $zona=$rowT['zona'];
            $altura=$rowT['altura'];
            $ubicacion=$rowT['ubicacion'];
            $licencia=$rowT['licencia'];
            $tipo=$rowT['tipo'];
            $id_ticket=$rowT['id_ticket'];
            $fecha=$rowT['fecha'];
            $celular=$rowT['celular'];
            $correo=$rowT['correo'];
            $descripcion=$rowT['descripcion'];
            $nombre=$rowT['solicitante'];
            $hora=$rowT['hora'];
            $sitio=$rowT['NOM_SITIO'];		
          

                switch ($zona) {
                    case '1':
                        $lugar = 'Merida';
                        $ciudad = 'Merida';
                        $titular = 'Obed Castillo Medida';
                        break;
                    case '2':
                        $lugar = 'Cancun';
                        $ciudad = 'Cancun';
                        $titular = 'Guillermo Centeno Medina';
                        break;
                    case '3':
                        $lugar = 'Ticul';
                        $ciudad = 'Ticul';
                        $titular = 'Luis Fernando Morales Rodriguez';
                        break;
                    case '4':
                        $lugar = 'Campeche';
                        $ciudad = 'Campeche';
                        $titular = 'Roberto Castillo Miranda';
                        break;
                    case '5':
                        $lugar = 'Carmen';
                        $ciudad = 'Carmen';
                        $titular = 'Alejandro Muñoz Ramirez';
                        break;
                    case '6':
                        $lugar = 'Tizimin';
                        $ciudad = 'Tizimin';
                        $titular = 'Geronimo Perez Avilez';
                        break;
                    case '7':
                        $lugar = 'Chetumal';
                        $ciudad = 'Chetumal';
                        $titular = 'Victor Zapata Matos';
                        break;
                    case '8':
                        $lugar = 'Motul';
                        $ciudad = 'Motul';
                        $titular = 'Mauro de la Cruz Herrera';
                        break;
                    case '9':
                        $lugar = 'Riviera Maya';
                        $ciudad = 'Riviera Maya';
                        $titular = 'Victor Emanuel Valencia Diaz';
                        break;
                  }


 

        $pdf->Ln(20);
        $pdf->Cell(137.5,20,'SERVICIO DE MANTENIMIENTO A TORRES DE COMUNICACION',0,0,'C',0);
        $pdf->Cell(22.5,6,'Fecha',1,0,'L',0);
        $pdf->Cell(35,6,date('d/m/Y'),1,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(137.5,6,'',0,0,'C',0);
        $pdf->Cell(22.5,6,'Ticket',1,0,'L',0);
        $pdf->Cell(35,6,"$id_ticket",1,0,'C',0);
        $pdf->Ln(6);
        $pdf->Cell(137.5,6,'',0,0,'C',0);
        $pdf->Cell(22.5,6,'Tecnico',1,0,'L',0);
        $pdf->Cell(35,6,'',1,0,'C',0);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(200,6,'DATOS DE LA ZONA PENINSULAR',0,0,'C',0);
        $pdf->Ln(6);
        $pdf->SetFont('Arial','B',7);
        $pdf->SetFillColor(150,150,150);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(20,6,'ZONA:',1,0,'C',1);
        $pdf->Cell(46,6,"$lugar",1,0,'C');
        $pdf->Cell(25,6,'TITULAR:',1,0,'C',1);
        $pdf->Cell(100,6,"$titular",1,0,'C');
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(20,6,'SITIO:',1,0,'C',1);
        $pdf->Cell(46,6,"$sitio",1,0,'C');
        $pdf->Cell(25,6,'UBICACION:',1,0,'C',1);
        $pdf->Cell(100,6,"$ubicacion",1,0,'C');
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(25,6,'REFERENCIA:',1,0,'C',1);
        $pdf->Cell(41,6,"$licencia",1,0,'L');
        $pdf->Cell(25,6,'TIPO:',1,0,'C',1);
        $pdf->Cell(50,6,"$tipo",1,0,'C');
        $pdf->Cell(25,6,'ALTURA:',1,0,'C',1);
        $pdf->Cell(25,6,"$altura",1,0,'C');
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(30,6,'SOLICITANTE:',1,0,'C',1);
        $pdf->Cell(111,6,"$nombre",1,0,'C');
        $pdf->Cell(25,6,'FECHA:',1,0,'C',1);
        $pdf->Cell(25,6,"$fecha",1,0,'C');
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(30,6,'CELULAR:',1,0,'C',1);
        $pdf->Cell(31,6,"$celular",1,0,'C');
        $pdf->Cell(25,6,'CORREO:',1,0,'C',1);
        $pdf->Cell(55,6,"$correo",1,0,'C');
        $pdf->Cell(25,6,'HORA:',1,0,'C',1);
        $pdf->Cell(25,6,"$hora",1,0,'C');
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(30,20,'DESCRIPCION',1,0,'C',1);
        $pdf->Cell(161,20,"$descripcion",1,0,'C');
        $pdf->Ln(20);
        $pdf->Cell(145,6,'                                       CATALOGO DE CONCEPTOS PARA MANTENIMIENTO DE TORRES',0,0,'C',0);

        //$pdf->Cell(46,6,date('d/m/Y'),1,0,'C');

        $pdf->Ln(5);
    }


        //Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',6);
        $pdf->cell(-6,10,'',0,0,'C');
       // $pdf->Cell(5,6,'#',1,0,'C',1);
        $pdf->Cell(151,6,'Descripcion',1,0,'C',1);
        $pdf->Cell(15,6,'Cant',1,0,'C',1);
        $pdf->Cell(15,6,'Precio',1,0,'C',1);
        $pdf->Cell(15,6,'Precio Total',1,0,'C',1);





        $pdf->Ln(6);

        //Comienzo a crear las fiulas de productos según la consulta mysql
        $consulta = "SELECT * FROM trabajos LEFT JOIN servicios ON servicios.id = trabajos.id_servicio LEFT JOIN ticket ON ticket.id_tickets = trabajos.id_ticket  WHERE id_ticket = '$ID'";
        $result = $mysqli->query($consulta);

            $subtotal = 0;
            $iva = 0;
            $cont=0;
        while($row = $result->fetch_assoc())
        {
            $pt = 0;
            $cont = $cont + 1;

            $id_ticket=$row['id_ticket'];
            $servicios=$row['servicio'];
            $img1 = "img/".$row['foto1'];
            $img2 = "img/".$row['foto2'];
           // $id_serv= $row['id'];
            $cantidad=$row['cantidad'];
            $precio=$row['precios'];

            $pt= $cantidad * $precio;
            


            $pdf->cell(-6,6,"",0,0,'L');
           // $pdf->Cell(5, 6,$id_serv,1,0,'C',0);
            $pdf->Cell(151, 6,$servicios,1,0,'L',0);
            $pdf->Cell(15, 6,$cantidad,1,0,'L',0);
            $pdf->Cell(15, 6,'$'.number_format($precio,2).'',1,0,'L',0);
            $pdf->Cell(15, 6,'$'.number_format($pt,2).'',1,0,'L',0);
            $pdf->Ln(-2);
            $pdf->Cell(50, 50, $pdf->Image($img1, $pdf->GetX()+10, $pdf->GetY()+9, 35), 0, 0, 'C', false );
            $pdf->Cell(50, 50, $pdf->Image($img2, $pdf->GetX()+10, $pdf->GetY()+9, 35), 0, 0, 'C', false );
            $pdf->Cell(15, 6,"",0,0,'L',0);
            $pdf->Ln(60);

            $subtotal = $subtotal + $pt;
           
        }
            
            $iva = ($subtotal*0.16);
            $subtotal2 = $iva + $subtotal;
            $pdf->cell(162,6,"",0,0,'R');
            $pdf->Cell(15,6,'SUBTOTAL',1,0,'C',1);
            $pdf->Cell(15, 6,'$'.number_format($subtotal,2).'',1,0,'R',0);
            $pdf->Ln(6);
            $pdf->cell(162,6,"",0,0,'R');
            $pdf->Cell(15,6,'IVA %',1,0,'C',1);
            $pdf->Cell(15, 6,'$'.number_format($iva,2).'',1,0,'R',0);
            $pdf->Ln(6);
            $pdf->cell(162,6,"",0,0,'R');
            $pdf->Cell(15,6,'TOTAL',1,0,'C',1);
            $pdf->Cell(15, 6,'$'.number_format($subtotal2,2).'',1,0,'R',0);

        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(150,150,150);
        $pdf->Ln(6);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->Cell(35,20,'DESCRIPCION',1,0,'C',1);
        $pdf->Cell(156,20,"",1,0,'C');
        $pdf->Ln(20);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->cell(35,10,"Observaciones",1,0,'C',1);
        $pdf->cell(156,10,"",1,0,'C');
        $pdf->Ln(10);
        $pdf->cell(1,10,'',0,0,'C');
        $pdf->cell(35,6,"Fecha",1,0,'C',1);
        $pdf->cell(35,6,"",1,0,'C');
        $pdf->cell(45,6,"",0,0,'C');
        $pdf->cell(76,6,"PERSONAL QUE RECIBE EL SERVICIO",1,0,'C',1);
        $pdf->Ln(6);
        $pdf->cell(1,20,'',0,0,'C');
        $pdf->cell(70,20,"",1,0,'C');
        $pdf->cell(45,20,"",0,0,'C');
        $pdf->cell(76,20,"",1,0,'C');
        $pdf->Ln(20);
        $pdf->cell(1,6,'',0,0,'C');
        $pdf->cell(70,6,"Tecnico",1,0,'L');
        $pdf->cell(45,6,"",0,0,'C');
        $pdf->cell(76,6,"Nombre",1,0,'L');
        $pdf->Ln(6);
        $pdf->cell(1,6,'',0,0,'C');
        $pdf->cell(70,6,"Telefono",1,0,'L');
        $pdf->cell(45,6,"",0,0,'C');
        $pdf->cell(76,6,"Telefono",1,0,'L');
        $pdf->Ln(6);
    







    //Mostramos el documento pdf
$pdf->Output();

?>