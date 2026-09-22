<?php

// 1. Configurações Iniciais
$token = ""; // Não se esqueça de colocar o seu token aqui dentro das aspas!

// Definimos o modelo que você quer usar
$modelo = "meta-llama/Llama-3.1-8B-Instruct";

// Montamos a URL da API do Hugging Face juntando a rota com o modelo escolhido
$url = "https://router.huggingface.co/v1/chat/completions" . $modelo;

// Para modelos de texto (estilo ChatGPT/Gemma), estruturamos a pergunta de forma clara
$textoParaAnalise = "Explique de forma curta o que é PHP.";

// 2. Preparação dos Dados
// Modelos de chat ou texto puro costumam ler melhor dentro de uma estrutura limpa de 'inputs'
$dados = json_encode(["inputs" => $textoParaAnalise]);

// 3. Configuração da Requisição (cURL)
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);

// 4. Cabeçalhos de Autenticação e Formato
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $token,
    "Content-Type: application/json"
]);

// 5. Execução e Envio
$resposta = curl_exec($ch);

// Verifica se ocorreu algum erro de conexão de rede
if (curl_errno($ch)) {
    echo 'Erro na conexão: ' . curl_error($ch);
    exit;
}

curl_close($ch);

// 6. Tratamento do Resultado
$resultado = json_decode($resposta, true);

// Exibe o resultado formatado na tela
echo "<pre>";
print_r($resultado);
echo "</pre>";

?>
