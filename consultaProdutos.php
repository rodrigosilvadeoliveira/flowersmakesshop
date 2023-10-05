<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();
//session_start();
include_once('config.php');
   // print_r($_SESSION);
    if((!isset($_SESSION['usuario'])== true) and ($_SESSION['senha']) == true)
    {
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: login.php');
      
    }$logado = $_SESSION['usuario'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM novos WHERE id LIKE '%$data%' or produto LIKE '%$data%' or marca LIKE '%$data%' ORDER BY id DESC";
    }

?>
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Sistema Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
    </head>
<body>
    <br><br>
<?php
    echo "<h1 id='BemVindo'>Catalogo de Produtos e Estoque</h1>";
?>

<div class="scroll-horizontal">
<a id="incluirCadastro" value="Novo Cadastro" href="cadastroProduto.php">Novo Cadastro Produto</a>
<a id="incluirCadastro" value="Novo Cadastro" href="consultaCatalogo.php">Consultar Estoque por periodo</a>
<a id="incluirCadastro" value="Novo Cadastro" href="consultaProdutos.php">Consultar Estoque por nome Produto</a>
<br>
</div>
<div class="boxformulariodatasconsulta">
<fieldset>
<form id="dataRelatorio" method="POST" action="consultaProdutos.php">
    <label for="nomeproduto"><b>Consultar produto no Estoque:</b></label><br>
    <label for="nomeproduto"><b>Nome do produto:</b></label>
    <input type="varchar" name="nomeproduto" id="nomeproduto" />
        <input type="submit" value="Consultar" id="Exportar"/>
</form>
</fieldset>
</div>
<div class="scroll-horizontal">
<table class="table" id="tabelaLista">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Barra</th>
      <th scope="col">Produto</th>
      <th scope="col">
  <label for="categoria">Filtrar por categoria:</label><br>
  <select id="categoria">
    <option value="">Todas</option>
    <option value="acessórios">Acessórios</option>
    <option value="bijouteria">Bijouteria</option>
    <option value="boca">Boca</option>
    <option value="cabelo">Cabelo</option>
    <option value="limpreza de pele">Limpeza de pele</option>
    <option value="mãos">Mãos</option>
    <option value="olhos">Olhos</option>
    <option value="rosto">Rosto</option>
    <option value="sobrancelhas">Sobrancelhas</option>
  </select>
</th>
<th scope="col"><label for="marca">Filtrar por marca:</label><br>
<select id="marca">
  <option value="">Todas</option>
  <option value="belle angel">Belle Angel</option>
  <option value="belle femme">Belle Femme</option>
  <option value="dapop">Dapop</option>
  <option value="even">Even</option>
  <option value="max love">Max Love</option>
  <option value="mia make">Mia Make</option>
  <option value="meili star">Meili Star</option>
  <option value="miss catherine">Miss Catherine</option>
  <option value="super poderes">Super Poderes</option>
  <option value="venus">Venus</option>
  <option value="vivai">Vivai</option>
</select></th>
      <th scope="col">Caracteristicas</th>
      <th scope="col">Valor de Venda</th>
      <th scope="col">
      <label for="qtdcomprada">Estoque:</label><br>
  <select id="qtdcomprada">
    <option value="">Todas</option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">5</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
  </select></th>
      <th scope="col">Valor de Compra</th>
      <th scope="col">Data</th>
      <th scope="col">Hora</th>
      <th scope="col">......</th>
    </tr>
  </thead>
  <tbody>
  <?php

$dbHost = 'Localhost';
$dbUsername = 'u542827638_cadastro';
$dbPassword = 'Digodw19';
$dbName = 'u542827638_bancocadastro';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['nomeproduto'])){
  $nome = $_POST['nomeproduto'];

$sql = "SELECT * FROM novos WHERE produto LIKE '$nome' ORDER BY id DESC";

$result = $conexao->query($sql);

      while($user_data = mysqli_fetch_assoc($result))
      {
          echo "<tr>";
          echo "<td>" .$user_data['id']. "</td>";
          
          echo "<td>" .$user_data['barra']. "</td>";

          echo "<td>" .$user_data['produto']. "</td>";
         
          echo "<td>" .$user_data['categoria']. "</td>";
          
          echo "<td>" .$user_data['marca']. "</td>";
          
          echo "<td>" .$user_data['caracteristicas']. "</td>";
          
          echo "<td>" .$user_data['valordevenda']. "</td>";

          echo "<td>" .$user_data['qtdcomprada']. "</td>";
          
          echo "<td>" .$user_data['valordecompra']. "</td>";
          
          echo "<td>" .$user_data['data']. "</td>";

          echo "<td>" .$user_data['hora']. "</td>";
          
          echo "<td> 
          <a class='btn btn-sm btn-primary' href='editCatalogo.php?id=$user_data[id]' title='Editar'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
              <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          </svg>
          </a> 
          <a class='btn btn-sm btn-danger' href='deleteCatalogo.php?id=$user_data[id]' title='Deletar'>
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
              </svg>
          </a>
</td>";
          echo "</tr>";

      }

    }

  ?>
    
    </tr>
  </tbody>
</table>
</div>

</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'consultaCatalogo.php?search='+search.value;
    }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('categoria').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(4)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('marca').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(5)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('qtdcomprada').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(8)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  // Obtenha o elemento select
const categoriaSelect = document.getElementById('categoria');

// Array com novas categorias
const novasCategorias = ['teste', 'Teste2'];

// Função para adicionar as novas categorias ao select
function adicionarNovasCategorias() {
  for (const novaCategoria of novasCategorias) {
    const option = document.createElement('option');
    option.value = novaCategoria;
    option.textContent = novaCategoria;
    categoriaSelect.appendChild(option);
  }
}

// Chame a função para adicionar as novas categorias
adicionarNovasCategorias();
  </script>
</html>