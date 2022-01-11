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
    //date_default_timezone_set('時區');
    date_default_timezone_set('Asia/Taipei');
    $admin = $_SESSION['admin'];
    $today = date("Y-m-d"); //抓取今日時間

    $today2 = date("Y-m-d G:i:s"); //過下午五點換明天
    $today_array = explode(" ", $today2);

    if($today_array[1]>='17:00:00')
    {
        $today=date("Y-m-d", strtotime("$today+1 day"));
    }
    $week=date("Y-m-d", strtotime("$today+6 day"));

    $min=$today.'T00:00';
    $max=$week.'T00:00';
    if ($admin != 1) {
        echo "<script>
    alert('權限不足');
    setTimeout(function(){window.parent.location.reload();},0);
    </script>";
    }
    else {
        echo"<form name='form' method='post' action='admin_weather_add_action.php'>
        縣市:<select name='city' required>
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
        <br>
        天氣因子：<select name='elementName' required>
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
        </select><br>
        開始時間：<input type='datetime-local' name='startTime' min='$min' max='$max' step='1' required /> <br>
        結束時間:<input type='datetime-local' name='endTime' min='$min' max='$max' step='1' required /> <br>
        值:<input type='text' name='value' required/> <br>
        單位:<input type='text' name='measures' required/> <br>
        <input type='submit' name='button' value='新增' />&nbsp;&nbsp;
    </form>";
    }
    ?>
    
</body>

</html>