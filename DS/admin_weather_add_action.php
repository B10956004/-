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
    $s = 1;
    $locationName = $_POST['city'];
    $elementName = $_POST['elementName'];

    if ($elementName == 'WeatherDescription')        $description = '天氣預報綜合描述';

    if ($elementName == 'Wx')        $description = '天氣現象';

    if ($elementName == 'MaxT')        $description = '最高溫度';

    if ($elementName == 'T')        $description = '平均溫度';

    if ($elementName == 'MinT')        $description = '最低溫度';

    if ($elementName == 'MaxAT')        $description = '最高體感溫度';

    if ($elementName == 'MinAT')        $description = '最低體感溫度';

    if ($elementName == 'UVI')        $description = '紫外線指數';

    if ($elementName == 'MaxCI')        $description = '最大舒適度指數';

    if ($elementName == 'MinCI')        $description = '最小舒適度指數';

    if ($elementName == 'PoP12h')        $description = '12小時降雨機率';

    if ($elementName == 'RH')        $description = '相對溼度';

    if ($elementName == 'Td')        $description = '平均露點溫度';

    if ($elementName == 'WS')        $description = '最大風速';

    if ($elementName == 'WD')        $description = '風向';

    if($elementName=='請選擇'||$locationName=='請選擇') {
        echo "<script>alert('縣市或天氣因子不可為空!')
            setTimeout(function(){window.location.href='main.php';},0);
            </script>";
        $s = 0;
    }
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $value = $_POST['value'];
    $measures =$_POST['measures'];
    if ($s) {
        $sql = "SELECT * FROM weather WHERE locationName='$locationName'AND elementName ='$elementName' AND description ='$description' AND startTime ='$startTime' AND endTime='$endTime'AND value='$value' AND measures ='$measures'"; //抓取不重複資料
        $result = mysqli_query($link, $sql);//連接後端
        $row = mysqli_num_rows($result);//有無重複
        if ($row == 0) {
            $q = "INSERT INTO weather(locationName,elementName,description,startTime,endTime,value,measures) value('$locationName','$elementName','$description','$startTime','$endTime','$value','$measures')";
            //新增資料
            $result2 = mysqli_query($link, $q); //傳送至SQL後端
            if (!$result) {
                echo "<script>alert('執行SQL有誤')
                setTimeout(function(){window.location.href='main.php';},0);
                </script>";
            } else {
                echo "<script>
                alert('新增成功')
                setTimeout(function(){window.location.href='main.php';},0);
                </script>";
            }
        } else {
            echo "<script>alert('此天氣紀錄已重複，請重新輸入。')
            setTimeout(function(){window.location.href='main.php';},0);
            </script>";
        }
    }




    ?>
</body>

</html>