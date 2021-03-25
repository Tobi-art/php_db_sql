<!-- dbに接続します。
全てのページに読み込みますので、一箇所変更すれば別のdbに帰ることができます。 -->
<?php
$dbnm = $_SESSION['user_nm'];

try {
    $pdo = new PDO('mysql:dbname=zairyou_kanri;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
}
return $pdo;
