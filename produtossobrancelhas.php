<?php
session_start();

// Conecte-se ao banco de dados (substitua com suas configurações)
include('config.php');

// Verifique se a sessão do carrinho já existe; se não, crie-a
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();

}

$sql = "SELECT * FROM novos WHERE siteprod = 'Sobrancelhas' ORDER BY id DESC";
$result = $conexao->query($sql);

// Função para adicionar um produto ao carrinho
function adicionarProdutoAoCarrinho($idProduto, $conexao)
{
    // Consulte o banco de dados para obter detalhes do produto com base no ID
    $sql = "SELECT * FROM novos WHERE id = $idProduto";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produtoDB = $result->fetch_assoc();

        // Verifique se o produto já existe no carrinho
        
        $produtoExistente = false;
        // Se o produto não existe no carrinho, adicione-o
        if (!$produtoExistente) {
            $produtoDB['quantidade'] = 1; // Adicione a quantidade inicial
            $_SESSION['carrinho'][] = $produtoDB;
        }

        // Redirecione de volta para a página de produtos ou exiba uma mensagem de sucesso
        // header("Location: produtos.php"); // Redirecionar para a página de produtos, se necessário
        // exit(); // Encerre o script, se necessário

        return true; // Retorna verdadeiro para indicar que o produto foi adicionado com sucesso
    } else {
        return false; // Retorna falso para indicar que o produto não foi encontrado
    }
}

// Verifique se o ID do produto foi enviado via POST
if (isset($_POST['id'])) {
    $idProduto = $_POST['id'];
    adicionarProdutoAoCarrinho($idProduto, $conexao);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
    
</head>
<body>
<header>
    <div class="cabecalho" id="cabecalho">
    <?php include('cabecalhoSite.php');?>
    </div>    

</header>
<h1 id="titulocategoria">Produtos categoria rosto</h1>
<div id="tabelaCarrinhos">
<div class="produtos-container">
        <table>
            <tbody>   
            <?php
            // Listar produtos no carrinho aqui
            
            while ($produtoNoCarrinho = mysqli_fetch_assoc($result)) {
                echo '<tr class="produtos">';
                echo '<td>';
                echo '<img class="imagens" src="' . $produtoNoCarrinho['imagem'] . '">';
                echo '<div class="produto-info">';
                echo '<b>' . $produtoNoCarrinho['produto'] . '</b>';
                echo '<p>' . $produtoNoCarrinho['marca'] . ' - ' . $produtoNoCarrinho['caracteristicas'] . '</p>';
                echo '<p>SKU ' . $produtoNoCarrinho['id'] . '</p>';
                echo '<p>R$ ' . $produtoNoCarrinho['valordevenda'] . '</p>';
                echo '<form action="carrinho.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $produtoNoCarrinho['id'] . '">';
                echo '<input type="submit" class="addCarrinho" value="Adicionar ao Carrinho">';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<div class="footer" id="footer">
      <?php include('footerSite.php');?>
      </div>
</body>
</html>

<?php
$conexao->close();
?>