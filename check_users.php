<?php
try {
    $pdo = new PDO('mysql:host=minthcm-db;dbname=minthcm', 'root', 'minthcm');
    $result = $pdo->query('SELECT COUNT(*) as count FROM users');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo 'Users count: ' . $row['count'] . PHP_EOL;
    
    // Get user list
    $result = $pdo->query('SELECT id, user_name, status FROM users LIMIT 5');
    echo "\nExisting users:\n";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "  - " . $row['user_name'] . " (status: " . $row['status'] . ")\n";
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
?>
