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
    $pw = $_POST['pw'];
    $pw2 = $pw;
    $uppercase = 0;
    $lowercase = 0;
    $number = 0;
    $t=1;
    if ($pw == $pw2) { //判斷有無大小寫及數字
        $pw_len = strlen($pw); //密碼長度
        if ($pw_len < 6) {
            echo "<script>alert('密碼至少6字元')
            setTimeout(function(){window.location.href='member_printf.php';},500);
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
            setTimeout(function(){window.location.href='member_printf.php';},500);
            </script>";
            $t = 0;
        }
        if ($lowercase == 0) {
            echo "<script>alert('密碼至少需一字元為小寫')
            setTimeout(function(){window.location.href='member_printf.php';},500);
            </script>";
            $t = 0;
        }
        if ($number == 0) {
            echo "<script>alert('密碼至少需一字元為數字')
            setTimeout(function(){window.location.href='member_printf.php';},500);
            </script>";
            $t = 0;
        }
    } else {
        $t = 0;
    }
    if ($t) {
        session_start();
        $no = $_SESSION['no'];
        $sql = "UPDATE member_account SET password='$pw2' WHERE No='$no'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='login.php';},500);
            </script>";
        } else {
            echo "<script>
            alert('更新成功')
            setTimeout(function(){window.location.href='member_printf.php';},500);
            </script>";
        }
    } else {
        echo "<script>
        alert('密碼不符合規範 請重新輸入')
        setTimeout(function(){window.location.href='member_printf.php';},500);
        </script>";
    }
    ?>
</body>

</html>