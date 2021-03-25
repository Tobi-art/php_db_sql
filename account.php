<!-- アカウント管理画面です。こちらからパスワード変更、新規登録、アカウント削除機能にアクセスできます。 -->
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
        <div id='accounts' style='display: flex; flex-direction: column; padding-top: 5vw'>
            <a href="_logout.php"><button>ログアウト</button></a>
            <a href="account_chgpw.php"><button>パスワード変更</button></a>
            <a href="account_new.php"><button>アカウント新規作成</button></a>
            <a href="account_drop.php"><button>アカウント削除</button></a>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>