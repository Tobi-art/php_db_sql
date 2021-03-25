<!-- 新規アカウント登録フォーム -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <header>
        <?php include('_header.php') ?>
    </header>
    <main>
        <form action="account_new_act.php" method="post" id="new_u" class='inputForm'>
            <label for="user">名前</label><input type="text" name="user"><br>
            <label for="pass1">パスワード</label><input type="password" name="pass1"><br>
            <label for="pass2">パスワード再確認</label><input type="password" name="pass2"><br>
            <div class="buttons">
                <button type="submit" form="new_u">登録する</button>
            </div>
    </main>
    <footer></footer>
</body>

</html>