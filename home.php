<!-- ホーム画面。便利な機能いくつかまとめたサイトです。賞味期限の最も短い商品と各カテゴリーの残存並びに、検索機能を用意しています。 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>概要</title>
    <?php include('_stylelink.php') ?>

</head>

<body>
    <header>
        <?PHP
        include('_header.php') ?>
    </header>
    <main>
        <div id='display'>
            <h5 class='view'>賞味期限が迫っている!</h5>
            <table>
                <?PHP include('_exp_soon.php') ?>
            </table>
        </div>
        <div id="searchbar">
            <form action="search.php" method="post" class='inputForm'>
                <label for="search">何か探していますか？</label>
                <input type="text" id="search" name="search"><br>
                <button type="submit">検索</button>
            </form>
            <br>
            <div id="byCategory">
                <table id='rest'>
                    <?php include('_counts.php') ?>
                </table>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>