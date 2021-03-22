<?php
session_start();
if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    echo ('LOGIN ERROR');
    exit;
} else {
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <a href="logout.php">Logout</a>
</body>

</html>