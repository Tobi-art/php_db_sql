<?php
session_start();

$dbnm = $_SESSION['user_nm'];

function ident()
{
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        header('Location: login.php');
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}
ident();

function conx_db()
{
    try {
        $pdo = new PDO('mysql:dbname=storage_db;charset=utf8;host=localhost', 'root', '');
    } catch (PDOException $e) {
        exit('DbConnectError:' . $e->getMessage());
    }
    return $pdo;
}
$pdo = conx_db();
?>

<link rel="stylesheet" href="CSS/reset.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/style.css">