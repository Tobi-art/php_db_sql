<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント削除</title>
    <?php include('_stylelink.php') ?>
</head> -->

<body>
    <?php include('_header.php');
    echo ('<script>alert("アカウントを削除すると全てのデータが破棄され、復旧できません！")</script>');
    ?>
    <main>
        <form action="account_drop_act.php" method="post">
            <h2>アカウント削除すると、全てのデータが破棄されます。<br><br>復旧できませんので、ご注意下さい。<br><br>ユーザー名とパスワードを入力し,「削除」をクリックすると<br>アカウントが削除されます。</h2>
            <label for="user">User:</label><input type="text" name="user"><br>
            <label for="pwd">Password:</label><input type="password" name="pwd"><br>
            <button type="submit">削除</button>
        </form>
    </main>
</body>
<footer></footer>

</html>