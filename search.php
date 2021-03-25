<!-- 検索結果表示 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>捜索</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <?php include('_header.php') ?>
    <main>
        <div id="searchresults">

            <?php
            include('search_act.php');
            if ($view === '<tr><th>賞味期限</th><th>種類</th><th>品名</th><th>保存場所</th></tr><tr><td><br></td><td></td></tr>') {
                $view = "何も見つかりませんでした";
            } else {
                $view = $view;
            }
            ?>
            <table>
                <div class="view"><?= $view ?></div>
            </table>
            <div id="controls">
                <div id="searchbar">
                    <form action="search.php" method="post" class='inputForm'>
                        <label for="search">別の物を検索</label>
                        <input type="text" id="search" name="search"><br>
                        <button type="submit">検索</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>