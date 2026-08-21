<?php
// Configurações do banco de dados
$host    = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "cadastro";

try {
    // Cria a conexão via PDO configurando o banco e o charset utf8mb4
    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    
    // Define o relatório de erros para lançar exceções (Exclusivo do PDO)
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configura o retorno padrão para Arrays Associativos (mais prático)
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Caso ocorra falha na conexão, captura o erro de forma limpa
    die("Houve um erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
