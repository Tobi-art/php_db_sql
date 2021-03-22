<?php
session_start();

$user = $_POST['user'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$_SESSION["new_u"] = $user;

if ($pass1 != $pass2) {
    exit('パスワードは一致しません。<a href="newuser.php"><button>戻る</button><a>');
} elseif ($user == "") {
    exit('ユーザー名を入力して下さい。<a href="newuser.php"><button>戻る</button><a>');
};

try {
    $pdo = new PDO('mysql:dbname=storage_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
}

$sql = 'INSERT INTO user_id (id, user_nm, u_id, user_pw, life_flag, indate) VALUES (null, :user, null, :pass, "0", sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass1, PDO::PARAM_STR);
$res = $stmt->execute();

$sql = 'CREATE TABLE ' . $user . ' (id INT(12) PRIMARY KEY AUTO_INCREMENT, name VARCHAR(12) NOT NULL, mail VARCHAR(24) NOT NULL)';
$stmt = $pdo->prepare($sql);
$create = $stmt->execute();

if ($create == true) {
    echo "table created";
}

if ($create != true) {
    header('Location: newuser.php');
} else {
    header('Location: newlogin.php');
}
