<?php
require_once "proteger.php";
header("Content-Type: application/json; charset=UTF-8");

function responder($dados, $status = 200) {
    http_response_code($status);
    echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    responder(["erro" => "Método inválido."], 405);
}

$pergunta = trim($_POST["pergunta"] ?? "");

if ($pergunta === "") {
    responder(["erro" => "Digite uma pergunta."], 400);
}

$token = gitenv("API_TOKEN");

$url = "https://router.huggingface.co/v1/chat/completions";

$dados = [
    "model" => "openai/gpt-oss-120b:fastest",
    "messages" => [
        [
            "role" => "system",
            "content" => "Você é um tutor de hardware. Responda em português brasileiro de forma simples e didática."
        ],
        [
            "role" => "user",
            "content" => $pergunta
        ]
    ],
    "stream" => false
];

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $token,
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($dados),
    CURLOPT_TIMEOUT => 120
]);

$resposta = curl_exec($ch);
$erro = curl_error($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($resposta === false) {
    responder(["erro" => "Falha na conexão: " . $erro], 500);
}

$resultado = json_decode($resposta, true);

if ($status < 200 || $status >= 300) {
    responder([
        "erro" => $resultado["error"]["message"]
            ?? "Erro ao consultar a inteligência artificial."
    ], $status);
}

$texto = $resultado["choices"][0]["message"]["content"] ?? "";

responder([
    "resposta" => $texto
]);