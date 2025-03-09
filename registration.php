<?php
try {
    $dsn = "mysql:host=localhost;dbname=skyrim_npc_battles";
    $user = "root";
    $password = "root";

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
        $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name);");
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->execute();

        header("Location: menu.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
