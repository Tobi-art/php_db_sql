<!-- パスワード変更フォームです。 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント管理</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <header>
        <?php include('_header.php') ?>
    </header>
    <main>
        <form action="account_chgpw_act.php" method="post" id='chgpw'>
            <h3>パスワード変更</h3>
            <label for="usrname">ユーザー名</label><input type="text" name='usrname'>
            <label for="pwold">パスワード</label><input type="password" name='pwold'>
            <label for="pwnew">新しいパスワード</label><input type="password" name='pwnew'><br>
            <button type="submit" form='chgpw'>変更する</button>
        </form>
    </main>
    <footer>
    </footer>
</body>

</html>