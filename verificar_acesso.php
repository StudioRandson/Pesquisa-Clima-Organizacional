<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <title>Pesquisa de Clima Organizacional</title>
</head>
<body>
<?php
session_start();

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesquisa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar o CPF do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];

    // Buscar o ID do CPF e verificar se já foi usado
    $stmt = $conn->prepare("SELECT id, acessou FROM acessos WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $acessou);
        $stmt->fetch();

        if ($acessou == 0) {
            $_SESSION['acessos_id'] = $id; // Armazenar ID na sessão

            // Marcar o CPF como acessado
            $updateStmt = $conn->prepare("UPDATE acessos SET acessou = 1 WHERE id = ?");
            $updateStmt->bind_param("i", $id);
            $updateStmt->execute();
            $updateStmt->close();

            // Redirecionar para a página de pesquisa
            header("Location: pesquisa.php");
            exit();
        } else {
            $message = "Este CPF já foi usado para acessar o formulário.";
        }
    } else {
        $message = "CPF não encontrado!";
    }

    $stmt->close();
}

// Exibir mensagem se existir
if (isset($message)) {
    echo "<script>
            Swal.fire({
                title: 'Aviso',
                text: '$message',
                icon: 'warning',
                confirmButtonText: 'OK',
                background: 'white',
                color: 'black'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
          </script>";
}

$conn->close();
?>

<!-- Formulário para capturar o CPF -->
<form method="POST" action="">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>
    <button type="submit">Acessar</button>
</form>

</body>
</html>
