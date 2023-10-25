<?php

session_start();



// Verifique se o formulário foi enviado
if (isset($_POST['confirmar_pedido'])) {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo'); // Definir fuso horário para Brasil/Brasília

    // Verifique se houve erro na conexão com o banco de dados
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }
    $nome = $_POST['nome'];

    // Insira o cliente na tabela de clientes
$sql = "INSERT INTO clientes (nome) VALUES (?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $nome); // "s" indica que é uma string
$stmt->execute();

// Obtenha o ID do cliente gerado automaticamente
$id_clientes = $conexao->insert_id;

    // Insira o pedido na tabela de pedidos
    $sql = "INSERT INTO pedidos (id_clientes, data_pedido, hora_pedido) VALUES (?, CURDATE(), CURTIME())";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_clientes);
    $stmt->execute();

    // Obtenha o ID do pedido gerado automaticamente
    $id_pedido = $conexao->insert_id;

    // Inserir os produtos associados a esse pedido na tabela de produtos
    foreach ($_SESSION['carrinho'] as $produtoNoCarrinho) {
        $id_produto = $produtoNoCarrinho['id'];
        $quantidade = $produtoNoCarrinho['quantidade']; // Substitua pela forma correta de obter a quantidade
        $preco_unitario = $produtoNoCarrinho['valordevenda'];

        $sql = "INSERT INTO produto (id_pedido, id_produto, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iiid", $id_pedido, $id_produto, $quantidade, $preco_unitario);
        $stmt->execute();
    }

    // Limpe o carrinho de compras ou realize qualquer outra ação necessária

    // Feche a conexão com o banco de dados
    $conexao->close();

    // Redirecione o usuário para uma página de confirmação de pedido
    header("Location: carrinho - Copia.php");
} else {
    // Caso o formulário não tenha sido submetido, redirecione o usuário para a página de carrinho
    header("Location: index.php");
}
