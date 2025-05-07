<?php
require "db.php";
$data = json_decode(file_get_contents('php://input'), true);
$suhu = $data['esp_suhu'] ?? null;
$kelembapan = $data['esp_kelembapan'] ?? null;
$co = $data['co'] ?? null;
$co2 = $data['co2'] ?? null;
$nh4 = $data['nh4'] ?? null;
$query = "INSERT INTO datasensor (esp_suhu, esp_kelembapan, co, co2, nh4) VALUES ($suhu, $kelembapan, $co, $co2, $nh4)";

if ($koneksi->query($query)) {
    echo json_encode("✅ Datanya masuk maseh - Suhu: $suhu, Kelembapan: $kelembapan");
} else {
    echo json_encode("⛔ Error DB: " . $koneksi->error);
}

