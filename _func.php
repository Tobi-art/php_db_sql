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
