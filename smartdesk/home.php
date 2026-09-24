<?php
require_once "proteger.php"



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SmartDesk IA</title>
</head>

<body>

    <h1>
        Seja bem-vindo ao seu tutor SmartDesk-IA.
        
    </h1>

    <form action="api_ia.php" method="POST">

        <input
            type="text"
            name="pergunta"
            placeholder="Digite sua pergunta..."
            required
        >

        <button type="submit">
            Enviar
        </button>
    </form>
</body>

</html>

