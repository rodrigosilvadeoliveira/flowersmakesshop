<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body><!--
<a href="index.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>

<svg xmlns="http://www.w3.org/2000/svg" id="voltar" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
</svg>
</a>-->
<div>
<img id="logologin" src ="logo_flowers.png">
<h1 id="flowers">Sistema de Loja <br><u>Flowers Makes</u></h1>
</div>
    

    <div class="tela-login">
    <form action="testLogin.php" method="POST">
    
        <h1>Login</h1>
        <input class="login" type="text" placeholder="usuario" name="usuario">
        <br><br>
        <input class="login" type="password" placeholder="senha" name="senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="Enviar">
</form>
</div>

</body>
</html>