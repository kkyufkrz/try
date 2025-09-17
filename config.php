<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "payroll";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Base URL
$BASE_URL = "http://localhost:8080/UJIKOMPETENSI/";
?>