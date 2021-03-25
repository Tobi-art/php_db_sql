<!-- アカウント削除 -->
<?php
include('_ident.php');
include('_conx.php');

$user = $_POST['user'];
$pwd = $_POST['pwd'];

// 先ずはパスワードを確認します。
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
    //パスワードが正しいならユーザー情報とそのユーザーに連携されているテーブルを削除します。
    $sql3 = 'DELETE FROM user_id WHERE user_nm=:user AND user_pw=:pwd';
    $stmt = $pdo->prepare($sql3);
    $stmt->bindValue(':user', $user);
    $stmt->bindValue(':pwd', $pwd);
    $res = $stmt->execute();

    $sql2 = 'DROP TABLE ' . $user;
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();

    //反応がないと、実行されたかよく分からないですが、phpページをそれ以上増やしたくなかったのでJSで対応しています。
    echo ('<script>
    if(confirm("アカウントを削除しました。")){
        window.location.href = "login.php";
    } else {
        window.location.href = "login.php";}
    </script>');
} else {
    echo ('account not deleted');
}
