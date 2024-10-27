<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe as respostas das perguntas
    $resposta_pergunta1 = $_POST['resposta1'] ?? null; // Certifique-se de que o nome do campo é 'resposta1'
    $resposta_pergunta2 = $_POST['resposta2'] ?? null; // Certifique-se de que o nome do campo é 'resposta2'
    $resposta_pergunta2 = $_POST['resposta3'] ?? null; // Certifique-se de que o nome do campo é 'resposta2'
    $resposta_pergunta2 = $_POST['resposta4'] ?? null; // Certifique-se de que o nome do campo é 'resposta2'

    // Inicializa uma variável para armazenar mensagens de erro
    $erros = [];

    // Valida a resposta da pergunta 1
    if ($resposta_pergunta1) {
        $_SESSION['resposta_pergunta1'] = $resposta_pergunta1;
    } else {
        $erros[] = "Por favor, responda à pergunta 1.";
    }

    // Valida a resposta da pergunta 2
    if ($resposta_pergunta2) {
        $_SESSION['resposta_pergunta2'] = $resposta_pergunta2;
    } else {
        $erros[] = "Por favor, responda à pergunta 2.";
    }

    if ($resposta_pergunta3) {
        $_SESSION['resposta_pergunta3'] = $resposta_pergunta2;
    } else {
        $erros[] = "Por favor, responda à pergunta 3.";
    }

    if ($resposta_pergunta2) {
        $_SESSION['resposta_pergunta4'] = $resposta_pergunta2;
    } else {
        $erros[] = "Por favor, responda à pergunta 4.";
    }

    // Verifica se há erros
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo $erro . "<br>"; // Exibe cada mensagem de erro
        }
        exit(); // Encerra a execução se houver erros
    }

    // Se não houver erros, redireciona para index.php
    header('Location: index.php');
    exit(); // Finaliza o script após o redirecionamento
} else {
    echo "Método de requisição inválido.";
}
?>
