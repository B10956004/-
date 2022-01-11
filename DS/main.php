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
    session_start();
    $username = @$_SESSION['username'];
    $admin = @$_SESSION['admin'];
    echo "<H2>最新天氣預報載入中...</H2>";
    echo "<script>
        window.parent.frames[1].location.href='logout.php';
        </script>";
    echo "<script>
        setTimeout(function(){window.location.href='weather.php'},0);
    </script>";//reload API
    ?>

</body>

</html>