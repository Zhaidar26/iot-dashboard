<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include "db.php";
$sql = mysqli_query($koneksi, "SELECT esp_suhu, esp_kelembapan, co, co2, nh4, waktu FROM datasensor ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($sql);

if ($data) {
    echo json_encode([
        'temperature' => $data['esp_suhu'] . '°C',
        'humidity' => $data['esp_kelembapan'] . '%',
        'co' => $data['co'] . ' PPM',
        'co2' => $data['co2'] . ' PPM',
        'nh4' => $data['nh4'] . ' PPM',
        'timestamp' => $data['waktu']
    ]);
} else {
    echo json_encode([
        'error' => 'No Data'
    ]);
}