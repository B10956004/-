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
    $no = $_SESSION['no'];
    if ($no == null) {
        echo"<script>
    alert('請先登入');
    setTimeout(function(){window.parent.location.reload();},0);
    </script>";
    } else {
        echo "<H1>會員資料</H1>";
        $sql = "SELECT *FROM member_data WHERE No='$no'";
        $result = mysqli_fetch_array(mysqli_query($link, $sql));
        if($result==null){
            echo "請先<a href='member.php'>新增會員資料</a><BR>";
        }else{
            echo "姓名:" . $result['name'] . "<br>";
            echo "性別:" . $result['sex'] . "<br>";
            echo "電話:" . $result['phone'] . "<br>";
            echo "年齡:" . $result['age'] . "<br>";
            echo "生日:" . $result['birthday'] . "<br>";
            echo "<div ><a href='member_revise.php'>修改會員資料</a>  
            <a href='password_revise.php'>修改密碼或電子郵件</a></div>";}
        
    }
    ?>
    <input type ='button' onclick="javascript:location.href='main.php'"value='回上頁'></input>
</body>

</html>