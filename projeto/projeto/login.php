<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body> <!-- Corrigido de <bod> para <body> -->

     <div class="login">
        <h1>Login</h1>
     </div>

     <div class="formulario">
        <!-- O formulário envia os dados por padrão para validar_login.php -->
        <form action="validar_login.php" method="POST">
            <label>Usuário (E-mail)</label>
            <!-- Alterado o name para "email_login" para bater com o arquivo de validação -->
            <input type="email" name="email_login" required>
            <br> <br>
            
            <label>Senha</label>
            <!-- Alterado o name para "senha_login" para bater com o arquivo de validação -->
            <input type="password" name="senha_login" required>
            <br> <br>
            
            <!-- Removido o formaction. Agora ele segue o padrão e vai para validar_login.php -->
            <button type="submit">Entrar</button>
            <br> <br>
            
            <?php
            // Adicionado o ponto e vírgula que faltava no final
            echo '<a href="nova_conta.php">Criar nova conta</a>';
            ?>
        </form> <!-- Fechamos o formulário primeiro -->
    </div> <!-- Depois fechamos a div da classe formulario -->
      
</body>
</html>
