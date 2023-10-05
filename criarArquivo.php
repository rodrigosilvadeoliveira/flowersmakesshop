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
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}

// Consulta SQL para obter os dados
$sql = "SELECT id, barra, produto, marca, caracteristicas, valordevenda, qtdcomprada, valordecompra, usuario, datas, hora, obs FROM vendas";
$result = $conexao->query($sql);
if (!$result) {
    // Caso a consulta não tenha retornado resultados ou ocorrido um erro
    echo "Erro na consulta SQL: " . $conexao->error;
}

// Crie uma nova planilha Excel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

// Defina o cabeçalho da tabela
$activeWorksheet->setCellValue('A1', 'id');
$activeWorksheet->setCellValue('B1', 'barra');
$activeWorksheet->setCellValue('C1', 'produto');
$activeWorksheet->setCellValue('D1', 'marca');
$activeWorksheet->setCellValue('E1', 'caracteristicas');
$activeWorksheet->setCellValue('F1', 'valordevenda');
$activeWorksheet->setCellValue('G1', 'qtdcomprada');
$activeWorksheet->setCellValue('H1', 'valordecompra');
$activeWorksheet->setCellValue('I1', 'usuario');
$activeWorksheet->setCellValue('J1', 'datas');
$activeWorksheet->setCellValue('K1', 'hora');
$activeWorksheet->setCellValue('L1', 'obs');
$activeWorksheet->setCellValue('M1', 'Total Compras');
$activeWorksheet->setCellValue('N1', 'Total Vendas');
$activeWorksheet->setCellValue('O1', 'Lucro');
$activeWorksheet->setCellValue('P1', 'Caixa');
$activeWorksheet->setCellValue('Q1', 'Kau 35%');
$activeWorksheet->setCellValue('R1', 'Vania 35%');
$activeWorksheet->setCellValue('S1', 'Rodrigo 10%');
$activeWorksheet->setCellValue('T1', 'Loja 20%');
$activeWorksheet->setCellValue('M2', '=SUM(H2:H376)');
$activeWorksheet->setCellValue('N2', '=SUM(F2:F376)');
$activeWorksheet->setCellValue('O2', '=M2-L2');
$activeWorksheet->setCellValue('Q2', '=P2*35/100');
$activeWorksheet->setCellValue('R2', '=P2*35/100');
$activeWorksheet->setCellValue('S2', '=P2*10/100');
$activeWorksheet->setCellValue('T2', '=P2*20/100');


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
$activeWorksheet->getStyle('A1:S1')->applyFromArray($styles);

// Preencha os valores da tabela
$row = 2;
while ($row_data = $result->fetch_assoc()) {
    $activeWorksheet->setCellValue('A' . $row, $row_data['id']);
    $activeWorksheet->setCellValue('B' . $row, $row_data['barra']);
    $activeWorksheet->setCellValue('C' . $row, $row_data['produto']);
    $activeWorksheet->setCellValue('D' . $row, $row_data['marca']);
    $activeWorksheet->setCellValue('E' . $row, $row_data['caracteristicas']);
    $activeWorksheet->setCellValue('F' . $row, $row_data['valordevenda']);
    $activeWorksheet->setCellValue('G' . $row, $row_data['qtdcomprada']);
    $activeWorksheet->setCellValue('H' . $row, $row_data['valordecompra']);
    $activeWorksheet->setCellValue('I' . $row, $row_data['usuario']);
    $activeWorksheet->setCellValue('J' . $row, $row_data['datas']);
    $activeWorksheet->setCellValue('k' . $row, $row_data['hora']);
    $activeWorksheet->setCellValue('l' . $row, $row_data['obs']);
    $row++;
}

// Defina o cabeçalho do arquivo para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="fechamento_05.08_19.08.xlsx"');
header('Cache-Control: max-age=0');

// Crie um objeto Writer para salvar o arquivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Encerre a conexão com o banco de dados
$conexao->close();
