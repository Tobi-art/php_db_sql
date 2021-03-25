<!-- テーブルからデータを削除します。 -->
<?php
include('_ident.php');
include('_conx.php');

$id = $_GET['id'];
$org = $_GET['org'];

$delete = $pdo->prepare('DELETE FROM ' . $dbnm . ' WHERE id=:id');
$delete->bindValue(':id', $id, PDO::PARAM_INT);
$status = $delete->execute();

if ($status == false) {
    exit('Error');
} else {
    //削除後、ボタンを押す前見たベージに戻ります。
    if ($org == 'exp') {
        header('Location: home.php');
    } elseif ($org == 'viewCat') {
        header('Location: viewByCategory.php');
    } else {
        header('Location: viewByDate.php');
    }
}
