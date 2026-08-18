<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
     <h1>Login</h1>
    <form action="validar_login.php" method="POST">
    <label>usuario</label>
      <input type="text"  name="usuario" required>
       <br> <br>
        <label>senha</label>
      <input type="password" name="senha" required>
       <br> <br>
       <button type="submit">Entrar</button>
        <br> <br>
    
        <?php
         echo '<a href="nova_conta.php">Criar nova conta</a>'
        ?>
    </form> 
      
</body>
</html>