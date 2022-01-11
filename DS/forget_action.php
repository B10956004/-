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
    $account = $_POST['account'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM member_account WHERE account='$account' and email='$email'";
    $result =  mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows) {
        $result = mysqli_fetch_assoc($result);
        $password = $result['password'];
        
        $subject = "天氣預報查詢系統密碼";//標題
        $body = "您的密碼為:$password" . "。";//內文
        $headers = "From: team9's_forget email";//寄件人

        if (mail($email, $subject, $body, $headers)) {
            echo "<script>
            alert('已發送至$email 請查看...');
            setTimeout(function(){window.location.href='login.php'},100);
            </script>";
        } else {
            echo "<script>
            alert('發送失敗...');
            setTimeout(function(){window.location.href='forget.php'},100);
            </script>";
        }
    } else {
        echo "<script>
        alert('帳號或電子郵件填寫不完整');
        setTimeout(function(){window.location.href='forget.php'},100);
        </script>";
    }
    ?>
</body>

</html>