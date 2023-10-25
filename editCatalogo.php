<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM novos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {

                $barra = $user_data['barra'];
                $produto = $user_data['produto'];
                $categoria = $user_data['categoria'];
                $marca = $user_data['marca'];
                $caracteristicas = $user_data['caracteristicas'];
                $siteprod = $user_data['siteprod'];
                $valordevenda = $user_data['valordevenda'];
                $qtdcomprada =  $user_data['qtdcomprada'];
                $valordecompra = $user_data['valordecompra'];
                $imagem = $user_data['imagem'];
            }
        }
        else
        {
            header('Location: consultaCatalogo.php');
        }
    }
    else
    {
        header('Location: consultaCatalogo.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
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
<a href="consultaCatalogo.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>
</a>

<br>
<fieldset class="boxformularioProduto" style="width: 95%; height: 220%; margin: 0px auto; margin-top: 4%; background-color:#f8bdc6">
         
         <h1> *Lembre-se de sempre selecionar e cadastrar imagem novamente antes de atualizar</h1>
             <form id="insert_form" class="row g-3" name="cadastrodeprodutos" method="post" action="saveEditCatalogo.php"  enctype="multipart/form-data">
                
             <div class="col-md-5">
                  <label class="nomedoCampo">Nova Imagem: *</label><br>
                  <input type="text" name="imagem" class="form-control" accept="image/*" value="<?php echo $imagem ?>">
                  </div><br>
 
                  <div class="col-md-5">
                     <label class="campodeFormulario">Produto: *</label><br>
                     <input type="text" class="form-control" name="produto" placeholder="Informar nome do produto" id="produto" maxlength="50" value="<?php echo $produto ?>" required>
                 </div><br>

                 <div class="col-md-5">
                     <label class="campodeFormulario">Categoria: *</label><br>
                     <input type="text" class="form-control" name="categoria" placeholder="informe categoria" id="categoria" maxlength="50" value="<?php echo $categoria ?>" required>
                 </div><br>

                 <div class="col-md-5">
                     <label class="campodeFormulario">Marca: *</label><br>
                     <input type="text" class="form-control" name="marca" placeholder="Informar a Marca" id="marca" maxlength="" value="<?php echo $marca ?>" required>
                 </div><br>
 
                 <div class="col-md-5">
                     <label class="campodeFormulario">Caracteristicas: *</label><br>
                     <input type="text" class="form-control" name="caracteristicas" placeholder="Informar cor, modelo etc." id="caracteristicas" maxlength="50" value="<?php echo $caracteristicas ?>">
                     
                 </div><br>

                 <div class="col-md-5">
                 <label class="campodeFormulario">Valor de Venda por Unidade: *</label><br>
                     <input type="decimal" class="form-control" name="valordevenda" placeholder="valor proposto para venda" id="valordevenda" maxlength="6" value="<?php echo $valordevenda ?>">
                 </div>
                
                 <div class="col-md-5">
                 <label class="campodeFormulario">Qtd comprada: *</label><br>
                     <input type="number" class="form-control" name="qtdcomprada" placeholder="quantidade comprada do lote" id="qtdcomprada" maxlength="6" value="<?php echo $qtdcomprada ?>">
                     
                </div>
      
                <div class="col-md-5">
                 <label class="campodeFormulario">Valor de Compra: *</label><br>
                     <input type="decimal" class="form-control" name="valordecompra" placeholder="valor de compra da unidade" id="valordecompra" maxlength="6" value="<?php echo $valordecompra ?>">
</div>

<div class="col-md-5">
                     <label class="campodeFormulario">Código de Barras: *</label><br>
                     <input type="number" class="form-control" name="barra" placeholder="Ler código de Barra" id="barra" maxlength="15" value="<?php echo $barra ?>">
                     <br>
</div>
                     <div class="col-md-5">
                     <label class="campodeFormulario">Catagoria Site: *</label><br>
                     <input type="text" id="siteprod" class="form-control" name="siteprod" maxlength="" value="<?php echo $siteprod ?>" required>
        
                 </div><br>
<div>
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                     
                     <input type="submit" name="update" id="update" class="atualizar">
                     
                   
                 </div><br>

             </form>   
                
 </fieldset>
</body>
</html>