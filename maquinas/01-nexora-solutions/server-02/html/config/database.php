<?php

$host = 'localhost';
$dbname = 'nexora_intranet';
$username = 'nexora_app';
$password = 'NexoraDB2026!';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

} catch (PDOException $e) {
    error_log(
        'Error de conexión con la base de datos: ' . $e->getMessage()
    );

    http_response_code(500);

    exit(
        'No se ha podido conectar con el servicio de intranet.'
    );
}