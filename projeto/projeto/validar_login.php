<?php
session_start();
// Puxa a nova conexão PDO
require_once "conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Você criou as variáveis com "_login" no final
    $email_login = trim($_POST["email_login"]);
    $senha_login = trim($_POST["senha_login"]);

    // CORRIGIDO: Agora verifica as variáveis corretas ($email_login e $senha_login)
    if (empty($email_login) || empty($senha_login)) {
        die("Por favor, preencha todos os campos. <a href='login.php'>Voltar</a>");
    }

    try {
        $sql = "SELECT * FROM cadastro WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        
        // CORRIGIDO: Passando a variável $email_login para a consulta
        $stmt->execute([':email' => $email_login]);
        $usuario = $stmt->fetch();

        // CORRIGIDO: Testando a senha com a variável $senha_login
        if ($usuario && password_verify($senha_login, $usuario['senha'])) {
            
            // Guarda os dados na sessão
            $_SESSION["usuario_id"]    = $usuario['ID'] ?? $usuario['id'];
            $_SESSION["usuario_nome"]  = $usuario['nome'];
            $_SESSION["usuario_email"] = $usuario['email'];

            // Redireciona direto para o painel seguro
            header("Location: painel.php");
            exit;
        } else {
            echo "E-mail ou senha incorretos. <a href='login.php'>Tentar novamente</a>";
        }

    } catch (PDOException $e) {
        echo "Erro no sistema: " . $e->getMessage();
    }
}
?>
