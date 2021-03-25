<!-- パスワードを変更する機能です。 -->
<?php
include('_conx.php');
include('_ident.php');

$usrname = $_POST['usrname'];
$pwold = $_POST['pwold'];
$pwnew = $_POST['pwnew'];

//誰でも変更できれば困るので、先ずは現在のパスワードを確認してから変更処理に入ります。
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
    //反応がないと、実行されたかよく分からないですが、phpページをそれ以上増やしたくなかったのでJSで対応しています。
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
