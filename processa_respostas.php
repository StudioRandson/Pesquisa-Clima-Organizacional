<?php
session_start();
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se as respostas estão disponíveis na sessão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura as respostas das perguntas
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'pergunta') === 0 || $key === 'comentario') { // Inclui o comentário
            $_SESSION[$key] = htmlspecialchars($value);
        }
    }

    // Verifica se todas as perguntas foram respondidas
    if (isset($_SESSION['pergunta1'], $_SESSION['pergunta2'], $_SESSION['pergunta3'], $_SESSION['pergunta4'], $_SESSION['comentario'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO respostas (pergunta1, pergunta2, pergunta3, pergunta4, comentario, acessos_id) VALUES (?, ?, ?, ?, ?, ?)");
            
            // Usar o ID armazenado na sessão
            $acessos_id = $_SESSION['acessos_id'] ?? null;

            if ($acessos_id === null) {
                die("ID de acesso não encontrado. O usuário precisa acessar o sistema corretamente.");
            }

            $stmt->execute([
                $_SESSION['pergunta1'],
                $_SESSION['pergunta2'],
                $_SESSION['pergunta3'],
                $_SESSION['pergunta4'],
                $_SESSION['comentario'], // Captura o comentário
                $acessos_id
            ]);

            // Limpa as respostas da sessão
            session_unset();

            // Redireciona para a página de agradecimento
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            die("Erro ao inserir no banco de dados: " . $e->getMessage());
        }
    } else {
        // Redireciona de volta para o formulário se alguma resposta estiver faltando
        header("Location: pesquisa.php");
        exit();
    }
}
?>
