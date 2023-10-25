<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();

ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo'); // Definir fuso horário para Brasil/Brasília

if(isset($_POST['submit']))
{
include_once("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barra = $_POST["barra"];

    // Consulta para verificar se o código de barras já existe
    $sql = "SELECT * FROM novos WHERE barra = '$barra'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Código de barras já existe, apresentar mensagem de alerta
        echo "<script>alert('Código de barras já registrado no banco de dados.');</script>";
        
    } else {
        // Código de barras não existe, prosseguir com o cadastro
        // ... (código para inserir o registro no banco de dados)
    }
    
}
// Redirecionar para o formulário após exibir a mensagem de alerta
echo "<script>window.location.href = 'cadastroProduto.php';</script>";
error_reporting(0);
// Insira as informações da compra no banco de dados
$data = date('Y-m-d'); // Data e hora atual
$hora = date('H:i:s');
print_r($dataHora);
$barra = $_POST['barra'];
$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$caracteristicas = $_POST['caracteristicas'];
$valordevenda = $_POST['valordevenda'];
$qtdcomprada =  $_POST['qtdcomprada'];
$valordecompra = $_POST['valordecompra'];
$siteprod = $_POST['siteprod'];

if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
    $imagem = "./img/".$_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem);
}else{
    $imagem = "";
}

$result = mysqli_query($conexao, "INSERT INTO novos (barra,produto,categoria,marca,caracteristicas,valordevenda,qtdcomprada,valordecompra, data, hora, imagem, siteprod) values ('$barra','$produto','$categoria','$marca','$caracteristicas','$valordevenda','$qtdcomprada', '$valordecompra', '$data', '$hora', '$imagem', '$siteprod')");

header('Location: cadastroProduto.php');
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
    <br><a href="consultaCatalogo.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>
</a>
<br>
<fieldset class="boxformularioProduto" style="width: 95%; height: 220%; margin: 0px auto; margin-top: 4%; background-color:#f8bdc6">
         
         
             <form id="insert_form" class="row g-3" name="cadastrodeprodutos" method="post" action="cadastroProduto.php" enctype="multipart/form-data">
                  
                  <h1>Cadastro de Produto</h1>
                  <div class="col-md-5">
                  <label class="nomedoCampo">Imagem: *</label><br>
                  <input type="file" name="imagem" class="form-control" accept="image/*">
                  </div><br>

             <div class="col-md-5">
                     <label class="nomedoCampo">Produto: *</label><br>
                     <input type="text" class="form-control" name="produto" placeholder="Informar nome do produto" id="produto" maxlength="30" required>
                 </div><br>

                 <div class="col-md-5">
                     <label class="nomedoCampo">Categoria: *</label><br>
                     <select id="qtdcomprada" class="form-control" name="produto" id="produto" maxlength="" required>
        <option value="">Selecione Categoria</option>
        <option value="Promocoes">Promoções</option>
        <option value="Rosto">Rosto</option>
        <option value="Olhos">Olhos</option>
        <option value="Boca">Boca</option>
        <option value="Acessorios">Acessórios</option>
        <option value="Aplicadores">Aplicadores</option>
        <option value="Carroussel">Carroussel</option>
        <option value="Sobrancelhas">Sobrancelhas</option>
        <option value="Corporal">Corporal</option>
        <option value="Infaltil">Infaltil</option>
        </select>                
     </div><br>
 
                 <div class="col-md-5">
                     <label class="nomedoCampo">Marca: *</label><br>
                     <input type="text" class="form-control" name="marca" placeholder="Informar a Marca" id="marca" maxlength="" required>
                 </div><br>
 
                 <div class="col-md-5">
                     <label class="nomedoCampo">Caracteristicas: *</label><br>
                     <input type="text" class="form-control" name="caracteristicas" placeholder="Informar cor, modelo etc." id="caracteristicas" maxlength="50" required>
                 </div><br>

                 <div class="col-md-5">
                 <label class="nomedoCampo">Valor de Venda por Unidade: *</label><br>
                     <input type="decimal" class="form-control" name="valordevenda" placeholder="valor proposto para venda" id="valordevenda" maxlength="6" required>
                 </div><br>
                
                 <div class="col-md-5">
                 <label class="nomedoCampo">Qtd comprada: *</label><br>
                     <input type="number" class="form-control" name="qtdcomprada" placeholder="quantidade comprada do lote" id="qtdcomprada" maxlength="6" required>
                                        

                 </div><br>
                 <div class="col-md-5">
                 <label class="nomedoCampo">Valor de Compra: *</label><br>
                     <input type="decimal" class="form-control" name="valordecompra" placeholder="quantidade comprada do lote" id="valordecompra" maxlength="6" required>
</div>

        <div class="col-md-5">
                     <label class="nomedoCampo">Código de Barras: *</label><br>
                     <input type="number" class="form-control" name="barra" placeholder="Ler código de Barra" id="barra" maxlength="15" required>
                     </div>
       
                     
                <div class="col-md-5">
                     <label class="nomedoCampo">Categoria Site: *</label><br>
                     <select id="qtdcomprada" class="form-control" name="siteprod" id="siteprod" maxlength="" required>
        <option value="">Selecione Categoria</option>
        <option value="na">Sem Categoria</option>
        <option value="Promocoes">Promoções</option>
        <option value="Rosto">Rosto</option>
        <option value="Olhos">Olhos</option>
        <option value="Boca">Boca</option>
        <option value="Acessorios">Acessórios</option>
        <option value="Aplicadores">Aplicadores</option>
        <option value="Sobrancelhas">Sobrancelhas</option>
        <option value="Corporal">Corporal</option>
        <option value="Carroussel">Carroussel</option>
        <option value="Infaltil">Infaltil</option>
        </select>
                 </div><br>

              <div class="col-3">
                        <input type="submit" name="submit" id="submit" value="Salvar">
                     </div>

             </form>   
                
 </fieldset>
</body>
</html>