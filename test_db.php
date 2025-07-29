<?php
header('Content-Type: application/json');

try {
    require_once 'config/db.php';
    echo json_encode(['status' => 'success', 'message' => 'Conexão com o banco bem-sucedida!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao conectar: ' . $e->getMessage()]);
}
