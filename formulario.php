<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();
if(isset($_POST['submit']))
{
    //print ('Nome: ' . $_POST['nome']);
    //print('<br>');
   
    include_once('config.php');
    
    $nome = $_POST['nome'];
    $usuario=$_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO formulariocadastro(nome,usuario,senha,email,telefone,sexo,data_nascimento,cidade,estado,endereco) 
    VALUES ('$nome','$usuario','$senha','$email','$telefone','$sexo','$data_nascimento','$cidade','$estado','$endereco')");

header('Location: login.php');
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
<br>
<a href="sistema.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>
</a>
<!--
<div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Vendedor</b></legend>
                
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo:</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" required>
                    <label for="usuario" class="labelInput">Usuario de Login:</label>
                </div>
                
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">senha:</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email:</label>
                </div>
                
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone:</label>
                </div>
                
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required> 
                <label for="feminino">Feminino</label>
                
                <input type="radio" id="masculino" name="genero" value="masculino" required> 
                <label for="masculino">Masculino</label>
                
                <input type="radio" id="outros" name="genero" value="outros" required> 
                <label for="outros">Outros</label>
                <br><br>
                
                <label for="data_nascimento"><b>Data de Nascimento</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
               
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade:</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado:</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço:</label>
                </div>
                
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>
-->

<fieldset class="boxformularioProduto" style="width: 95%; height: 220%; margin: 40px auto; background-color:#f8bdc6">
    <form class="row g-3" action="formulario.php" method="POST">
    <div class="col-md-5">
    <label for="nome" class="form-label">Nome completo</label>
    <input type="text" name="nome" id="nome" class="form-control" id="inputCity">
  </div>
  <div class="col-md-5">
    <label for="usuario" class="form-label">Login</label>
    <input type="text" name="usuario" id="usuario" class="form-control" id="inputCity">
  </div>
  <div class="col-md-5">
    <label for="email" class="form-label">Email</label>
    <input type="email"  name="email" id="email" class="form-control">
  </div>
  <div class="col-md-5">
    <label for="senha" class="form-label">Senha</label>
    <input type="password"  name="senha" id="senha" class="form-control">
  </div>
  <div class="col-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="dd numero">
  </div>
  <div class="col-3">
    <label for="data_nascimento" class="form-label">Data de nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento"class="form-control">
  </div>
  <div class="col-md-2">
    <label for="inputState" class="form-label">Genero:</label>
    <select id="inputState" class="form-select" name="genero">
    <option value="">Selecione</option>
    <option value="masculino">Masculino</option>
    <option value="feminino">Feminino</option>
    <option value="outros">Outros</option>
    </select>
  </div>
  
  <div class="col-5">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua,Avenida ...">
  </div>
  <div class="col-5">
    <label for="numero" class="form-label">Numero</label>
    <input type="text" class="form-control" name="numero" id="numero" placeholder="123, bloco b, Ap10">
  </div>
  <div class="col-md-3">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" name="cidade" id="cidade" class="form-control">
  </div>
  <div class="col-md-2">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select">
      <option selected>Selecione...</option>
      <option value="acre">AC</option>
      <option value="alagoas">AL</option>
      <option value="amapa">AP</option>
      <option value="amazonas">AM</option>
      <option value="bahia">BH</option>
      <option value="ceara">CE</option>
      <option value="distritoFederal">DF</option>
      <option value="espiritoSanto">ES</option>
      <option value="goias">GO</option>
      <option value="maranhao">MA</option>
      <option value="matoGrosso">MT</option>
      <option value="matoGrossodoSul">MS</option>
      <option value="minasGerai">MG</option>
      <option value="para">PA</option>
      <option value="paraiba">PB</option>
      <option value="parana">PR</option>
      <option value="pernanbuco">PE</option>
      <option value="piaui">PI</option>
      <option value="riodeJaneiro">RJ</option>
      <option value="rioGrandedoNorte">RN</option>
      <option value="rioGrandedoSul">RS</option>
      <option value="rodonia">RO</option>
      <option value="roraima">RR</option>
      <option value="santaCatarina">SC</option>
      <option value="saoPaulo">SP</option>
      <option value="sergipe">SE</option>
      <option value="tocantis">TO</option>
    </select>
  </div>
   </label>
    </div>
  </div>
  <div class="col-3">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</fieldset>

</body>
</html>