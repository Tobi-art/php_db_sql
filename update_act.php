<!-- データ変更機能。 -->
<?php
include('_ident.php');
include('_conx.php');

$id = $_POST['id'];
$org = $_POST['org'];
$category = $_POST['category'];
$item = $_POST['item'];
$location = $_POST['location'];
$expire = $_POST['expire'];

$update = $pdo->prepare('UPDATE ' . $dbnm . ' SET category=:category, item=:item, location=:location, expire=:expire WHERE id=:id');

$update->bindValue(':category', $category, PDO::PARAM_STR);
$update->bindValue(':item', $item, PDO::PARAM_STR);
$update->bindValue(':location', $location, PDO::PARAM_STR);
$update->bindValue(':expire', $expire, PDO::PARAM_STR);
$update->bindValue(':id', $id, PDO::PARAM_STR);

$status = $update->execute();

if ($status == false) {
    exit('Error');
} else {
    // 成功すれば、ボタンを押す前見たページに戻ります。
    if ($org == 'exp') {
        header('Location: home.php');
    } elseif ($org == 'viewCat') {
        header('Location: viewByCategory.php');
    } else {
        header('Location: viewByDate.php');
    }
}
