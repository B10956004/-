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
    $sql = "SELECT *FROM member_data WHERE No='$no'"; 
    $result = mysqli_fetch_array(mysqli_query($link, $sql));
    $name=$result['name'];
    $sex=$result['sex'];
    $phone=$result['phone'];
    $age=$result['age'];
    $birthday=$result['birthday'];

    echo "<h1>修改會員資料</h1>";
    echo"<form name='form' method='post' action='member_revise_action.php'>";
    echo "姓名：<input type='text' name='name' value='$name'/> <br>
        性別：<select name='sex' value='$sex'>";
        if ($sex == '男') {
            echo "<option value='男'selected>男</option>";
            echo "<option value='女'>女</option>";
        } else {
            echo "<option value='男'>男</option>";
            echo "<option value='女'selected>女</option>";
        }
        echo"</select> <br>";
        echo"電話：<input type='text' name='phone' value='$phone'/> <br>
        年齡：<input type='text' name='age' value='$age'/> <br>
        生日：<input type='date' name='birthday' value='$birthday'/> <br>
        <input type='submit' name='button' value='更新' />";
    echo"</form>";
    ?>
<input type ='button' onclick="history.back()"value='回上頁'></input>

</body>

</html>