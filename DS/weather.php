

<?php

include('SQLserver.php');
$delete="TRUNCATE TABLE weather";
$result_d=mysqli_query($link,$delete);
set_time_limit(0); //設定執行時間無限制

$str = file_get_contents('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-2684EFDE-6489-4848-9145-C023C8793073&format=JSON&locationName=');
//接中央氣象局未來一周API
$json = json_decode($str, true); //解碼json

$locnum = count($json['records']['locations'][0]['location']); //計算縣市陣列數量
for ($i = 0; $i < $locnum; $i++) {
    $locationName = $json['records']['locations'][0]['location'][$i]['locationName'];
    $weatherElementnum = count($json['records']['locations'][0]['location'][$i]['weatherElement']); //計算天氣因子陣列數量
    for ($j = 0; $j < $weatherElementnum; $j++) {
        $elementName = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['elementName'];
        $description = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['description'];
        $timenum = count($json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time']); //計算時間陣列儲存數量
        for ($k = 0; $k < $timenum; $k++) {
            $startTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['startTime'];
            $endTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['endTime'];
            $elementValuenum = count($json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['elementValue']); //計算天氣因子的單位及數值的欄位數量
            for ($l = 0; $l < $elementValuenum; $l++) {
                $value = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['elementValue'][$l]['value'];
                $measures = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['elementValue'][$l]['measures'];
                $sql = "SELECT * FROM weather WHERE locationName='$locationName'AND elementName ='$elementName' AND description ='$description' AND startTime ='$startTime' AND endTime='$endTime' AND value='$value' AND measures='$measures'"; //抓取不重複資料
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                    $q = "INSERT INTO weather(locationName,elementName,description,startTime,endTime,value,measures) value('$locationName','$elementName','$description','$startTime','$endTime','$value','$measures')";
                    //新增資料
                    $result2 = mysqli_query($link, $q); //傳送至SQL後端
                }
            }
        }
    }
}
if (!$result2) {
    echo "<script>alert('執行SQL有誤，請聯絡網站管理員。')
    setTimeout(function(){window.location.href='weather_print.php';},500);
    </script>";
    sleep(5);
} else {
    echo "<script>
    setTimeout(function(){window.location.href='weather_print.php';},500);
</script>";
    sleep(5); //完成

}



?>
