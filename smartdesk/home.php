<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tutor IA de Hardware</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {

            min-height: 100vh;

            font-family: Arial, sans-serif;

            background: #0f172a;

            color: white;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 20px;

        }


        .container {

            width: 100%;

            max-width: 800px;

            background: #1e293b;

            padding: 30px;

            border-radius: 20px;

            box-shadow: 0 10px 40px rgba(0,0,0,0.4);

        }


        h1 {

            text-align: center;

            margin-bottom: 10px;

            color: #60a5fa;

        }


        .usuario {

            text-align: center;

            color: #cbd5e1;

            margin-bottom: 25px;

        }


        textarea {

            width: 100%;

            min-height: 130px;

            resize: vertical;

            padding: 15px;

            border: none;

            border-radius: 12px;

            background: #0f172a;

            color: white;

            font-size: 16px;

            outline: none;

        }


        textarea:focus {

            box-shadow: 0 0 0 2px #3b82f6;

        }


        button {

            width: 100%;

            margin-top: 15px;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background: #2563eb;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;

        }


        button:hover {

            background: #1d4ed8;

        }


        button:disabled {

            opacity: 0.6;

            cursor: wait;

        }


        /* CARREGAMENTO */

        #carregamento {

            display: none;

            text-align: center;

            margin-top: 25px;

            padding: 25px;

            background: #0f172a;

            border-radius: 15px;

        }


        .robo {

            font-size: 50px;

            animation: flutuar 1.5s infinite ease-in-out;

        }


        #carregamento h3 {

            margin-top: 10px;

            color: #60a5fa;

        }


        #carregamento p {

            margin-top: 10px;

            color: #94a3b8;

        }


        /* PONTOS */

        .pontos {

            display: flex;

            justify-content: center;

            gap: 8px;

            margin-top: 20px;

        }


        .pontos span {

            width: 10px;

            height: 10px;

            background: #3b82f6;

            border-radius: 50%;

            animation: pulsar 1.2s infinite;

        }


        .pontos span:nth-child(2) {

            animation-delay: 0.2s;

        }


        .pontos span:nth-child(3) {

            animation-delay: 0.4s;

        }


        /* RESPOSTA */

        #areaResposta {

            display: none;

            margin-top: 25px;

            padding: 20px;

            background: #0f172a;

            border-radius: 15px;

        }


        #areaResposta h2 {

            color: #60a5fa;

            margin-bottom: 15px;

            font-size: 20px;

        }


        #respostaIA {

            color: #e2e8f0;

            line-height: 1.7;

            white-space: pre-wrap;

            overflow-wrap: anywhere;

        }


        /* ANIMAÇÕES */

        @keyframes pulsar {

            0%, 60%, 100% {

                opacity: 0.3;

                transform: translateY(0);

            }

            30% {

                opacity: 1;

                transform: translateY(-8px);

            }

        }


        @keyframes flutuar {

            0%, 100% {

                transform: translateY(0);

            }

            50% {

                transform: translateY(-10px);

            }

        }
      .btn{
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 9999;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 70px;
      }

    </style>

</head>


<body>


<div class="container">


    <h1>🤖 Tutor IA de Hardware</h1>


    <?php if (isset($_SESSION["nome"])): ?>

        <div class="usuario">

            Olá, <?= htmlspecialchars($_SESSION["nome"]) ?>!

        </div>

    <?php endif; ?>


    <!-- FORMULÁRIO -->

    <form id="formularioIA">


        <textarea

            id="pergunta"

            name="pergunta"

            placeholder="Digite sua pergunta sobre hardware..."

            required

        ></textarea>


        <button type="submit" id="botaoEnviar">

            Perguntar à IA

        </button>


    </form>


    <!-- CARREGAMENTO -->

    <div id="carregamento">


        <div class="robo">

            🤖

        </div>


        <h3>

            A IA está pensando...

        </h3>


        <div class="pontos">

            <span></span>

            <span></span>

            <span></span>

        </div>


        <p>

            Preparando sua resposta...

        </p>


    </div>


    <!-- RESPOSTA -->

    <div id="areaResposta">


        <h2>

            🤖 Resposta da IA

        </h2>


        <div id="respostaIA"></div>


    </div>


</div>


<script>


const formulario = document.getElementById("formularioIA");

const carregamento = document.getElementById("carregamento");

const areaResposta = document.getElementById("areaResposta");

const respostaIA = document.getElementById("respostaIA");

const botaoEnviar = document.getElementById("botaoEnviar");


formulario.addEventListener("submit", async function(event) {


    event.preventDefault();


    const pergunta = document

        .getElementById("pergunta")

        .value

        .trim();


    if (pergunta === "") {

        return;

    }


    /*

       MOSTRA CARREGAMENTO

    */

    carregamento.style.display = "block";


    /*

       ESCONDE RESPOSTA ANTERIOR

    */

    areaResposta.style.display = "none";

    respostaIA.textContent = "";


    /*

       DESABILITA BOTÃO

    */

    botaoEnviar.disabled = true;

    botaoEnviar.textContent = "Consultando IA...";


    /*

       ENVIA PERGUNTA PARA O PHP

    */

    const dados = new FormData();

    dados.append("pergunta", pergunta);


    try {


        const resposta = await fetch("api_ia.php", {

            method: "POST",

            body: dados

        });


        const resultado = await resposta.json();


        if (!resposta.ok) {

            throw new Error(

                resultado.erro ||

                "Erro ao consultar a IA."

            );

        }


        /*

           MOSTRA RESPOSTA

        */

        respostaIA.textContent = resultado.resposta;


        areaResposta.style.display = "block";


    }


    catch (erro) {


        areaResposta.style.display = "block";


        respostaIA.textContent =

            "❌ " + erro.message;


    }


    finally {


        /*

           ESCONDE CARREGAMENTO

        */

        carregamento.style.display = "none";


        /*

           ATIVA BOTÃO NOVAMENTE

        */

        botaoEnviar.disabled = false;

        botaoEnviar.textContent = "Perguntar à IA";


    }


});


</script>
<form action="sair.php">
    <button class="btn" type="submit">sair</button>
</form>
</body>

</html>