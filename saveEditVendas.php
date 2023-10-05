<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $barra = $_POST['barra'];
        $produto = $_POST['produto'];
        $marca = $_POST['marca'];
        $caracteristicas = $_POST['caracteristicas'];
        $valordevenda = $_POST['valordevenda'];
        $obs = $_POST['obs'];
        
        $sqlInsert = "UPDATE vendas 
        SET barra='$barra',produto='$produto',marca='$marca',caracteristicas='$caracteristicas',valordevenda='$valordevenda',obs='$obs'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: vendasrealizadas.php');

?>