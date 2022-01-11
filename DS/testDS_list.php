

<?php

include('SQLserver.php');

$str = file_get_contents('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-2684EFDE-6489-4848-9145-C023C8793073&format=JSON&locationName=');

$json = json_decode($str, true);

$locnum = count($json['records']['locations'][0]['location']);
$weatherElementnum = count($json['records']['locations'][0]['location'][0]['weatherElement']);
$timenum = count($json['records']['locations'][0]['location'][0]['weatherElement'][0]['time']);


echo '<pre>' . print_r($json, true) . '</pre>';



for ($i = 0; $i < $locnum; $i++) {
    echo '地名:' . $locationName = $json['records']['locations'][0]['location'][$i]['locationName'] . '<BR>';
    echo '地理編號:' . $geocode = $json['records']['locations'][0]['location'][$i]['geocode'] . '<BR>';
    echo '緯度:' . $lat = $json['records']['locations'][0]['location'][$i]['lat'] . '<BR>';
    echo '經度:' . $lon = $json['records']['locations'][0]['location'][$i]['lon'] . '<BR>';
    for ($j = 0; $j < $weatherElementnum; $j++) {
        echo $elementName = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['elementName'] . ":";
        echo $description = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['description'] . '<BR>';
        for ($k = 0; $k < $timenum; $k++) {
            @$startTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['startTime'];
            if ($startTime != null) {
                echo '開始觀測時間:' . $startTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['startTime'];
            }
            @$endTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['endTime'];
            if ($endTime != null) {
                echo '結束觀測時間' . $endTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['endTime'] . '<BR>';
            }
            @$dataTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['dataTime'];
            if ($dataTime != null) {
                echo '觀測時間:' . $dataTime = $json['records']['locations'][0]['location'][$i]['weatherElement'][$j]['time'][$k]['dataTime'] . '<BR>';
            }
            $elementValuenum = count($json['records']['locations'][0]['location'][0]['weatherElement'][$j]['time'][0]['elementValue']);
            for ($l = 0; $l < $elementValuenum; $l++) {
                echo $value = $json['records']['locations'][0]['location'][0]['weatherElement'][$j]['time'][0]['elementValue'][$l]['value'] . '    ';
                $measures = $json['records']['locations'][0]['location'][0]['weatherElement'][$j]['time'][0]['elementValue'][$l]['measures'];
                $measures_array = explode(" ", $measures);
                if ($measures_array[0] != '自定義'&&$measures_array[0] != 'NA') {
                    echo '單位:' . $measures = $json['records']['locations'][0]['location'][0]['weatherElement'][$j]['time'][0]['elementValue'][$l]['measures'] . '<BR>';
                }else echo "<BR>";
            }
        }
    }
}












?>
