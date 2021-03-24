<?php
session_start();

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
        $pdo = new PDO('mysql:dbname=zairyou_kanri;charset=utf8;host=localhost', 'root', '');
    } catch (PDOException $e) {
        exit('DbConnectError:' . $e->getMessage());
    }
    return $pdo;
}
$pdo = conx_db();

$dbnm = $_SESSION['user_nm'];
