<?php
include('_func.php');

$category = 'test2';
$item = 'test2';
$location = 'test2';

$sql = ('INSERT INTO ' . $dbnm . ' (id, category, item, location, expire, indate) VALUES(NULL, :category, :item, :location, sysdate(), sysdate())');
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":category", $category);
$stmt->bindValue(":item", $item);
$stmt->bindValue(":location", $location);
$status = $stmt->execute();

var_dump($status);
exit;
