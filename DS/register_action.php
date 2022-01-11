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
    $id = $_POST['username'];
    $account = $_POST['account'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
    $email = $_POST['email'];
    $t = 1;
    $i = 0;
    $uppercase = 0;
    $lowercase = 0;
    $number = 0;

    if ($pw == $pw2) { //判斷有無大小寫及數字
        $pw_len = strlen($pw); //密碼長度
        if ($pw_len < 6) {
            echo "<script>alert('密碼至少6字元')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
            $t = 0;
        }
        $pw = preg_split('//', $pw, -1, PREG_SPLIT_NO_EMPTY); //切割密碼轉存字串
        for ($i = 0; $i < $pw_len; $i++) {
            if (ord($pw[$i]) >= 65 && ord($pw[$i]) <= 90) {
                $uppercase = 1;
                break;
            } else {
                $uppercase = 0;
            } //大寫
        }
        for ($i = 0; $i < $pw_len; $i++) {
            if (ord($pw[$i]) >= 97 && ord($pw[$i]) <= 122) {
                $lowercase = 1;
                break;
            } else {
                $lowercase = 0;
            } //小寫
        }
        for ($i = 0; $i < $pw_len; $i++) {
            if (ord($pw[$i]) >= 48 && ord($pw[$i]) <= 57) {
                $number = 1;
                break;
            } else {
                $number = 0;
            } //數字
        }
        if ($uppercase == 0) {
            echo "<script>alert('密碼至少需一字元為大寫')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
            $t = 0;
        }
        if ($lowercase == 0) {
            echo "<script>alert('密碼至少需一字元為小寫')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
            $t = 0;
        }
        if ($number == 0) {
            echo "<script>alert('密碼至少需一字元為數字')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
            $t = 0;
        }
    } else {
        $t = 0;
    }

    $email2 = $email;
    $mail_len = strlen($email2); //郵件長度
    $email2 = preg_split('//', $email2, -1, PREG_SPLIT_NO_EMPTY);
    $email_error = 1;
    for ($i = 0; $i < $mail_len; $i++) {
        echo "" . "<BR>";
        if (ord($email2[$i]) == 64) {
            $t = 1;
            $email_error=0;
            break;
        }
    }
    if ($email_error == 1) {
        $t=0;
        echo "<script>alert('E-Mail不符合規範 請重新輸入')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
    }
    if ($t) {
        $sql = "SELECT * FROM member_account WHERE account ='$account'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_num_rows($result);
        if ($row == 0) {
            $q = "INSERT INTO member_account(username,account,password,email) value('$id','$account','$pw2','$email')";
            $result = mysqli_query($link, $q);
            if (!$result) {
                echo "<script>alert('執行SQL有誤')
                setTimeout(function(){window.location.href='main.php';},1000);
                </script>";
            } else {
                echo "<script>
                alert('註冊成功')
                setTimeout(function(){window.location.href='main.php';},1000);
                </script>";
            }
        } else {
            echo "<script>alert('此帳號已註冊 請重新註冊')
            setTimeout(function(){window.location.href='main.php';},1000);
            </script>";
        }
    }

    ?>
</body>

</html>