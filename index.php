<?php
include_once('config.php');

$sql = "SELECT * FROM novos WHERE siteprod = 'Carroussel' ORDER BY id DESC";
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
    <title>Contato Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
</head>
<body>

        <!--
<a href="formulario.php" id="cadastre">Cadastre-se</a>"
//-->
<header>
<div class="cabecalho" id="cabecalho">
<?php include('cabecalhoSite.php');?>
</div>    
</header>
<div id="tabelacarrousel" class="carroussel">
    <div class="carroussel-container">
        <?php
        // Listar produtos no carrinho aqui

        while ($produtoNoCarrinho = mysqli_fetch_assoc($result)) {
            echo '<div class="produto">';
            echo '<img class="imagenscarroussel" src="' . $produtoNoCarrinho['imagem'] . '">';
            echo '<div class="produto-info">';
            // Resto do código do produto
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>



<h1 id="titulohome">Pagina inicial Flowers Makes</h1>

    <div class="containerhome">
        <div class="boxhome">
<div class="linkloja">
  <a href="produtosrosto.php"><img class="imgloja" id="nossaloja"src="img/rosto.png"></a>
  </div>
  <a href="produtosrosto.php"><img class="" id="nossaloja">Produtos para Rosto</a>
  </div>
  <div class="boxhome">
  <div class="linkloja">
  <a href="nossaLoja"><img class="imgloja" id="nossaloja"src="img/cestaPomocao.jpeg"></a>
  </div>
  <a href="nossaLoja"><img class="" id="nossaloja">Mais Vendidos</a>
        </div>

        <div class="boxhome">
  <div class="linkloja">
  <a href="nossaLoja"><img class="imgloja" id="nossaloja"src="img/cestaPomocao.jpeg"></a>
  </div>
  <a href="nossaLoja"><img class="" id="nossaloja">Nossa Equipe</a>
        </div>

        <div class="boxhome">
  <div class="linkloja">
  <a href="nossaLoja"><img class="imgloja" id="nossaloja"src="img/cestaPomocao.jpeg"></a>
  </div>
  <a href="nossaLoja"><img class="" id="nossaloja">Nossa História</a>
        </div>

        <div class="boxhome">
  <div class="linkloja">
  <a href="nossaLoja"><img class="imgloja" id="nossaloja"src="img/cestaPomocao.jpeg"></a>
  </div>
  <a href="nossaLoja"><img class="" id="nossaloja">Posso ajudar?
</a>
        </div>
      </div>
      <div class="footer" id="footer">
      <?php include('footerSite.php');?>
      </div>
      <script>
$(document).ready(function(){
    $('.carroussel-container').slick({
        slidesToShow: 1, // Quantidade de slides visíveis ao mesmo tempo
        slidesToScroll: 1, // Quantidade de slides para avançar/retroceder
        autoplay: true, // Ativar a reprodução automática
        autoplaySpeed: 4000, // Velocidade da reprodução automática (em milissegundos)
    });
});
</script>

</body>
</html>