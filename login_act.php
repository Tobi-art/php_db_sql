<?php
include('_func.php');

$user = $_POST['user'];
$pwd = $_POST['pwd'];

$sql = 'SELECT * FROM user_id WHERE user_nm=:user AND user_pw=:pwd';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user', $user);
$stmt->bindValue(':pwd', $pwd);
$res = $stmt->execute();

if ($res == false) {
    exit('Something went wrong. Please try again');
}

$val = $stmt->fetch();


if ($val != '') {
    $_SESSION['chk_ssid'] = session_id();
    // $_SESSION['life_flag'] = $val['life_flag'];
    $_SESSION['user_nm'] = $val['user_nm'];

    header('Location: home.php');
} else {
    header('Location: login.php');
}
