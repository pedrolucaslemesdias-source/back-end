<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
      <header class="topo">
     <h1>Bem-vindo ao Smartdesk</h1>
     <p>O seu argente de T.I que resolve problemas mais rapido que um Bit</p>
     </header>

 
    <div class="form">
    <form action="validar_login.php" method="POST">

        <label>Nome</label>
        <br><br>

        <input type="text" id="nome" name="nome" required>
        <br><br>

        <label>senha</label>
        <br><br>

        <input type="password" id="senha" name="senha" required>
        <br><br>
        
        <button type="submit">Entrar</button>
    </form>
    </div>
  
</body>
</html>