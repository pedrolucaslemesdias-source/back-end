<?php
session_start();

// 1. CORREÇÃO: Verifica se a requisição realmente veio do formulário (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Coleta os dados enviados
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    
    // Suas credenciais definidas
    $adm = "pedro";
    $pwd = "123456";

    // 2. Compara os dados dentro do bloco correto
    if ($nome == $adm && $senha == $pwd) {
        $_SESSION["nome"] = $nome;
        
        // 3. CORREÇÃO: Altere "home.php" para o nome real do seu arquivo da home!
        header("Location: home.php"); 
        exit;
    } else {
        // Se errar a senha ou usuário
        echo "Senha ou Usuário incorreto.";
        echo "<br>";
        echo '<a href="login.php">Tente novamente.</a>';
    }

} else {
    // Se alguém tentar acessar esse arquivo direto pelo navegador, manda de volta para o login
    header("Location: login.php");
    exit;
}
?>
