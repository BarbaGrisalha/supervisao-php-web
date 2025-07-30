<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

require_once 'models/Sensor.php';
require_once 'controllers/AlertController.php';

$sensorModel = new Sensor();
$sensores = $sensorModel->getSensorData();

// Dados aleatórios para o gráfico
$tempData = [rand(20, 90), rand(20, 90), rand(20, 90), rand(20, 90), rand(20, 90)];
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Painel de Supervisão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Relógio no canto superior direito -->
    <div class="text-end text-muted mb-2 me-3 mt-2">
        <span id="clock"></span>
    </div>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Painel de Supervisão</h2>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>

        <div class="row">
            <?php foreach ($sensores as $sensor): ?>
                <div class="col-md-4">
                    <div class="card border-<?php echo checkAlert($sensor) ? 'danger' : 'success'; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($sensor['name']) ?></h5>
                            <p class="card-text display-6"><?= htmlspecialchars($sensor['value']) ?></p>
                            <?php if (checkAlert($sensor)): ?>
                                <?php
                                try {
                                    if (is_writable('logs')) {
                                        logAlerta($sensor);
                                    } else {
                                        error_log("Pasta logs não tem permissão de escrita.");
                                    }
                                } catch (Throwable $e) {
                                    error_log("Erro ao gravar log: " . $e->getMessage());
                                }
                                ?>
                                <div class="alert alert-danger p-2 mt-2">⚠ Valor Crítico!</div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <hr>

        <h4>Gráfico - Temperatura</h4>
        <canvas id="tempChart" height="100"></canvas>
    </div>

    <script>
        window.tempData = <?= json_encode($tempData) ?>;
    </script>
    
    <script src="assets/js/chart-handler.js"></script>

</body>

</html>