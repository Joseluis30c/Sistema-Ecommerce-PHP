<?php
require 'vendor/autoload.php';
require '../../conexion/conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$categoria=mysqli_query($con,"SELECT * from categoria");
date_default_timezone_set('America/Lima');
$fecha=date("d/m/Y");
$hora=date('h:i A');

$styleArray = [

'alignment' => [

'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,

],

];

$borde = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
    ],
];
$fondo = [
    'font' => [

    ],
    'alignment' => [
    ],
    'borders' => [
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'color' => [
            'argb' => '0A0A0A',
        ],
    ],
];
$text = array(
    'font'  => array(
        'color' => array('rgb' => 'FFFFFF'),
    ));

$excel = new SpreadSheet();
$hoja=$excel->getActiveSheet();
$hoja->getStyle('B2:D2')->applyFromArray($styleArray);
$hoja->setTitle("Report Categorías");
$hoja->mergeCells('B2:C2');
$hoja->getStyle("B2")->getFont()->setBold(true)->setItalic(1)->setSize(12);
$hoja->setCellValue('B2','TIENDA DE ABARROTES TO EAT');
$hoja->getColumnDimension('D')->setWidth(25);
$hoja->setCellValue('D2',$fecha.' - '.$hora);


$hoja->getColumnDimension('B')->setWidth(10);
$hoja->getStyle('B4:C4')->applyFromArray($styleArray);

$hoja->getStyle("B4:C4")->getFont()->setBold(true);
$hoja->setCellValue('B4','ID');
$hoja->getColumnDimension('C')->setWidth(25);
$hoja->setCellValue('C4','CATEGORÍA');

$fila=5;
$hoja->getStyle('B4:C4')->applyFromArray($borde);
$hoja->getStyle('B4:C4')->applyFromArray($fondo);
$hoja->getStyle('B4:C4')->applyFromArray($text);
while($rows=$categoria->fetch_assoc()){
$hoja->getStyle('B'.$fila.':C'.$fila)->applyFromArray($borde);
$hoja->getStyle('B'.$fila.':C'.$fila)->applyFromArray($styleArray);
$hoja->setCellValue('B'.$fila,$rows['id_categoria']);
$hoja->setCellValue('C'.$fila,$rows['nombre_cat']);
$fila++;
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteCategorias.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;