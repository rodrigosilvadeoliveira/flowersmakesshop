<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
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
                
                $sqlInsert = "UPDATE novos 
                SET barra='$barra',produto='$produto', categoria='$categoria', marca='$marca',caracteristicas='$caracteristicas',valordevenda='$valordevenda',qtdcomprada='$qtdcomprada',valordecompra='$valordecompra',imagem='$imagem' ,siteprod='$siteprod'
                WHERE id=$id";
                $result = $conexao->query($sqlInsert);
                print_r($result);
            }
            header('Location: consultaCatalogo.php');

?>