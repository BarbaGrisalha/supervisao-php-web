<?php
// controllers/AlertController.php

function checkAlert($sensor) {
    switch ($sensor['name']) {
        case 'Temperatura':
            return $sensor['value'] > 75;
        case 'Pressão':
            return $sensor['value'] > 4.5;
        case 'Umidade':
            return $sensor['value'] > 85;
        default:
            return false;
    }

function logAlerta($sensor){
   
         $logFile = __DIR__ .'/../logs/alert_log.txt';
    $data = date('Y-m-d H:i:s');
    $linha = "[$data] ALERTA: Sensor '{$sensor['name']}' com valor crítico: {$sensor['value']}\n";
    file_put_contents($logFile,$linha,FILE_APPEND);
   
}    
}
