<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Criar Nova conta</h1>
     <form action="salvar_cadastro.php" method="POST">
      <label>Nome</label>
       <input type="text" name="novo_nome" >
        <br><br>
      <label>E-mail</label>
        <input type="email" name="email" >
         <br><br>
      <label>Senha</label>
       <!-- CORRIGIDO: Alterado o name de "senha_login" para "nova_senha" -->
       <input type="password" name="nova_senha">
       <br><br>
        <button type="submit">Criar</button>
         <?php
         echo '<a href="login.php">Fazer login</a>';
         ?>
     </form>
</body>
</html>
