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
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $no = $_POST['num'];
    $birthday = $_POST['birthday'];
    $sql = "UPDATE member_data SET name='$name',sex='$sex',phone='$phone',age='$age',birthday='$birthday' WHERE No='$no'";//更新會員資訊
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='Xadmin_member_revise.php?no=';},500);
            </script>";
    } else {
        echo "<script>
            alert('更新成功')
            setTimeout(function(){window.location.href='Xadmin_member_revise.php?no=';},500);
            </script>";
    }

    ?>
</body>

</html>