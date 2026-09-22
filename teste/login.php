<!DOCTYPE html>
<html lang="pt-BR">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
</head>
<body>
     <!-- Certifique-se de que o arquivo PHP com seu código realmente se chama validar_login.php -->
     <form action="validar_login.php" method="POST">

          <label for="usuario">Usuário</label>
          <br><br>
          <input type="text" id="usuario" name="usuario">
          <br><br>
          
          <label for="senha">Senha</label>
          <br><br>
          <!-- CORREÇÃO: Alterado type para "password" (esconde as letras), id para "senha" e name para "senha" -->
          <input type="password" id="senha" name="senha"> 
          <br><br>
          
          <button type="submit">Entrar</button>
     </form>
</body>
</html>
