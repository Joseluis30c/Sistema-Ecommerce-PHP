<?php
require 'vendor/autoload.php';
require '../../conexion/conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$usuario=mysqli_query($con,"SELECT v.id_ped, v.fecha,v.total, c.nombre_cli,c.apellido_cli FROM pedidos v INNER JOIN usu_cliente c on v.id_cli=c.id_usu_cli");

$detalle=mysqli_query($con,"SELECT d.id_ped, p.nombre_produ,d.precio, d.cantidad FROM detalle_ped d INNER JOIN productos p on d.id_pro=p.id_producto");

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
$hoja->setTitle("Report Ventas");
$hoja->mergeCells('B2:D2');
$hoja->getStyle("B2")->getFont()->setBold(true)->setItalic(1)->setSize(14);
$hoja->setCellValue('B2','TIENDA DE ABARROTES TO EAT');
$hoja->getColumnDimension('F')->setWidth(25);
$hoja->setCellValue('F2',$fecha.' - '.$hora);

$hoja->getStyle('B4:E4')->applyFromArray($styleArray);
$hoja->getStyle("B4:E4")->getFont()->setBold(true);

$hoja->getStyle('B4:E4')->applyFromArray($borde);
$hoja->getStyle('B4:E4')->applyFromArray($fondo);
$hoja->getStyle('B4:E4')->applyFromArray($text);

$hoja->getColumnDimension('B')->setWidth(10);
$hoja->setCellValue('B4','ID PED.');
$hoja->getColumnDimension('C')->setWidth(15);
$hoja->setCellValue('C4','FECHA');
$hoja->getColumnDimension('D')->setWidth(15);
$hoja->setCellValue('D4','CLIENTE');
$hoja->getColumnDimension('E')->setWidth(15);
$hoja->setCellValue('E4','TOTAL');

$fila=5;

while($rows=$usuario->fetch_assoc()){

$hoja->getStyle('B'.$fila.':E'.$fila)->applyFromArray($borde);
$hoja->getStyle('B'.$fila)->applyFromArray($styleArray);

$hoja->setCellValue('B'.$fila,$rows['id_ped']);
$hoja->setCellValue('C'.$fila,$rows['fecha']);
$hoja->setCellValue('D'.$fila,$rows['nombre_cli'].' '.$rows['apellido_cli']);
$hoja->setCellValue('E'.$fila,'S/ '.number_format($rows['total'],2,".",","));
$fila++;
}

//SEGUNDA HOJA --- DETALLE VENTA

$excel->createSheet(1)->setTitle("Detalle Ventas");
$excel->setActiveSheetIndex(1)->mergeCells('B2:C2');
$excel->setActiveSheetIndex(1)->getStyle('B2:C2')->applyFromArray($styleArray);
$excel->setActiveSheetIndex(1)->getStyle("B2")->getFont()->setBold(true)->setItalic(1)->setSize(14);
$excel->setActiveSheetIndex(1)->setCellValue('B2', 'TIENDA DE ABARROTES TO EAT');
$excel->setActiveSheetIndex(1)->getColumnDimension('G')->setWidth(25);
$excel->setActiveSheetIndex(1)->setCellValue('G2','F: '.$fecha.' - '.$hora);

$excel->setActiveSheetIndex(1)->getStyle('B4:F4')->applyFromArray($styleArray);
$excel->setActiveSheetIndex(1)->getStyle("B4:F4")->getFont()->setBold(true);
$excel->setActiveSheetIndex(1)->getStyle('B4:F4')->applyFromArray($borde);
$excel->setActiveSheetIndex(1)->getStyle('B4:F4')->applyFromArray($fondo);
$excel->setActiveSheetIndex(1)->getStyle('B4:F4')->applyFromArray($text);

$excel->setActiveSheetIndex(1)->getColumnDimension('B')->setWidth(10);
$excel->setActiveSheetIndex(1)->getColumnDimension('C')->setWidth(35);
$excel->setActiveSheetIndex(1)->getColumnDimension('D')->setWidth(15);
$excel->setActiveSheetIndex(1)->getColumnDimension('E')->setWidth(15);
$excel->setActiveSheetIndex(1)->getColumnDimension('F')->setWidth(15);
$excel->setActiveSheetIndex(1)->setCellValue('B4','ID PED.')->setCellValue('C4','PRODUCTO')->setCellValue('D4','CANTIDAD')->setCellValue('E4','PRECIO UNID.')->setCellValue('F4','IMPORTE');

$fila2=5;

while($rows2=$detalle->fetch_assoc()){

$excel->setActiveSheetIndex(1)->getStyle('B'.$fila2.':F'.$fila2)->applyFromArray($borde);
$excel->setActiveSheetIndex(1)->getStyle('B'.$fila2)->applyFromArray($styleArray);
$excel->setActiveSheetIndex(1)->getStyle('D'.$fila2.':F'.$fila2)->applyFromArray($styleArray);

$excel->setActiveSheetIndex(1)->setCellValue('B'.$fila2,$rows2['id_ped']);
$excel->setActiveSheetIndex(1)->setCellValue('C'.$fila2,$rows2['nombre_produ']);
$excel->setActiveSheetIndex(1)->setCellValue('D'.$fila2,$rows2['cantidad']);
$excel->setActiveSheetIndex(1)->setCellValue('E'.$fila2,'S/ '.number_format($rows2['precio'],2,".",","));
$excel->setActiveSheetIndex(1)->setCellValue('F'.$fila2,'S/ '.number_format($rows2['precio']*$rows2['cantidad'],2,".",","));
$fila2++;
}

$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteVentas.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;