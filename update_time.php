<?php
session_start();
$username = $_SESSION['username'];
$data = date('Y-m-d H:i:s'); // Получаем текущее время

try {
    include('config.php');
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("UPDATE users SET active = :data WHERE name = :username");
    $stmt->bindParam(':data', $data, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    echo json_encode(['status' => 'success', 'time' => $data]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

