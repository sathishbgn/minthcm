<?php
try {
    $pdo = new PDO('mysql:host=minthcm-db;dbname=minthcm', 'root', 'minthcm');
    
    // Hash password: "minthcm123"
    // SuiteCRM uses MD5 hashing for passwords
    $newPassword = 'minthcm123';
    $passwordHash = md5($newPassword);
    
    // Update admin password
    $stmt = $pdo->prepare('UPDATE users SET user_hash = ? WHERE user_name = "admin"');
    $stmt->execute([$passwordHash]);
    
    echo "✓ Admin password reset successfully!\n";
    echo "Username: admin\n";
    echo "Password: minthcm123\n";
    
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
?>
