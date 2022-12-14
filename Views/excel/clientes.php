<?php
require 'vendor/autoload.php';
require '../../conexion/conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$usuario=mysqli_query($con,"SELECT * FROM usu_cliente");
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
$hoja->setTitle("Report Clientes");
$hoja->mergeCells('B2:D2');
$hoja->getStyle("B2")->getFont()->setBold(true)->setItalic(1)->setSize(14);
$hoja->setCellValue('B2','TIENDA DE ABARROTES TO EAT');
$hoja->getColumnDimension('J')->setWidth(25);
$hoja->setCellValue('J2',$fecha.' - '.$hora);

$hoja->getStyle('B4:I4')->applyFromArray($styleArray);
$hoja->getStyle("B4:I4")->getFont()->setBold(true);

$hoja->getStyle('B4:I4')->applyFromArray($borde);
$hoja->getStyle('B4:I4')->applyFromArray($fondo);
$hoja->getStyle('B4:I4')->applyFromArray($text);

$hoja->getColumnDimension('B')->setWidth(10);
$hoja->setCellValue('B4','ID');
$hoja->getColumnDimension('C')->setWidth(15);
$hoja->setCellValue('C4','NOMBRE');
$hoja->getColumnDimension('D')->setWidth(15);
$hoja->setCellValue('D4','APELLIDO');
$hoja->getColumnDimension('E')->setWidth(15);
$hoja->setCellValue('E4','DNI');
$hoja->getColumnDimension('F')->setWidth(15);
$hoja->setCellValue('F4','TELÉFONO');
$hoja->getColumnDimension('G')->setWidth(15);
$hoja->setCellValue('G4','DIRECCIÓN');
$hoja->getColumnDimension('H')->setWidth(25);
$hoja->setCellValue('H4','CORREO');
$hoja->getColumnDimension('I')->setWidth(15);
$hoja->setCellValue('I4','CONTRASEÑA');

$fila=5;

while($rows=$usuario->fetch_assoc()){

$hoja->getStyle('B'.$fila.':I'.$fila)->applyFromArray($borde);
$hoja->getStyle('B'.$fila)->applyFromArray($styleArray);

$hoja->setCellValue('B'.$fila,$rows['id_usu_cli']);
$hoja->setCellValue('C'.$fila,$rows['nombre_cli']);
$hoja->setCellValue('D'.$fila,$rows['apellido_cli']);
$hoja->setCellValue('E'.$fila,$rows['dni_cli']);
$hoja->setCellValue('F'.$fila,$rows['telefono_cli']);
$hoja->setCellValue('G'.$fila,$rows['direccion_cli']);
$hoja->setCellValue('H'.$fila,$rows['usuario']);
$hoja->setCellValue('I'.$fila,$rows['contra']);
$fila++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteClientes.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;