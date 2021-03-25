<!-- 新しいアカウントを作成します。 -->
<?php
$user = $_POST['user'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

//ユーザーネームなし、またはパスワードとパスワード確認欄が一致しないとNGです。
if ($pass1 != $pass2) {
    exit('パスワードは一致しません。<a href="account.php"><button>戻る</button><a>');
} elseif ($user == "") {
    exit('ユーザー名を入力して下さい。<a href="account.php"><button>戻る</button><a>');
};

include('_conx.php');
//ユーザーデータベースに新しいユーザーを追加します。
$sql = 'INSERT INTO user_id (id, user_nm, user_pw, life_flag, indate) VALUES (null, :user, :pass, "0", sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass1, PDO::PARAM_STR);
$res = $stmt->execute();

if ($res = false) {
    exit('問題が発生しました。再度試して下さい。<br><a href="account.php"><button>戻る</button></a>');
}
//新しく登録したユーザーと同名のテーブルを作成します。各ユーザーは自分のテーブルにしかアクセスできません。
$sql = 'CREATE TABLE ' . $user . ' (id INT(12) PRIMARY KEY AUTO_INCREMENT, category VARCHAR(32) NOT NULL, item VARCHAR(32) NOT NULL, location VARCHAR(32) NOT NULL, expire DATE NOT NULL, indate DATETIME NOT NULL)';
$stmt = $pdo->prepare($sql);
$create = $stmt->execute();

if ($create != true) {
    header('Location: account.php');
} else {
    //反応がないと、実行されたかよく分からないですが、phpページをそれ以上増やしたくなかったのでJSで対応しています。
    echo ('<script>    
            if(confirm("成功しました。新しいユーザー名とパスワードでログインして下さい。")){
                window.location.href = "login.php";
            } else {
                window.location.href = "login.php";}
            </script>');
}
