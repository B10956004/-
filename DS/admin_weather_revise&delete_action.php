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
    $locationName = $_POST['city'];
    $elementName = $_POST['elementName'];
    $description = $_POST['description'];
    $startTime = $_GET['startTime'];
    $endTime = $_GET['endTime'];
    $value = $_POST['value'];
    $measures = $_POST['measures'];
    @$updata = $_POST['updata'];
    @$delete = $_POST['delete'];
    if ($delete == '刪除') {
        $sql = "DELETE FROM weather WHERE locationName='$locationName' AND elementName='$elementName' AND description='$description' AND startTime='$startTime' AND endTime='$endTime' AND value='$value' AND measures='$measures'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='admin_weather_revise.php?no=';},500);
            </script>";
        } else {
            echo "<script>
            alert('刪除成功')
            setTimeout(function(){window.location.href='admin_weather_revise.php?no=';},500);
            </script>";
        }
    }
    if ($updata == '更新') {
        $sql = "UPDATE weather SET value ='$value' ,measures='$measures' WHERE locationName='$locationName' AND elementName='$elementName' AND description='$description' AND startTime='$startTime' AND endTime='$endTime'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='admin_weather_revise.php?no=';},500);
            </script>";
        } else {
            echo "<script>
            alert('更新成功')
            setTimeout(function(){window.location.href='admin_weather_revise.php?no=';},500);
            </script>";
        }
    }
    ?>
</body>

</html>