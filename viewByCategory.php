<!-- 全てのデータの一覧です。カテゴリー順で表示されます。 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧</title>
    <?php include('_stylelink.php') ?>
</head>

<body>
    <header>
        <?php include('_header.php') ?>
    </header>
    <div class="m-left25px">
        <div class="buttons">
            <a href="viewByDate.php"><button type="submit" class="btnr">日付順表示</button></a>
        </div>
        <?php
        include('_ident.php');
        include('_conx.php');

        $stmt = $pdo->prepare('SELECT * FROM ' . $dbnm . ' ORDER BY category asc');
        $status = $stmt->execute();

        $view = '<tr><th>賞味期限</th><th>種類</th><th>品名</th><th>保存場所</th></tr>';
        if ($status == false) {
            exit('Error!');
        } else {
            //テーブルレイアウトの方が見やすいので、テーブルに入れておきます。
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $view .= '<tr>';
                $view .= '<td>';
                $view .= '<a href="update.php?id=' . $result["id"] . '&org=viewCat">';
                $view .= $result['expire'];
                $view .= '</a> ';
                $view .= '</td>';
                $view .= '<td>';
                $view .= '<a href="update.php?id=' . $result["id"] . '&org=viewCat">';
                $view .= $result['category'];
                $view .= '</a> ';
                $view .= '</td>';
                $view .= '<td>';
                $view .= '<a href="update.php?id=' . $result["id"] . '&org=viewCat">';
                $view .= $result['item'];
                $view .= '</a> ';
                $view .= '</td>';
                $view .= '<td>';
                $view .= '<a href="update.php?id=' . $result["id"] . '&org=viewCat">';
                $view .= $result['location'];
                $view .= '</a> ';
                $view .= '</td>';
                $view .= '<td>';
                $view .= '<a href="_delete.php?id=' . $result["id"] . '&org=viewCat">';
                $view .= '<button type="submit" class="dlt">削除</button>';
                $view .= '</a>';
                $view .= '</td>';
                $view .= '</tr>';
            }
            $view .= '<tr><td><br></td></tr>';
        }
        ?>
        <table>
            <div class="view"><?= $view ?></div>
        </table>
    </div>
    <footer></footer>
</body>

</html>