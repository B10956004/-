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
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    session_start();
    $no=$_SESSION['no'];
    $birthday=$_POST['birthday'];
        $sql="INSERT INTO member_data(name,sex,phone,age,birthday,No) value('$name','$sex','$phone','$age','$birthday','$no')";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('執行SQL有誤')
            setTimeout(function(){window.location.href='XmemberInfo.php';},1000);
            </script>";
        } else {
            echo "<script>
            alert('送出成功')
            setTimeout(function(){window.location.href='XmemberInfo.php';},1000);
            </script>";
        } 
    ?>
</body>
</html>