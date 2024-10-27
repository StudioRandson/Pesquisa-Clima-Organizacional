<?php

$usuario = 'root';
$senha = '';
$database = 'pesquisa';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verifique se houve erro na conexão
if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// Inicializa os arrays associativos para as respostas das perguntas
$dados = [
    'pergunta1' => [
        'ruim' => 0,
        'regular' => 0,
        'bom' => 0,
        'otimo' => 0
    ],
    'pergunta2' => [
        'ruim' => 0,
        'regular' => 0,
        'bom' => 0,
        'otimo' => 0
    ],
    'pergunta3' => [
        'ruim' => 0,
        'regular' => 0,
        'bom' => 0,
        'otimo' => 0
    ],
    'pergunta4' => [
        'ruim' => 0,
        'regular' => 0,
        'bom' => 0,
        'otimo' => 0
    ]
];

// Consulta a contagem de cada opção de resposta para 'pergunta1'
foreach ($dados['pergunta1'] as $resposta => &$total) {
    $sql = "SELECT COUNT(*) as total FROM respostas WHERE pergunta1 = ?";
    $stmt = $mysqli->prepare($sql); // Usar mysqli aqui
    $stmt->bind_param('s', $resposta); // 's' para string
    $stmt->execute();
    $result = $stmt->get_result(); // Obter o resultado

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row["total"] ?? 0; // Define a contagem ou 0 se não houver resultado
    }
    $stmt->close(); // Fechar a declaração
}

// Consulta a contagem de cada opção de resposta para 'pergunta2'
foreach ($dados['pergunta2'] as $resposta => &$total) {
    $sql = "SELECT COUNT(*) as total FROM respostas WHERE pergunta2 = ?";
    $stmt = $mysqli->prepare($sql); // Usar mysqli aqui
    $stmt->bind_param('s', $resposta); // 's' para string
    $stmt->execute();
    $result = $stmt->get_result(); // Obter o resultado

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row["total"] ?? 0; // Define a contagem ou 0 se não houver resultado
    }
    $stmt->close(); // Fechar a declaração
}

// Consulta a contagem de cada opção de resposta para 'pergunta3'
foreach ($dados['pergunta3'] as $resposta => &$total) {
    $sql = "SELECT COUNT(*) as total FROM respostas WHERE pergunta3 = ?";
    $stmt = $mysqli->prepare($sql); // Usar mysqli aqui
    $stmt->bind_param('s', $resposta); // 's' para string
    $stmt->execute();
    $result = $stmt->get_result(); // Obter o resultado

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row["total"] ?? 0; // Define a contagem ou 0 se não houver resultado
    }
    $stmt->close(); // Fechar a declaração
}

// Consulta a contagem de cada opção de resposta para 'pergunta4'
foreach ($dados['pergunta4'] as $resposta => &$total) {
    $sql = "SELECT COUNT(*) as total FROM respostas WHERE pergunta4 = ?";
    $stmt = $mysqli->prepare($sql); // Usar mysqli aqui
    $stmt->bind_param('s', $resposta); // 's' para string
    $stmt->execute();
    $result = $stmt->get_result(); // Obter o resultado

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row["total"] ?? 0; // Define a contagem ou 0 se não houver resultado
    }
    $stmt->close(); // Fechar a declaração
}

