<?php
$id = $_GET['id'];
$org = $_GET['org'];

include('_func.php');

$delete = $pdo->prepare('DELETE FROM ' . $dbnm . ' WHERE id=:id');
$delete->bindValue(':id', $id, PDO::PARAM_INT);
$status = $delete->execute();

if ($status == false) {
    exit('Error');
} else {
    if ($org == 'exp') {
        header('Location: home.php');
    } elseif ($org == 'viewCat') {
        header('Location: viewByCategory.php');
    } else {
        header('Location: viewByDate.php');
    }
}
