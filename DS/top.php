<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();
$admin = $_SESSION['admin'];//身分區別功能不同
$no = $_SESSION['no'];
if ($admin != 1) {
    echo "<a href='login.php' target='logout'>登入</a><BR>";
    echo "<a href='register.php' target='logout'>註冊</a><BR>";
    if ($no != null) {
        echo "<a href='logout.php' target='logout'>登出</a><BR>";
    }
    echo "<a href='member_printf.php' target='main'>會員資訊</a><BR>";
    echo "<a href='weather.php' target='main'>未來一週天氣查詢</a><BR>";
    echo "<a href='main.php'target='main'>回首頁</a><BR>";
}
if ($admin == 1) {
    echo "<a href='member_printf.php' target='main'>會員資訊</a><BR>";
    echo "<a href='admin_member_revise.php?no=' target='main'>修改其他會員資訊</a><BR>";
    echo "<a href='admin_weather_add.php' target='main'>新增一週天氣紀錄</a><BR>";
    echo "<a href='admin_weather_revise&delete.php' target='main'>修改一週天氣紀錄</a><BR>";
    echo "<a href='weather.php' target='main'>一週天氣查詢</a><BR>";
    echo "<a href='main.php' target='main'>回首頁</a><BR>";
}
?>

<body>

</body>

</html>