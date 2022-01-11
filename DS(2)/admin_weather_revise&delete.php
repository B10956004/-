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
    //date_default_timezone_set('時區');
    date_default_timezone_set('Asia/Taipei');
    $admin = $_SESSION['admin'];
    $today = date("Y-m-d"); //抓取今日時間
    $week = date("Y-m-d", strtotime("$today+8 day"));
    $today2 = date("Y-m-d G:i:s"); //抓取今日時間
    $today_array = explode(" ", $today2); //抓取 G:i:s
    if ($today_array[1] >= '17:00:00') { //API更新
        $today = date("Y-m-d", strtotime("$today+1 day"));
    }
    if ($admin == 1) { //是否為管理員
        @$city = $_GET['city'];
        @$element = $_GET['element'];
        $s = 0;
        echo "<h1>修改天氣資訊</h1>";
        //echo $city.$element;
        if ($city == '' || $element == '') {
            echo "請選擇縣市及天氣因子";
        } else {
            if ($city == '請選擇' || $element == '請選擇') {
                echo "請選擇縣市及天氣因子";
                header("location.href='Xadmin_weather_revise.php'");
            }
            $sql = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='$element' AND startTime BETWEEN  '$today' AND '$week'";
            $result = mysqli_query($link, $sql); //讀值
            $s = 1;
        }
        echo "<form action='admin_weather_select.php' method='POST'>
        縣市:<select name='city'>
        <option value='請選擇'>請選擇</option>
        <option value='基隆市'>基隆市</option>
        <option value='臺北市'>臺北市</option>
        <option value='新北市'>新北市</option>
        <option value='桃園市'>桃園市</option>
        <option value='新竹市'>新竹市</option>
        <option value='新竹縣'>新竹縣</option>
        <option value='苗栗縣'>苗栗縣</option>
        <option value='臺中市'>臺中市</option>
        <option value='彰化縣'>彰化縣</option>
        <option value='南投縣'>南投縣</option>
        <option value='雲林縣'>雲林縣</option>
        <option value='嘉義市'>嘉義市</option>
        <option value='嘉義縣'>嘉義縣</option>
        <option value='臺南市'>臺南市</option>
        <option value='高雄市'>高雄市</option>
        <option value='屏東縣'>屏東縣</option>
        <option value='宜蘭縣'>宜蘭縣</option>
        <option value='花蓮縣'>花蓮縣</option>
        <option value='臺東縣'>臺東縣</option>
        <option value='澎湖縣'>澎湖縣</option>
        <option value='金門縣'>金門縣</option>
        <option value='連江縣'>連江縣</option>
        </select>
        天氣因子:<select name='element'>
        <option value='請選擇'>請選擇</option>
        <option value='WeatherDescription'>天氣預報綜合描述</option>
        <option value='Wx'>天氣現象</option>
        <option value='MaxT'>最高溫度</option>
        <option value='T'>平均溫度</option>
        <option value='MinT'>最低溫度</option>
        <option value='MaxAT'>最高體感溫度</option>
        <option value='MinAT'>最低體感溫度</option>
        <option value='UVI'>紫外線指數</option>
        <option value='MaxCI'>最大舒適度指數</option>
        <option value='MinCI'>最小舒適度指數</option>
        <option value='PoP12h'>12小時降雨機率</option>
        <option value='RH'>相對溼度</option>
        <option value='Td'>平均露點溫度</option>
        <option value='WS'>最大風速</option>
        <option value='WD'>風向</option>
    </select>
                <input type='submit' value='查詢'>
            </form><BR>";
        if ($s) {
            while ($result_row = mysqli_fetch_array($result)) {
                $locationName  = $result_row['locationName'];
                $elementName  = $result_row['elementName'];
                $description  = $result_row['description'];
                $startTime  = $result_row['startTime'];
                $endTime  = $result_row['endTime'];
                $value  = $result_row['value'];
                $measures   = $result_row['measures'];
                echo "<form name='form' method='post' action='admin_weather_revise&delete_action.php?startTime=$startTime&endTime=$endTime'>
            縣市:$city<br><input type='hidden' name='city' value=$city>
            天氣因子：$elementName($description)<br><input type='hidden' name='elementName' value=$elementName><input type='hidden' name='description' value=$description>
            開始時間：$startTime<br><input type='hidden' name='startTime' value=$startTime>
            結束時間:$endTime<br><input type='hidden' name='endTime' value=$endTime>";
                if ($element == 'WeatherDescription') {
                    echo "值:<input type='text' name='value'  size=25  required value=$value  >";
                } else {
                    echo "值:<input type='text' name='value'  size=5  required value=$value  >";
                }
                $measures_array = explode(" ", $measures);
                if ($measures_array[0] != '自定義' && $measures_array[0] != 'NA') {
                    echo "單位:<input type='text' name='measures' size=5  required value=$measures  >";
                } else {
                    echo "<input type='hidden' name='measures' value=$measures>"; //不顯示未宣告單位
                }
                echo "&nbsp;<input type='submit' name='updata' value='更新'>&nbsp;&nbsp;
                            <input type='submit' name='delete' value='刪除'></form>";
            }
        }
    } else {
        echo "<script>
    alert('權限不足');
    setTimeout(function(){window.parent.location.reload();},0);
    </script>";
    }
    ?>


</body>

</html>