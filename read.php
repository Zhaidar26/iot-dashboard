<?php
header('Content-Type: application/json');
header('Acces-Control-Allow-Origin: *');
include "db.php";
$sql = mysqli_query($koneksi, "SELECT esp_suhu, esp_kelembapan, waktu FROM datasensor ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($sql);

if ($data) {
    echo json_encode([
        'temperature' => $data['esp_suhu'] . '°C',
        'humidity' => $data['esp_kelembapan'] . '%',
        'timestamp' => $data['waktu']
    ]);
} else {
    echo json_encode([
        'error' => 'No Data'
    ]);
}