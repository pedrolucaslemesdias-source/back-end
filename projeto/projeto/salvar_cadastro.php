<?php
// Puxa a sua conexão configurada em PDO
include("conexao.php");

// 1. Recebe os dados do formulário
$novo_nome  = $_POST["novo_nome"] ?? '';
$email      = $_POST["email"] ?? '';
$nova_senha = $_POST["nova_senha"] ?? '';

// 2. Validação de campos vazios
if (empty($novo_nome) || empty($email) || empty($nova_senha)) {
    die("Por favor, preencha todos os campos. <a href='nova_conta.php'>Voltar</a>");
}

// 3. Criptografa a senha de forma correta (Gera os 60 caracteres)
$senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

try {
    // 4. Prepara a consulta usando placeholders nomeados do PDO (:nome, :email, :senha)
    $sql = "INSERT INTO cadastro (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);

    // 5. Executa passando os valores mapeados diretamente no array
    $sucesso = $stmt->execute([
        ':nome'  => $novo_nome,
        ':email' => $email,
        ':senha' => $senha_hash // Envia a senha criptografada de verdade
    ]);

    if ($sucesso) {
        echo "Usuário cadastrado com sucesso! <a href='login.php'>Fazer Login</a>";
    } else {
        echo "Erro ao cadastrar usuário.";
    }

} catch (PDOException $e) {
    // 6. Trata erros caso o e-mail já exista no banco
    if ($e->getCode() == 23000) {
        echo "Erro ao cadastrar usuário: Este e-mail já está em uso. <a href='nova_conta.php'>Tente outro</a>";
    } else {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
}
?>
