<?php
require 'vendor/autoload.php';
require '../../conexion/conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$producto=mysqli_query($con,"SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria");
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
$hoja->getStyle('B2:J2')->applyFromArray($styleArray);
$hoja->setTitle("Report Productos");
$hoja->mergeCells('B2:C2');
$hoja->getStyle("B2")->getFont()->setBold(true)->setItalic(1)->setSize(14);
$hoja->setCellValue('B2','TIENDA DE ABARROTES TO EAT');
$hoja->getColumnDimension('G')->setWidth(25);
$hoja->setCellValue('G2',$fecha.' - '.$hora);

$hoja->getStyle('B4:F4')->applyFromArray($styleArray);
$hoja->getStyle("B4:F4")->getFont()->setBold(true);

$hoja->getStyle('B4:F4')->applyFromArray($borde);
$hoja->getStyle('B4:F4')->applyFromArray($fondo);
$hoja->getStyle('B4:F4')->applyFromArray($text);

$hoja->getColumnDimension('B')->setWidth(10);
$hoja->setCellValue('B4','ID');
$hoja->getColumnDimension('C')->setWidth(60);
$hoja->setCellValue('C4','PRODUCTO');
$hoja->getColumnDimension('D')->setWidth(10);
$hoja->setCellValue('D4','PRECIO');
$hoja->getColumnDimension('E')->setWidth(10);
$hoja->setCellValue('E4','STOCK');
$hoja->getColumnDimension('F')->setWidth(18);
$hoja->setCellValue('F4','CATEGORÍA');

$fila=5;

while($rows=$producto->fetch_assoc()){

$hoja->getStyle('B'.$fila.':F'.$fila)->applyFromArray($borde);
$hoja->getStyle('B'.$fila)->applyFromArray($styleArray);
$hoja->getStyle('D'.$fila.':E'.$fila)->applyFromArray($styleArray);

$hoja->setCellValue('B'.$fila,$rows['id_producto']);
$hoja->setCellValue('C'.$fila,$rows['nombre_produ']);
$hoja->setCellValue('D'.$fila,'S/ '.number_format($rows['precio_produ'],2,".",","));
$hoja->setCellValue('E'.$fila,$rows['stock']);
$hoja->setCellValue('F'.$fila,$rows['nombre_cat']);
$fila++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteProductos.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;