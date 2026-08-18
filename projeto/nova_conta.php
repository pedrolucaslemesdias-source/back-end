<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Criar Nova conta</h1>
     <form action="database_usuario.php" method="POST">
      <label >nome</label>
       <input type="text" nome="novo-nome">
         <br><br>
      <label>E-mail</label>
       <input type="email" nome="email">
       <br><br>
      <label >Senha</label>
       <input type="password" name="nova-senha">
      <br><br>
        <button type="subimit">Criar</button>
     </form>
</body>
</html>