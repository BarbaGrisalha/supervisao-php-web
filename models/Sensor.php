<?php
// models/Sensor.php

class Sensor {
    public function getSensorData() {
        return [
            ['name' => 'Temperatura', 'value' => rand(20, 100)],
            ['name' => 'Pressão', 'value' => rand(1, 6)],
            ['name' => 'Umidade', 'value' => rand(30, 95)],
        ];
    }
}
