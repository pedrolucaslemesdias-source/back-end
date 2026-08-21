<?php
// 1. OBRIGATÓRIO: Inicia a sessão para o PHP lembrar quem está logado.
// Deve ser sempre a primeira linha do arquivo, sem espaços antes.
session_start();

// 2. SEGURANÇA: Verifica se a sessão do usuário existe.
// Se NÃO existir o ID na sessão, significa que não fez login.
if (!isset($_SESSION["usuario_id"])) {
    // Expulsa o invasor direto para a tela de login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
    <!-- Se você tiver um arquivo CSS, pode linkar ele aqui -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); max-width: 600px; }
        .btn-sair { display: inline-block; padding: 10px 20px; background-color: #ff4d4d; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-sair:hover { background-color: #cc0000; }
    </style>
</head>
<body>

    <div class="container">
        <!-- Exibe o nome do usuário que guardamos na sessão durante o login -->
        <h1>Bem-vindo ao seu Painel, <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>! 🎉</h1>
        
        <p>Você realizou o login com sucesso no sistema.</p>
        
        <div style="background: #eef2f3; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3>Seus dados da sessão atual:</h3>
            <p><strong>ID da Conta:</strong> #<?php echo $_SESSION["usuario_id"]; ?></p>
            <p><strong>E-mail de Acesso:</strong> <?php echo htmlspecialchars($_SESSION["usuario_email"]); ?></p>
        </div>

        <br>
        <!-- Link para encerrar a sessão de forma segura -->
        <a href="logout.php" class="btn-sair">Sair da Conta</a>
    </div>

</body>
</html>