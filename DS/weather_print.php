<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <input type='button' onclick="javascript:location.href='weather.php'" value='更新天氣資訊'></input>
            </td>
            <?php
            header('content-type:text/html;charset=utf-8');
            //date_default_timezone_set('時區');
            date_default_timezone_set('Asia/Taipei');
            @$city = $_GET['city'];
            include('SQLserver.php');
            set_time_limit(0); //設定執行時間無限制
            echo "<h4>歡迎光臨天氣預報查詢網站。</h4>";
            echo "<h3>此網站每下午五點後，從明日顯示。</h3>";
            if ($city == '請選擇') {
                echo "<h2>請選擇縣市</h2>";
            }
            echo "<td><form name='form' method='post' id='city_s' action='weather_print_action.php'>";
            echo "縣市:<select name='city' id='city'>";
            echo "<option value='請選擇'>請選擇</option>";
            echo "<option value='基隆市'>基隆市</option>";
            echo "<option value='臺北市'>臺北市</option>";
            echo "<option value='新北市'>新北市</option>";
            echo "<option value='桃園市'>桃園市</option>";
            echo "<option value='新竹市'>新竹市</option>";
            echo "<option value='新竹縣'>新竹縣</option>";
            echo "<option value='苗栗縣'>苗栗縣</option>";
            echo "<option value='臺中市'>臺中市</option>";
            echo "<option value='彰化縣'>彰化縣</option>";
            echo "<option value='南投縣'>南投縣</option>";
            echo "<option value='雲林縣'>雲林縣</option>";
            echo "<option value='嘉義市'>嘉義市</option>";
            echo "<option value='嘉義縣'>嘉義縣</option>";
            echo "<option value='臺南市'>臺南市</option>";
            echo "<option value='高雄市'>高雄市</option>";
            echo "<option value='屏東縣'>屏東縣</option>";
            echo "<option value='宜蘭縣'>宜蘭縣</option>";
            echo "<option value='花蓮縣'>花蓮縣</option>";
            echo "<option value='臺東縣'>臺東縣</option>";
            echo "<option value='澎湖縣'>澎湖縣</option>";
            echo "<option value='金門縣'>金門縣</option>";
            echo "<option value='連江縣'>連江縣</option>";
            echo "</select>";
            echo "<input type='submit' id='sub' name='button' value='查詢' />";
            echo "</form></td>";
            echo "</tr>";
            echo "</table>";

            $today = date("Y-m-d"); //抓取今日時間
            $week = date("Y-m-d", strtotime("$today+8 day"));
            $today2 = date("Y-m-d G:i:s"); //抓取今日時間
            $today_array = explode(" ", $today2); //抓取 G:i:s
            if ($today_array[1] >= '17:00:00') { //API更新
                $today = date("Y-m-d", strtotime("$today+1 day"));
                $week = date("Y-m-d", strtotime("$today+8 day"));
            }

            if ($city != '') {
                $loop = 0;
                $sql = "SELECT * FROM weather WHERE locationName = '$city' AND startTime BETWEEN  '$today' AND '$week'";
                $result = mysqli_query($link, $sql);
                echo "<table border=1>";
                echo "<tr>";
                while ($date = mysqli_fetch_array($result)) {
                    if ($loop == 0) {
                        $location = $date['locationName'];
                        echo "<td>$location</td>";
                    }
                    $startTime = $date['startTime'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    $tmp;
                    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                    if ($d != @$tmp) { //不重複日期
                        echo "<td>" . date('m-d', strtotime($d)) . '<BR>星期' . $weekarray[date("w", strtotime($d))] . "</td>";
                        $tmp = $d;
                        $loop++;
                    }
                    if ($loop == 7) {
                        echo "</tr>";
                        $loop = 0;
                        break;
                    }
                }
                echo "<tr>";
                $sql2 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MinT' AND startTime BETWEEN  '$today' AND '$week'";
                $result2 = mysqli_query($link, $sql2);
                $min = array();
                $max = array();
                $i = 0;
                while ($temperature_min = mysqli_fetch_array($result2)) {
                    $min[$i] = 100;
                    if ($loop == 0) {
                        echo "<td>白天</td>";
                        $loop++;
                    }
                    $startTime = $temperature_min['startTime'];
                    $endTime = $temperature_min['endTime'];
                    $value = $temperature_min['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($value < $min[$i]) {
                        $min[$i] = $value;
                    }
                    if ($endTime == $d . ' 18:00:00.000000') {
                        $loop++;
                        $i++;
                    }
                    if ($loop == 8) {
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }

                $sql3 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MaxT' AND startTime BETWEEN  '$today' AND '$week'";
                $result3 = mysqli_query($link, $sql3);
                while ($temperature_max = mysqli_fetch_array($result3)) {
                    $max[$i] = 0;
                    $startTime = $temperature_max['startTime'];
                    $endTime = $temperature_max['endTime'];
                    $value = $temperature_max['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($value >= $max[$i]) {
                        $max[$i] = $value;
                    }
                    if ($endTime == $d . ' 18:00:00.000000') {
                        echo '<td>' . $min[$i] . '-' . "$max[$i]" . '°C </td>';
                        $loop++;
                        $i++;
                    }
                    if ($loop == 7) {
                        echo "</tr>";
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }
                echo "<tr>";

                $loop = 0;
                $sql4 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MinT' AND startTime BETWEEN  '$today' AND '$week'";
                $result4 = mysqli_query($link, $sql4);
                //$min = array();
                //$max = array();
                $i = 0;
                while ($temperature_min = mysqli_fetch_array($result4)) {
                    $min[$i] = 100;
                    if ($loop == 0) {
                        echo "<td>晚上</td>";
                        $loop++;
                    }
                    $startTime = $temperature_min['startTime'];
                    $endTime = $temperature_min['endTime'];
                    $value = $temperature_min['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($endTime == date('Y-m-d', strtotime("$d+1 day")) . ' 06:00:00.000000') {
                        $min[$i] = $value;
                        $loop++;
                        $i++;
                    }
                    if ($loop == 8) {
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }
                $sql5 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MaxT' AND startTime BETWEEN  '$today' AND '$week'";
                $result5 = mysqli_query($link, $sql5);
                while ($temperature_max = mysqli_fetch_array($result5)) {
                    $max[$i] = 0;
                    $startTime = $temperature_max['startTime'];
                    $endTime = $temperature_max['endTime'];
                    $value = $temperature_max['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($endTime == date('Y-m-d', strtotime("$d+1 day")) . ' 06:00:00.000000') {
                        $max[$i] = $value;
                        echo '<td>' . $min[$i] . '-' . "$max[$i]" . '°C </td>';
                        $loop++;
                        $i++;
                    }
                    if ($loop == 7) {
                        echo "</tr>";
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }

                echo "<tr>";

                $loop = 0;
                $sql6 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MinAT' AND startTime BETWEEN  '$today' AND '$week'";
                $result6 = mysqli_query($link, $sql6);
                $sql7 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='MaxAT' AND startTime BETWEEN  '$today' AND '$week'";
                $result7 = mysqli_query($link, $sql7);
                $i = 0;
                $min = array(100,);
                $max = 0;
                while ($temperature_min = mysqli_fetch_array($result6)) {
                    if ($loop == 0) {
                        echo "<td>體感溫度</td>";
                        $loop++;
                    }
                    $startTime = $temperature_min['startTime'];
                    $endTime = $temperature_min['endTime'];
                    $value = $temperature_min['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($value <= $min[$i]) {
                        $min[$i] = $value;
                    }
                    if ($endTime == date('Y-m-d', strtotime("$d+1 day")) . ' 06:00:00.000000') {
                        $loop++;
                        $i++;
                        $min[$i] = 100;
                    }
                    if ($loop == 8) {
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }
                while ($temperature_max = mysqli_fetch_array($result7)) {
                    $startTime = $temperature_max['startTime'];
                    $endTime = $temperature_max['endTime'];
                    $value = $temperature_max['value'];
                    $startTime_array = explode(" ", $startTime);
                    $d = $startTime_array[0];
                    if ($value > $max) {
                        $max = $value;
                    }
                    if ($endTime == date('Y-m-d', strtotime("$d+1 day")) . ' 06:00:00.000000') {
                        echo '<td>' . "$min[$i]"."-"."$max" . "°C</td>";
                        $loop++;
                        $i++;
                        $max = 0;
                    }
                    if ($loop == 8) {
                        echo "</tr>";
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }
                echo "<tr>";
                $loop = 0;
                $sql8 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='UVI' AND startTime BETWEEN  '$today' AND '$week'";
                $result8 = mysqli_query($link, $sql8);
                $i = 0;
                while ($UV = mysqli_fetch_array($result8)) {
                    if ($loop == 0) {
                        echo "<td>紫外線指數<BR>(紫外線指數 曝曬級數)</td>";
                    }
                    $startTime = $UV['startTime'];
                    $endTime = $UV['endTime'];
                    $value = $UV['value'];
                    if ($i % 2 == 0) {
                        echo '<td>' . $value . "  ";
                    } else {
                        echo  $value . '</td>';
                    }
                    $i++;
                    $loop++;
                    if ($loop == 14) {
                        echo "</tr>";
                        $loop = 0;
                        $i = 0;
                        break;
                    }
                }
                echo "<tr>";

                $sql8 = "SELECT * FROM weather WHERE locationName = '$city' AND elementName='Wx' AND startTime BETWEEN  '$today' AND '$week'";
                $result8 = mysqli_query($link, $sql8);
                $i = 0;
                while ($weather = mysqli_fetch_array($result8)) {
                    if ($i == 0) {
                        echo "<td>天氣現象</td>";
                    }
                    $startTime = $weather['startTime'];
                    $endTime = $weather['endTime'];
                    $value = $weather['value'];
                    $endTime = $weather['endTime'];


                    if ($i % 2 == 1) {
                        echo "<td>";
                        echo $value . '<BR>';
                        $weather = mysqli_fetch_array($result8);
                        $weather = mysqli_fetch_array($result8);
                        $value = $weather['value'];
                        echo $value;
                        echo "</td>";
                    }
                    $i++;
                    if ($i > 13) {
                        echo "</tr>";
                        $i = 0;
                        break;
                    }
                }
                echo "<table />";
            }
            ?>

</body>

</html>