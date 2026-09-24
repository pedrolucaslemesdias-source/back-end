<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acesso inválido.");
}

if (!isset($_POST["pergunta"])) {
    die("Nenhuma pergunta foi enviada.");
}

$pergunta = trim($_POST["pergunta"]);

if ($pergunta === "") {
    die("Digite uma pergunta.");
}


// SUA CHAVE DO HUGGING FACE



// API DO HUGGING FACE
$url = "https://router.huggingface.co/v1/chat/completions";


// Dados enviados para a IA
$dados = [
    "model" => "google/gemma-3-4b-it",

    "messages" => [
        [
            "role" => "system",
            "content" => "Você é um especialista em hardware de computadores. 
            Responda de forma simples, clara e objetiva."
        ],
        [
            "role" => "user",
            "content" => $pergunta
        ]
    ],

    "stream" => false
];


// Inicia CURL
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POST, true);


// Cabeçalhos
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $apiKey,
    "Content-Type: application/json"
]);


// Envia os dados
curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    json_encode($dados)
);


// Executa
$resposta = curl_exec($ch);


// Verifica erro do CURL
if ($resposta === false) {

    die("Erro no CURL: " . curl_error($ch));

}

curl_close($ch);


// Converte JSON
$resultado = json_decode($resposta, true);


// Interface
echo "<h1>🤖 Tutor IA de Hardware</h1>";


// Verifica resposta
if (isset($resultado["choices"][0]["message"]["content"])) {

    $texto = $resultado["choices"][0]["message"]["content"];

    echo "<h2>Resposta da IA:</h2>";

    echo "<p>";
    echo nl2br(htmlspecialchars($texto));
    echo "</p>";

} else {

    echo "<h2>Erro na API:</h2>";

    echo "<pre>";
    print_r($resultado);
    echo "</pre>";
}


echo '<br>';

echo '<a href="index.php">
        Fazer outra pergunta
      </a>';