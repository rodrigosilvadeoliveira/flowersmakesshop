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

    <div class="scroll-horizontal">
<table class="table" id="tabelaLista">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Forma de Contato</th>
      <th scope="col">Pedido</th>
      <th scope="col">Assunto</th>
      <th scope="col">Mensagem do cliente</th>
      <th scope="col">......</th>
    </tr>
  </thead>
  <tbody>
<?php
    echo "<h1 id='BemVindo'>Catalogo de Produtos e Estoque</h1>";

// Conexão ao banco de dados (substitua as credenciais pelo seu ambiente)
include_once('config.php');
// Verifique a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Consulta SQL para obter pedidos peinclude('config.php');

// Verifique se a sessão do carrinho já existe; se não, crie-a
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();

}

$sql = "SELECT * FROM contato WHERE status = 'pendente' ORDER BY id DESC";
$result = $conexao->query($sql);



$sql = "SELECT * FROM contato WHERE status = 'pendente' ORDER BY id DESC";

$result = $conexao->query($sql);

      while($user_data = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>" .$user_data['id']. "</td>";
        
        echo "<td>" .$user_data['nome']. "</td>";

        echo "<td>" .$user_data['sobrenome']. "</td>";
       
        echo "<td>" .$user_data['telefone']. "</td>";
        
        echo "<td>" .$user_data['email']. "</td>";
        
        echo "<td>" .$user_data['tpcontato']. "</td>";
        
        echo "<td>" .$user_data['pedido']. "</td>";

        echo "<td>" .$user_data['assunto']. "</td>";

        echo "<td>" .$user_data['mensagem']. "</td>";
        
        echo "<td>" .$user_data['status']. "</td>";
        
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

    

          ?>
      </tbody>
  </table>
</div>
</body>
</html>

<?php
$conexao->close();
?>