<?php
//Autoload do composer
require __DIR__.'/vendor/autoload.php';

// Dependências do projeto
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$dbHost = 'Localhost';
$dbUsername = 'u542827638_cadastro';
$dbPassword = 'Digodw19';
$dbName = 'u542827638_bancocadastro';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
    $inicio = $_POST['data_inicio'];
    $fim = $_POST['data_fim'];

$sql = "SELECT * FROM vendas WHERE datas BETWEEN '$inicio' AND '$fim'";
$result = $conexao->query($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Defina o cabeçalho da tabela
$sheet->setCellValue('A1', 'id');
$sheet->setCellValue('B1', 'barra');
$sheet->setCellValue('C1', 'produto');
$sheet->setCellValue('D1', 'marca');
$sheet->setCellValue('E1', 'caracteristicas');
$sheet->setCellValue('F1', 'valordevenda');
$sheet->setCellValue('G1', 'qtdcomprada');
$sheet->setCellValue('H1', 'valordecompra');
$sheet->setCellValue('I1', 'usuario');
$sheet->setCellValue('J1', 'datas');
$sheet->setCellValue('K1', 'hora');
$sheet->setCellValue('L1', 'obs');
$sheet->setCellValue('M1', 'Total Compras');
$sheet->setCellValue('N1', 'Total Vendas');
$sheet->setCellValue('O1', 'Lucro');
$sheet->setCellValue('P1', 'Caixa');
$sheet->setCellValue('Q1', 'Kau 45%');
$sheet->setCellValue('R1', 'Vania 45%');
$sheet->setCellValue('S1', 'Rodrigo 10%');
$sheet->setCellValue('T1', 'Loja');
$sheet->setCellValue('M2', '=SUM(H2:H376)');
$sheet->setCellValue('N2', '=SUM(F2:F376)');
$sheet->setCellValue('O2', '=N2-M2');
$sheet->setCellValue('Q2', '=O2*45/100');
$sheet->setCellValue('R2', '=O2*45/100');
$sheet->setCellValue('S2', '=O2*10/100');
$sheet->setCellValue('T2', '=N2-O2');


//Estilo da celula
$styles = [
    'font' => [
        'bold' => true,
        'color' => [
            'rgb' => ''
        ],
        'size' => 10,
        'name' => 'Caimbra'
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    
];

//Define o estilo da Celula cabeçalho
$sheet->getStyle('A1:S1')->applyFromArray($styles);

// Preencha os valores da tabela
if ($result) {
    $row = 2;
    while ($row_data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $row_data['id']);
    $sheet->setCellValue('B' . $row, $row_data['barra']);
    $sheet->setCellValue('C' . $row, $row_data['produto']);
    $sheet->setCellValue('D' . $row, $row_data['marca']);
    $sheet->setCellValue('E' . $row, $row_data['caracteristicas']);
    $sheet->setCellValue('F' . $row, $row_data['valordevenda']);
    $sheet->setCellValue('G' . $row, $row_data['qtdcomprada']);
    $sheet->setCellValue('H' . $row, $row_data['valordecompra']);
    $sheet->setCellValue('I' . $row, $row_data['usuario']);
    $sheet->setCellValue('J' . $row, $row_data['datas']);
    $sheet->setCellValue('k' . $row, $row_data['hora']);
    $sheet->setCellValue('l' . $row, $row_data['obs']);
    $row++;
}
}else {
    echo "Por favor, selecione as datas.";
}

// Defina o cabeçalho do arquivo para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="fechamento_relatorio.xlsx"');
header('Cache-Control: max-age=0');

// Crie um objeto Writer para salvar o arquivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Encerre a conexão com o banco de dados
$conexao->close();
}
