<?php
include('_ident.php');
include('_conx.php');

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
