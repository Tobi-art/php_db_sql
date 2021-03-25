<?php

include('_func.php');

$usrname = $_POST['usrname'];
$pwold = $_POST['pwold'];
$pwnew = $_POST['pwnew'];

$sql = 'SELECT * FROM user_id WHERE user_nm=:usrname AND user_pw=:pwold';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':usrname', $usrname);
$stmt->bindValue(':pwold', $pwold);
$res = $stmt->execute();

if ($res == false) {
    exit('Something went wrong. Please try again');
}

$val = $stmt->fetch();


if ($val != '') {
    $sql = 'UPDATE user_id SET user_pw=:pwnew WHERE user_nm=:usrname AND user_pw=:pwold';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usrname', $usrname);
    $stmt->bindValue(':pwold', $pwold);
    $stmt->bindValue(':pwnew', $pwnew);
    $res = $stmt->execute();

    echo ('<script>
            if(confirm("パスワーを変更しました。")){
                window.location.href = "login.php";
            } else {
                window.location.href = "login.php";}
        </script>');
} else {
    echo ('<script>
            if(confirm("パスワーを変更できませんでした。再度試して下さい。")){
                window.location.href = "account_chgpw.php";
            } else {
                window.location.href = "account_chgpw.php";}
        </script>');
}
