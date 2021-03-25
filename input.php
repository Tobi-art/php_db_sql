<!-- データ入力フォーム -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <header>
        <?PHP
        include('_ident.php');
        include('_header.php')
        ?>
    </header>
    <main>
        <form action="input_act.php" method="post" id="registerNew" class='inputForm'>
            <label for="category">種類</label><input type="text" name="category"><br>
            <label for="item">品名</label><input type="text" name="item"><br>
            <label for="location">保存場所</label><input type="text" name="location"><br>
            <label for="expire">賞味期限</label><input type="date" name="expire"><br>
            <label for="quantity">何個登録する？ </label><input type="number" name="quantity" id="quantity" value="1">

            <div class="buttons">
                <button type="submit" form="registerNew">登録する</button>
            </div>
    </main>
    <footer></footer>
    </form>
</body>

</html>