$mysqli->close(); // Fechar a conexão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Resultados da Pesquisa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            // Gráfico para Pergunta 1
            var data1 = google.visualization.arrayToDataTable([
                ['Opções', 'Quantidade'],
                ['Ruim', <?php echo $dados['pergunta1']['ruim']; ?>],
                ['Regular', <?php echo $dados['pergunta1']['regular']; ?>],
                ['Bom', <?php echo $dados['pergunta1']['bom']; ?>],
                ['Ótimo', <?php echo $dados['pergunta1']['otimo']; ?>]
            ]);

            var options1 = {
                title: 'Avaliação da Pergunta 1',
                pieHole: 0.4
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('donut_chart_pergunta1'));
            chart1.draw(data1, options1);

            // Gráfico para Pergunta 2
            var data2 = google.visualization.arrayToDataTable([
                ['Opções', 'Quantidade'],
                ['Ruim', <?php echo $dados['pergunta2']['ruim']; ?>],
                ['Regular', <?php echo $dados['pergunta2']['regular']; ?>],
                ['Bom', <?php echo $dados['pergunta2']['bom']; ?>],
                ['Ótimo', <?php echo $dados['pergunta2']['otimo']; ?>]
            ]);

            var options2 = {
                title: 'Avaliação da Pergunta 2',
                pieHole: 0.4
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('donut_chart_pergunta2'));
            chart2.draw(data2, options2);

            // Gráfico para Pergunta 3
            var data3 = google.visualization.arrayToDataTable([
                ['Opções', 'Quantidade'],
                ['Ruim', <?php echo $dados['pergunta3']['ruim']; ?>],
                ['Regular', <?php echo $dados['pergunta3']['regular']; ?>],
                ['Bom', <?php echo $dados['pergunta3']['bom']; ?>],
                ['Ótimo', <?php echo $dados['pergunta3']['otimo']; ?>]
            ]);

            var options3 = {
                title: 'Avaliação da Pergunta 3',
                pieHole: 0.4
            };

            var chart3 = new google.visualization.PieChart(document.getElementById('donut_chart_pergunta3'));
            chart3.draw(data3, options3);

            // Gráfico para Pergunta 4
            var data4 = google.visualization.arrayToDataTable([
                ['Opções', 'Quantidade'],
                ['Ruim', <?php echo $dados['pergunta4']['ruim']; ?>],
                ['Regular', <?php echo $dados['pergunta4']['regular']; ?>],
                ['Bom', <?php echo $dados['pergunta4']['bom']; ?>],
                ['Ótimo', <?php echo $dados['pergunta4']['otimo']; ?>]
            ]);

            var options4 = {
                title: 'Avaliação da Pergunta 4',
                pieHole: 0.4
            };

            var chart4 = new google.visualization.PieChart(document.getElementById('donut_chart_pergunta4'));
            chart4.draw(data4, options4);
        }
    </script>
</head>
<body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/favicon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Relatório
                </a>
                <form class="d-flex">            
                    <a href="logout.php" class="btn btn-outline-success" role="button">Sair</a>
                </form>
            </div>
        </nav>

    <div class="container mt-5">
        <h3><b>1. Eu considero a empresa um bom lugar para trabalhar?</b></h3><br>

        <!-- Resultados das respostas -->
        <p>Ruim - 😡 : <?php echo $dados['pergunta1']['ruim']; ?></p>
        <p>Regular - 😐 : <?php echo $dados['pergunta1']['regular']; ?></p>
        <p>Bom - 🙂 : <?php echo $dados['pergunta1']['bom']; ?></p>
        <p>Ótimo - 😍 : <?php echo $dados['pergunta1']['otimo']; ?></p>

        <!-- Gráfico de rosca para Pergunta 1 -->
        <div id="donut_chart_pergunta1" style="width: 600px; height: 400px;"></div>

        <h3><b>2. Qual seu nível de satisfação com a função que desempenha?</b></h3><br>

        <!-- Resultados das respostas -->
        <p>Ruim - 😡 : <?php echo $dados['pergunta2']['ruim']; ?></p>
        <p>Regular - 😐 : <?php echo $dados['pergunta2']['regular']; ?></p>
        <p>Bom - 🙂 : <?php echo $dados['pergunta2']['bom']; ?></p>
        <p>Ótimo - 😍 : <?php echo $dados['pergunta2']['otimo']; ?></p>

        <!-- Gráfico de rosca para Pergunta 2 -->
        <div id="donut_chart_pergunta2" style="width: 600px; height: 400px;"></div>

        <h3><b>3. Suas sugestões de melhoria e opiniões construtivas são ouvidas pela empresa?</b></h3><br>

        <!-- Resultados das respostas -->
        <p>Ruim - 😡 : <?php echo $dados['pergunta3']['ruim']; ?></p>
        <p>Regular - 😐 : <?php echo $dados['pergunta3']['regular']; ?></p>
        <p>Bom - 🙂 : <?php echo $dados['pergunta3']['bom']; ?></p>
        <p>Ótimo - 😍 : <?php echo $dados['pergunta3']['otimo']; ?></p>

        <!-- Gráfico de rosca para Pergunta 3 -->
        <div id="donut_chart_pergunta3" style="width: 600px; height: 400px;"></div>

        <h3><b>4. Como você avalia sua remuneração com o mercado local?</b></h3><br>

        <!-- Resultados das respostas -->
        <p>Ruim - 😡 : <?php echo $dados['pergunta4']['ruim']; ?></p>
        <p>Regular - 😐 : <?php echo $dados['pergunta4']['regular']; ?></p>
        <p>Bom - 🙂 : <?php echo $dados['pergunta4']['bom']; ?></p>
        <p>Ótimo - 😍 : <?php echo $dados['pergunta4']['otimo']; ?></p>

        <!-- Gráfico de rosca para Pergunta 4 -->
        <div id="donut_chart_pergunta4" style="width: 600px; height: 400px;"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
