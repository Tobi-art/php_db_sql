<!-- 検索機能。入力、表示、php -->
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
    <?php
    include('_func.php');
    include('_conx.php');
    include('_header.php');

    $search = $_POST['search'];

    $stmt = $pdo->prepare('SELECT * FROM ' . $dbnm . ' WHERE category LIKE :search OR item LIKE :search OR location LIKE :search OR expire LIKE :search');
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $status = $stmt->execute();

    $view = '<tr><th>賞味期限</th><th>種類</th><th>品名</th><th>保存場所</th></tr>';
    if ($status == false) {
        exit('error!');
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<tr>';
            $view .= '<td>';
            $view .= '<a href="update.php?id=' . $result["id"] . '">';
            $view .= $result['expire'];
            $view .= '</a> ';
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="update.php?id=' . $result["id"] . '">';
            $view .= $result['category'];
            $view .= '</a> ';
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="update.php?id=' . $result["id"] . '">';
            $view .= $result['item'];
            $view .= '</a> ';
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="update.php?id=' . $result["id"] . '">';
            $view .= $result['location'];
            $view .= '</a> ';
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="_delete.php?id=' . $result["id"] . '">';
            $view .= '<button type="submit" class="dlt">削除</button>';
            $view .= '</a>';
            $view .= '</td>';
            $view .= '</tr>';
        }
        $view .= '<tr><td><br></td><td></td></tr>';
    }
    ?>
    <main>
        <div id="searchresults">

            <?php
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