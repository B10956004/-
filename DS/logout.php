<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('SQLserver.php');
    session_start();
    $account = $_SESSION['account'];
    $admin = $_SESSION['admin'];
    $no = $_SESSION['no'];
    $name = $_SESSION['username'];


    $type = "";
    if ($admin == 1) {
        $type = "管理員";
    } elseif ($admin == 0) {
        $type = "一般會員";
    }
    if ($admin != -1) {
        echo "$name $type 你好!<BR><form name='form' method='post' action='logout_action.php'><input type='hidden'name='logout'value='logout'><input type='submit' value='登出'></form>";
    }
    if ($no == null) {
        echo "歡迎光臨天氣預報查詢網站。";
    } 

    ?>

</body>

</html>