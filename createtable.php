<?php
try {
    $pdo = new PDO('mysql:dbname=storage_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
}
$tablename = 'hu_world';

$sql = 'CREATE TABLE ' . $tablename . ' (id INT(12) PRIMARY KEY AUTO_INCREMENT, name VARCHAR(12) NOT NULL, mail VARCHAR(24) NOT NULL)';
$stmt = $pdo->prepare($sql);
$create = $stmt->execute();

var_dump($create);
exit;
