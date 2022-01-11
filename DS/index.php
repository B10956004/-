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
    $_SESSION['admin'] = -1;
    $_SESSION['account'] = "";
    $_SESSION['main'] = "0";
    $_SESSION['username'] = "請先登入";
    $_SESSION['no'] = null;
    echo"<frameset rows='25%,75%'>";
    echo"<frameset cols='20%,80%'>";
    echo"<frame src='top.php' name='top'>";
    echo"<frame src='logout.php' name='logout'>";
    echo"</frameset>";
    echo"<frame src='main.php' name='main'>";
    echo"</frameset>";
    ?>
<body>

</body>

</html>