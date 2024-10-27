

<?php
session_start();
include 'conexao.php'; // Inclui o arquivo de conexão

// Processar o CPF e a unidade do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'] ?? null; // Captura o CPF
    $unidade = $_POST['unidade'] ?? null; // Captura a unidade selecionada

    // Validação para CPF e unidade
    if (empty($cpf) || empty($unidade)) {
        $_SESSION['alert'] = "Por favor, preencha todos os campos.";
        header("Location: index.php");
        exit();
    }

    // Buscar o ID do CPF e verificar se já foi usado
    try {
        $stmt = $pdo->prepare("SELECT id, acessado FROM acessos WHERE cpf = ?");
        $stmt->execute([$cpf]);

        if ($stmt->rowCount() > 0) {
            $stmt->bindColumn(1, $id);
            $stmt->bindColumn(2, $acessado);
            $stmt->fetch(PDO::FETCH_BOUND);

            if ($acessado == 0) {
                $_SESSION['acessos_id'] = $id; // Armazenar ID na sessão

                // Marcar o CPF como acessado
                $stmt_update = $pdo->prepare("UPDATE acessos SET acessado = 1, unidade = ? WHERE id = ?");
                $stmt_update->execute([$unidade, $id]); // Armazena a unidade também

                // Redirecionar para a página de pesquisa
                header("Location: pesquisa.php");
                exit();
            } else {
                // Define uma mensagem de alerta na sessão
                $_SESSION['alert'] = "Este CPF já foi usado para acessar a Pesquisa.";
                header("Location: index.php"); // Redireciona para que o alerta seja mostrado
                exit();
            }
        } else {
            // Define uma mensagem de alerta na sessão
            $_SESSION['alert'] = "CPF não encontrado!";
            header("Location: index.php"); // Redireciona para que o alerta seja mostrado
            exit();
        }
    } catch (PDOException $e) {
        die("Erro ao consultar o banco de dados: " . $e->getMessage());
    }
}

// Verifica se há uma mensagem de alerta na sessão
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']); // Remove a mensagem da sessão para que não apareça novamente
    echo "<script>
            window.onload = function() {
                Swal.fire('Atenção', '$alert', 'warning');
            };
          </script>";
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Pesquisa Organizacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .favicon {
            width: 150px;
        }

        .unidade {
            color: #000000;
        }
    </style>
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <img src="images/favicon.png" class="heading-section favicon">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Selecione sua <b>UNIDADE</b> e digite o seu <b>CPF</b></h3>
                        <form action="index.php" method="post" class="signin-form">
                            <div class="form-group">
                                <label for="unidade"></label>
                                <select id="unidade" name="unidade" class="form-control unidade" required>
                                    <option value="" disabled selected>Selecionar Unidade</option>
                                    <option class="unidade" value="joao pessoa">João Pessoa</option>
                                    <option class="unidade" value="campina grande">Campina Grande</option>
                                    <!-- Adicione mais opções conforme necessário -->
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="cpf" name="cpf" maxlength="11" class="form-control" placeholder="CPF" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Acessar Pesquisa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
