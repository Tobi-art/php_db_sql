<!-- 各カテゴリーに該当するエントリーを数え、その数字を表示します。 -->
<?php
$stmt = $pdo->prepare('SELECT category, count(category) AS CountOf FROM ' . $dbnm . ' GROUP BY category');
$status = $stmt->execute();

//テーブルレイアウトの方が見やすいので、テーブルに入れておきます。
$count = '<tr><th colspan="2">残存</th></tr>';
if ($status == false) {
    exit('Error!');
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $count .= '<tr>';
        $count .= '<td>';
        $count .= $result['category'];
        $count .= '</a> ';
        $count .= '</td>';
        $count .= '<td>';
        $count .= $result['CountOf'];
        $count .= '</a> ';
        $count .= '</td>';
        $count .= '</tr>';
    }
    $count .= '<tr><td><br></td><td></td></tr>';
}
?>
<div class="counts"><?= $count ?></div>