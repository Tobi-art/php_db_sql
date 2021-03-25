<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <header>
        <!-- navigationボタンが付いているのでheaderは全てのページに必要です。includeで簡単に表示できるので、専用ページを作成しています。 -->
        <h1>在庫管理表</h1>
        <!-- <div id="logout"> -->
        <a href="account.php" style="position: absolute; top: 20px; right: 20px"><button>アカウント管理</button></a>
        <!-- </div> -->
        <div id="navbar">
            <a href="home.php">
                <h4 id="home">ホーム画面</h4>
            </a>
            <a href="viewByDate.php">
                <h4 id="overview">在庫一覧</h4>
            </a>
            <a href="input.php">
                <h4 id="new">新規登録</h4>
            </a>

        </div>
    </header>
</body>

</html>