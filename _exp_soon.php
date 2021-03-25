<!-- 賞味期限が最も短い食品五つを表示します。 -->
<?php
include('_ident.php');
include('_conx.php');

$stmt = $pdo->prepare('SELECT * FROM ' . $dbnm . ' ORDER BY expire asc LIMIT 5');
$status = $stmt->execute();

$view = '<tr><th>賞味期限</th><th>品名</th></tr>';
if ($status == false) {
    exit('Error!');
} else {
    //テーブルレイアウトの方が見やすいので、テーブルに入れておきます。
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td>';
        $view .= '<a href="update.php?id=' . $result["id"] . '&org=exp">';
        $view .= $result['expire'];
        $view .= '</a> ';
        $view .= '</td>';
        $view .= '<td>';
        $view .= '<a href="update.php?id=' . $result["id"] . '&org=exp">';
        $view .= $result['item'];
        $view .= '</a> ';
        $view .= '</td>';
        $view .= '<td>';
        $view .= '<a href="_delete.php?id=' . $result["id"] . '&org=exp">';
        $view .= '<button type="submit" class="dlt">削除</button>';
        $view .= '</a>';
        $view .= '</td>';
        $view .= '</tr>';
    }
    $view .= '<tr><td><br></td></tr>';
}
?>
<div class="view"><?= $view ?></div>