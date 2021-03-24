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
        <!-- <div id="halfleft"> -->
        <form action="_chgpw.php" method="post">
            <h2>パスワード変更</h2>
            <label for="username">ユーザー名</label><input type="text" 　name='username'>
            <label for="pwold">パスワード</label><input type="text" name='pwold'>
            <label for="pwnew">新しいパスワード</label><input type="text" name='pwnew'><br>
            <button type="submit">変更する</button>
        </form>


        <!-- </div> -->
        <!-- <div id="halfright"> -->
        <form action="newuser_act.php" method="post" id="new_u">
            <h2>新規登録</h2>
            <label for="user">ユーザー名</label><input type="text" name="user"><br>
            <label for="pass1">パスワード</label><input type="password" name="pass1"><br>
            <label for="pass2">パスワード再確認</label><input type="password" name="pass2"><br>
            <div class="buttons">
                <button type="submit" form="new_u">登録する</button>
            </div>
            <!-- </div> -->
    </main>
    <footer>
        <a href="account_delete.php"><button>アカウント削除</button></a>
    </footer>
</body>

</html>