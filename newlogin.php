<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>

<body>
    <?php
    session_start();
    $user = $_SESSION["new_u"];
    include('header.php');

    try {
        $pdo = new PDO('mysql:dbname=storage_db;charset=utf8;host=localhost', 'root', '');
    } catch (PDOException $e) {
        exit('DbConnectError:' . $e->getMessage());
    }

    $stmt = $pdo->prepare('SELECT id FROM user_id WHERE ":nm" = user_nm');
    $stmt->bindValue(":nm", $user, PDO::PARAM_STR);
    $status = $stmt->execute();

    ?>
    <p>新しいユーザー "<?= $user ?>"を登録しました。<br>ユーザー名とパスワードでログインして下さい。</p>
    <main>

        <form action="login_act.php" method="post">
            <label for="user">User:</label><input type="text" name="user"><br>
            <label for="pwd">Password:</label><input type="password" name="pwd"><br>
            <button type="submit">Login</button>
        </form>

    </main>
    <footer></footer>
</body>

</html>