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
    $email = $_POST['email'];

    $email2=$email;
    $mail_len = strlen($email2);//郵件長度
    $email2 = preg_split('//', $email2, -1, PREG_SPLIT_NO_EMPTY);
    for ($i = 0; $i < $mail_len; $i++) {
        if (ord($email2[$i]) == 64) {
            $t = 1;
            break;
        } else {
            $t = 0;
        } //有無@
    }
    
    if ($t) {
        session_start();
        $no = $_SESSION['no'];
        $sql = "UPDATE member_account SET email='$email' WHERE No='$no'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='XmemberInfo.php';},500);
            </script>";
        } else {
            echo "<script>
            alert('更新成功')
            setTimeout(function(){window.location.href='XmemberInfo.php';},500);
            </script>";
        }
    } else {
        echo "<script>
        alert('E-Mail不符合規範 請重新輸入')
        setTimeout(function(){window.location.href='XmemberInfo.php';},500);
        </script>";
    }
    ?>
</body>

</html>