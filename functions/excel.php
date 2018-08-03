<?php

include_once 'getFunctions.php';
require_once '../includes/Classes/PHPExcel.php';
//include_once 'functions.php';
include_once 'chartFunctions.php';

$_fromDate = $_GET['fromDate'];
$_toDate = $_GET['toDate'];
$_type = $_GET['type'];
$_level = $_GET['level'];
$_value = $_GET['value'];
$_title = $_GET['title'];
$_value2 = "";
$_valueCheck = "";
if(isset($_GET['value2'])){  $_value2 = $_GET['value2'];}
if(isset($_GET['valueCheck'])){  $_valueCheck = $_GET['valueCheck'];}
 $_value2;
 $_valueCheck;
$data2 ="";

// if(isset($_GET['valueCheck'])){
  
//   $data2 = getSecondLevel($_valueCheck, $_value2);
//   //print_r($data2);
// }

$data = getExcelChart($_fromDate, $_toDate, $_type, $_value, $data2);
//print_r($data);

   $objPHPExcel = new PHPExcel();

   //Informacion del excel
   $objPHPExcel-> 
    getProperties()
        ->setCreator("IBM - Incident Tracker Shipping")
        ->setLastModifiedBy("IBM - Incident Tracker Shipping")
        ->setTitle("Tickets Report")
        ->setSubject($fec_ini." - ".$fec_fin)
        ->setDescription("Charts ".$nivel." level")
        ->setKeywords("Incident 2018")
        ->setCategory($tipo);    

   $i = 2;    
   $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Ticket')
    ->setCellValue('B1', 'Sales Order')
    ->setCellValue('C1', 'Autor')
    ->setCellValue('D1', 'Proceso')
    ->setCellValue('E1', 'Fecha de Creacion')
    ->setCellValue('F1', 'Responsable')
    ->setCellValue('G1', 'Fecha de Asignacion')
    ->setCellValue('H1', 'Resolvio')
    ->setCellValue('I1', 'Fecha de Solucion')
    ->setCellValue('J1', 'Descripcion del Problema')
    ->setCellValue('K1', 'Comentario de la Solucion')
    ->setCellValue('L1', 'Descripcion de la Solucion')
    ->setCellValue('M1', 'Error')
    ;
   $contador3 = 0;
   foreach ($data as $value) {

       $contador3+=1;
/*        $fec_ter3 = date("d-m-Y",strtotime($registro->fec_inicio));
        $hora_ter3 = date("H:i",strtotime($registro->fec_termina));
        $hora_asi3 = date("H:i",strtotime($registro->fec_asigna));
        $hora_ini3 = date("H:i",strtotime($registro->fec_inicio));*/

      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, "TC".$value['id'])
            ->setCellValue('B'.$i, $value['sales_order'])
            ->setCellValue('C'.$i, $value['Autor'])
            ->setCellValue('D'.$i, $value['proceso_name'])
            ->setCellValue('E'.$i, $value['fec_creacion'])
            ->setCellValue('F'.$i, $value['Responsable'])
            ->setCellValue('G'.$i, $value['fec_asignacion'])
            ->setCellValue('H'.$i, $value['Resolvio'])
            ->setCellValue('I'.$i, $value['fec_solucion'])
            ->setCellValue('J'.$i, $value['descripcion_problema'])
            ->setCellValue('K'.$i, $value['comentario_solucion'])
            ->setCellValue('L'.$i, $value['descripcion_solucion'])
            ->setCellValue('M'.$i, $value['error_name'])
            ;
 
      $i++;

    }

$objPHPExcel->getActiveSheet()->setTitle('Solved Tickets');
$objPHPExcel->setActiveSheetIndex(0);

$val_name = "";
if($_level == 2){$val_name = $_value;}

$archivo = $val_name."_".str_replace(" ", "_", $_title);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='.$archivo.'');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;

//$db2->db_close();
?>