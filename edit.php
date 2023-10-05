<?php include("cabecalho.php")?>
<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM formulariocadastro WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $usuario = $user_data['usuario'];
                $senha = $user_data['senha'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nascimento = $user_data['data_nascimento'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar FlowersMakes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<a href="sistema.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>
</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Alterar Cadastro de Vendedor</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome Completo:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" value="<?php echo $usuario ?>" required>
                    <label for="usuario" class="labelInput">Usuario de Login:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label for="senha" class="labelInput">senha:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                    <label for="telefone" class="labelInput">telefone:</label>
                </div>
                
                
                <p>Sexo:</p>
                   <input type="radio" id="feminino" name="genero" value="feminino" <?php echo $sexo == 'feminino' ? 'checked' : ''?> required> 
                   <label for="feminino">Feminino</label>
                <br>
                   <input type="radio" id="masculino" name="genero" value="masculino" <?php echo $sexo == 'masculino' ? 'checked' : ''?> required> 
                 <label for="masculino">Masculino</label>
                <br>
                  <input type="radio" id="outros" name="genero" value="outros" <?php echo $sexo == 'outros' ? 'checked' : '' ?> required> 
                   <label for="outros">Outros</label>
                <br><br>
                 <label for="data_nascimento"><b>Data de Nascimento</b></label>
                  <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento ?>" required>
               
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label for="cidade" class="labelInput">Cidade:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                    <label for="estado" class="labelInput">Estado:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                    <label for="endereco" class="labelInput">Endereço:</label>
                </div>
                <br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">

            </fieldset>
        </form>
    </div>
</body>
</html>