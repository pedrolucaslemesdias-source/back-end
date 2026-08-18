<?php
// Configurações do banco de dados
$host = 'localhost';
$banco = 'usuarios'; // Certifique-se de que este banco já existe no MySQL
$usuario = 'root';     // Usuário padrão do XAMPP
$senha = '';           // Senha padrão do XAMPP é vazia

try {
    // Cria a conexão usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    
    // Configura o PDO para mostrar erros na tela caso aconteçam
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se a conexão falhar, exibe o erro e para a execução
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
