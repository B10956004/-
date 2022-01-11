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
    $admin = $_SESSION['admin'];
    if ($admin != 1) {
        echo "<script>
    alert('權限不足');
    setTimeout(function(){window.parent.location.reload();},0);
    </script>";
    } else {
        @$no = $_GET['no'];
        echo "<h1>修改會員資料</h1>";
        if ($no == '') {
            echo "請輸入想改的會員資訊";
            $sql = "SELECT * FROM member_data ";
        } else {
            $sql = "SELECT * FROM member_data WHERE name LIKE '%$no%' OR sex LIKE '%$no%' OR phone LIKE '%$no%' OR age LIKE '%$no%' OR birthday LIKE '%$no%'";
        }
        $result = mysqli_query($link, $sql); //讀值

        echo "<form action='admin_member_select.php' method='POST'>
            <input type='text' placeholder='請輸入關鍵字文字' name='no'>
            <input type='submit' value='查詢'>
        </form><BR>";
        while ($result_row = mysqli_fetch_array($result)) {
            $name = $result_row['name'];
            $sex = $result_row['sex'];
            $phone = $result_row['phone'];
            $age = $result_row['age'];
            $birthday = $result_row['birthday'];
            $num = $result_row['No'];
            echo "<form name='form' method='post' action='admin_member_revise_action.php'>";
            echo "會員編號<input type='text' size='1' readonly='readonly' name='num' value='$num'/><BR>
        姓名：<input type='text' name='name' value='$name'/> <br>
        性別：<select name='sex' value='$sex'>";
            if ($sex == '男') {
                echo "<option value='男'selected>男</option>";
                echo "<option value='女'>女</option>";
            } else {
                echo "<option value='男'>男</option>";
                echo "<option value='女'selected>女</option>";
            }
            echo "</select> <br>";
            echo "電話：<input type='text' name='phone' value='$phone'/> <br>
        年齡：<input type='text' name='age' value='$age'/> <br>
        生日：<input type='date' name='birthday' value='$birthday'/> <br>
        ";
            echo "<input type='submit' name='button' value='更新' />";
            echo "</form>";
        }
    }
    ?>


</body>

</html>