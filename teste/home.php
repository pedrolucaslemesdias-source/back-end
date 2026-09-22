<?php
require_once "proteger.php"; // Adicionado o ponto e vírgula aqui!
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SmartDesk - IA</title>
</head>
<body>
    <h1>Olá <?=htmlspecialchars($_SESSION["usuario"])?>! Bem-vindo ao SmartDesk</h1>  
    
    <!-- O formulário envia os dados para o arquivo api_ia.php -->
    <form action="api_ia.php" method="post">
       <label for="inputs">Digite sua mensagem para a IA:</label><br>
       <textarea name="inputs" id="inputs" rows="5" cols="50" required></textarea>
       <br><br>
       <button type="submit">Enviar para IA</button>
    </form>
</body>
</html>
